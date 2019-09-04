<?php

namespace App\Http\Controllers;

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
            'nid' => 'required|unique:users',
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
        $administrators = Users::where('role', '!=', 'citizen') -> get();
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
    public function ApproveVillageApplications(Request $request){

        $cellapplicant = new  cellapplication();
        $cellapplicant->village_id = $request -> id;
        $cellapplicant->coordinator_id = "";
        $cellapplicant->approval_status = 'pending';
        $cellapplicant->remember_token=str_random(18);
        $request->session()->flash('success', 'Application has be approved approve and transfered');
        $cellapplicant->save();
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
            $request->session()->flash('error', 'Village application (s)');
            $request->session()->flash('Village', 'Village)');

            return view('admin_newapplicants')
                  -> with("applicant", $applicant)
                  -> with('userInfo',$userInfo);
         }else if(($userInfo['role'])=="Cell coorditor"){
            // fetch cell application

             $adminCell = $userInfo['cell'];
            $applicant = $function ->CellApplication($adminCell);
            $request->session()->flash('error', 'Cell application (s)');
            $request->session()->flash('Cell', 'Cell)');

            return view('admin_newapplicants')
                ->with("applicant", $applicant)
                -> with('userInfo',$userInfo);
         }else if(($userInfo['role'])=="Land manager"){
            // fetch cell application

            $adminSector = $userInfo['sector'];
            $applicant = $function ->SectorApplication($adminSector);
            $request->session()->flash('error', 'Sector application (s)');
            $request->session()->flash('Sector', 'Sector)');
            return view('admin_newapplicants')
                ->with("applicant", $applicant)
                -> with('userInfo',$userInfo);
         }

    }


}
