<?php

namespace App\Http\Controllers;

use App\Models\CellApproval;
use App\Models\SectorApproval;
use App\Models\Users;
use App\Models\VillageApproval;
use Illuminate\Http\Request;
use Hash;
use Session;
class AdministratorsController extends Controller
{
    public function Welcome(){

        return view('');
    }

    public function RegisterAdmin(){

        return view('admin_register');
    }


    public function CreateAdmin(Request $request){

        $rules = [
            'name' => 'required|min:3',
            'nid' => 'required|min:16|max:16|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'comfirmpass' => 'required|min:5|same:password',
            'village' => 'required',
            'cell' => 'required',
            'sector' => 'required',
            'role' => 'required'
        ];

        $this->validate($request, $rules);

        //get form variables from object
        $user = new Users();
        // Encrypt the password
        $hashedpass = Hash::make($request->password);

        $user -> name = $request->name;
        $user -> nid = $request->nid;
        $user -> email = $request->email;
        $user -> password =$hashedpass;
        $user -> role = $request->role;
        $user -> village = $request->village;
        $user -> cell = $request->cell;
        $user -> sector = $request->sector;
        $user -> remember_token= str_random(18);
        $user -> save();
        $request->session()->flash('success', 'Administrator account is successful created,!');
        return redirect('/register/admin');
    }


    public function AllAdmin(){

        $id = Session::get('citizensession');
        $userInfo = Users::find($id);
        // get the list of all users
        $administrators = Users::where('role', '!=', 'citizen') -> paginate(4);
         return view('alladministrators')
             -> with("administrators", $administrators)
             -> with('userInfo',$userInfo);
    }

    public function SearchAdmin($search ){
        $id = Session::get('citizensession');
        $userInfo = Users::find($id);

        $administrators = Users::where('role', '!=', 'citizen')
         ->where('name','like','%'.$search.'%')
         ->orWhere('nid','like','%'.$search.'%')
         ->orWhere('role','like','%'.$search.'%')
         -> paginate(4);
        return view('alladministrators')
            -> with("administrators", $administrators)
            -> with('userInfo',$userInfo);
    }






    public function UpdateAdmin(Request $request){

        $rules = [
            'password' => 'required|min:5',
            'comfirmpass' => 'required|min:5|same:password',
          ];

         $this->validate($request, $rules);
         $myid = $request->dialogid;
         //update admin account in users
          $user =  Users::find($myid);

        // Encrypt the password
        $hashedpass = Hash::make($request->password);

        $user -> name = $request->name;
        $user -> nid = $request->nid;
        $user -> email = $request->email;
        $user -> password =$hashedpass;
        $user -> role = $request->role;;
        $user -> village = $request->village;
        $user -> cell = $request->cell;
        $user -> sector = $request->sector;
        $user -> remember_token=str_random(18);
        $user -> save();
        $request->session()->flash('success', 'User successfully updated!');
        return redirect('/all/admin');
    }

    public function DeleteAdmin(Request $request){

        $myid = $request->deleteid;

//        //delete admin account from users
//        $user =  Users::where("id", $myid)->first();
//        $user -> destr();

        Users::destroy($myid);
        $request->session()->flash('error', 'User successfully deleted!');
        return redirect('/all/admin');
    }

      // Approve Village pendind application
    public function ApproveVillageApplications(Request $request, $id){

        $cellapplicant = new CellApproval();
        $cellapplicant->village_id = $id;
        $cellapplicant->approval_status = 'pending';
        $cellapplicant->remember_token=str_random(18);
       $success = $cellapplicant->save();
        if($success){
   //       if application has been transfered to the cell level successfully update village to approved and add admin id

            $coord_id = Session::get('citizensession');
            $villageapplication = VillageApproval::find($id);

            $villageapplication -> coordinator_id = $coord_id;
            $villageapplication -> approval_status = "approved";
            $villageapplication -> save();
            $request->session()->flash('success', 'Application has be approved approve and transfered');
            return redirect("/admin/new/applicant");
        }
    }

    // Approve Cell  pendind application
    public function ApproveCellApplications(Request $request, $id){

        $sectorapplicant = new SectorApproval();
        $sectorapplicant-> cell_id = $id;
        $sectorapplicant-> approval_status = 'pending';
        $sectorapplicant-> feeback = 'null';
        $sectorapplicant->remember_token=str_random(18);
       $success = $sectorapplicant->save();
        if($success){
   //       if application has been transfered to the sector level successfully update village to approved and add admin id

            $coord_id = Session::get('citizensession');
            $cellapplication = CellApproval::find($id);

            $cellapplication -> coordinator_id = $coord_id;
            $cellapplication -> approval_status = "approved";
            $cellapplication -> save();
            $request->session()->flash('success', 'Application has be approved approve and transfered');
            return redirect("/admin/new/applicant");
        }
    }


    // Approve Sector  pendind application
    public function ApproveSectorApplications(Request $request){
        $landmanger_id = Session::get('citizensession');

         $id = $request -> commentid;
         $mycomment = $request -> comment;
        $sectorapplicant = SectorApproval::find($id);

        $sectorapplicant-> approval_status = 'permited';
        $sectorapplicant-> landmanager_id = $landmanger_id;
        $sectorapplicant-> feeback = $mycomment;
        $sectorapplicant->save();

        $request->session()->flash('success', 'Application has been approved approve and transfered');
            return redirect("/admin/new/applicant");

    }

    // Approve Sector  pendind application reject
    public function RejectSectorApplications(Request $request){
        $landmanger_id = Session::get('citizensession');
        $id = $request -> commentid2;
        $mycomment = $request -> comment;
        $sectorapplicant = SectorApproval::find($id);

        $sectorapplicant-> approval_status = 'rejected';
        $sectorapplicant-> landmanager_id = $landmanger_id;
        $sectorapplicant-> feeback = $mycomment;
        $sectorapplicant->save();

        $request->session()->flash('error', 'Application has been rejected successfully ');
            return redirect("/admin/new/applicant");

    }

//    Display pending applications from villlage to sector
    public function Myapplicants(Request $request){

        $id = Session::get('citizensession');
        if(!$id){
            return redirect('/login');
        }
        $userInfo = Users::find($id);
        $function = new  Functions();

        if(($userInfo['role'])== "Village coordinator" ){
           // fetch all village applications
            $adminVillage = $userInfo['village'];
            $applicant = $function ->VillageApplication($adminVillage);
            $request->session()->flash('village', 'Village application (s)');

            return view('admin_newapplicants')
                  -> with("applicant", $applicant)
                  -> with('userInfo',$userInfo);
         }else if(($userInfo['role'])=="Cell coordinator"){
            // fetch cell application

             $adminCell = $userInfo['cell'];
            $applicant = $function ->CellApplication($adminCell);
            $request->session()->flash('cell', 'Cell application (s)');
            return view('admin_newapplicants')
                ->with("applicant", $applicant)
                -> with('userInfo',$userInfo);
         }else if(($userInfo['role'])=="Land manager"){
            // fetch cell application

            $adminSector = $userInfo['sector'];
            $applicant = $function ->SectorApplication($adminSector);
            $request->session()->flash('sector', 'Sector application (s)');
            return view('admin_newapplicants')
                ->with("applicant", $applicant)
                -> with('userInfo',$userInfo);
         }

    }


}
