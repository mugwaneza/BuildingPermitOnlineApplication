<?php

namespace App\Http\Controllers;

use App\Models\CellApproval;
use App\Models\VillageApproval;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Users;

class WelcomeController extends Controller
{




     // call citizen  registration form
    public function Register(){

        return view('applicant_register');
    }

     // citizen registration function
    public function CitizenRegister(Request $request){
        $rules = [
            'name' => 'required|min:3',
            'nid' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'comfirmpass' => 'required|min:5|same:password',
            'village' => 'required',
            'cell' => 'required',
            'sector' => 'required',
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
        $user -> role = "citizen";
        $user -> village = $request->village;
        $user -> cell = $request->cell;
        $user -> sector = $request->sector;
        $user -> remember_token=str_random(18);
        $user -> save();
        $request->session()->flash('success', 'Successful registered, login for father steps!');
        return redirect('/login');

    }

     // call a login page
    public function Login(){

        $checkSession = Session::get('citizensession');
        if($checkSession) {

            $id = Session::get('citizensession');
            $userInfo = Users::find($id);

            if($userInfo["role"] =="citizen"){
                return redirect('/citizen');
             }else{
                return redirect('/all/admin');
            }

        }
        return view('login');
}

    // Login of citizen
    public function CreateLogin(Request $request){

        $rules = [
            'nid' => 'required',
            'password' => 'required',
        ];
        $this->validate($request, $rules);


        if(Auth::attempt(['nid'=>$request->nid, 'password'=>$request->password])) {

           // Create a user session
           Session::put('citizensession', Auth::user()->id );

            $id = Session::get('citizensession');

             $user =  Users()::find($id);
            if($user['role']=="citizen"){
                //when user is an applicant
                return redirect('/citizen/satus');
            }
            else{
                // a user is an authority
            return redirect('/all/admin');
            }

        }
        elseif(Auth::attempt(['email'=>$request->nid, 'password'=>$request->password])) {
            // Create a user session
            Session::put('citizensession', Auth::user()->id );
            $id = Session::get('citizensession');

            $user =  Users()::find($id);
            if($user['role']=="citizen"){
                //when user is an applicant
                return redirect('/citizen/satus');
            }
            else{
                // a user is an authority
                return redirect('/all/admin');
            }

        }
        // When login fails
        $request->session()->flash('error', 'Sorry, invalid email/NID or password');
        return view('login');
}

    public function Home(){

        return view('home');
    }

    // Get to citizen application form
    public function CitizenStatus(){

        //get citizen id by his session
        $id = Session::get('citizensession');

         // get village applications of specific user
        $villageapp = VillageApproval::where('applicant_id','=', $id)->get();
           foreach($villageapp as $item ){
               // track user application from village to the cell
        $userChoosenProgram = CellApproval::with('VillageApproval')->where('village_id',$item['id'])->get();

           }


        if(!$id) {
            // when user has not logged in take him/her back to login page
            return redirect('/login');
        }
        $userInfo = Users::find($id);

        return view('citizen')-> with('userInfo',$userInfo)
                                -> with('villageapp', $villageapp);
    }

    // Get to citizen application form
    public function CitizenDashboard(){

        //get citizen id by his session
        $id = Session::get('citizensession');
        if(!$id) {
            return redirect('/login');
        }
        $userInfo = Users::find($id);
        return view('applicationform') -> with('userInfo',$userInfo);
    }

    // submit online application for building permit

    public function  CitizenApply(Request $request)
    {

        $id = Session::get('citizensession');
        $rules = [
            'reason' => 'required|min:10',
            'landcertificate' => 'required|mimes:pdf,jpeg,png,jpg|max:500',

        ];
        $this->validate($request, $rules);

        $FilesPath = '/fileuploads/';
        $village = new VillageApproval();
        $village->applicant_id = $id;
        $village->reason = $request->reason;
        $village->approval_status = 'pending';

        $certificate = $request->file('landcertificate');
        echo $certificate;
        $certificatename = time() . '_' . $request->file('landcertificate') -> getClientOriginalName();
        $certificate->move(public_path() . $FilesPath, $certificatename);
        $certificatePath = $FilesPath . $certificatename;

        $village->landcertificate = $certificatePath;
        $request->session()->flash('success', 'Your application was successfully sent');

        $village->save();

    return redirect('/citizen');
    }




    //     Sign out
    public function destroy()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
