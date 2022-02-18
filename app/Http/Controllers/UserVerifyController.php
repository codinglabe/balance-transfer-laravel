<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\VerifiedUser;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserVerifyController extends Controller
{
    public function User_Registration(Request $request){
        $email = $request->email;
        $password = Hash::make($request->password);
        $verification_code = sha1(time());
        $cpassword = $request->cpassword;

        $request->validate([
            'email'=>'required|email|unique:verified_users',
            'password'=>'required|min:5|max:12',
            'cpassword'=>'required|min:5|max:12',
            'first_name'=>'required',
            'last_name'=>'required'
        ]);
        

        if($request->password == $cpassword){
           $user = new VerifiedUser;
           $user->email = $email;
           $user->password = $password;
           $user->verification_code = $verification_code;
           $user->first_name = $request->first_name;
           $user->last_name = $request->last_name;
           $result = $user->save();
           if($result == true){
               MailController::SendSignupEmail($user->first_name,$user->email,$user->verification_code);
                return redirect()->route('RegistrationUI')->with(session()->flash('alert-success','Your account has been created. Please check your'.' '.$user->email));
           }
        }else{
            return redirect()->back()->with('error','Password Not Matched');
        }
       
        
    }

    public function VerifyUser(Request $request){
            $code = $request->get('code');
            $user = VerifiedUser::where('verification_code',$code)->first();
            if($user != null){
                $user->is_verified_user = 1;
                $user->save();
                return redirect()->route('Login-UI')->with('success','Your account is now verified you can log in');
            }
            
    }

    public function UserInfoUpdate(Request $request){
        $info = VerifiedUser::where('id',$request->id)->first();
        $photoName = explode('/',$info->profile_image)[5];
        unlink("storage/profile-image/".$photoName);
        $info->first_name = $request->fname;
        $info->last_name = $request->lName;
        $info->email = $request->email;
        $info->address = $request->address;
        $info->phone = $request->phone;
        $info->state = $request->state;
        $info->city = $request->city;
        $info->thana = $request->thana;
        $info->date_of_birth = $request->dob;
        $image  = Storage::disk('public')->put('profile-image',$request->image);
        $Image_path ="http://".$_SERVER['HTTP_HOST'].'/storage/'.$image;
        $info->profile_image = $Image_path;
        $result = $info->save();
        if($result == true){
            
            return Redirect::back()->with('success','Profile Update Success');
        }else{
            Redirect::back()->with('failed','Something Went Wrong !');
        }
        
    }

    public function User_Logout(){
        Auth::guard('verified_user')->logout();
        Session::flash('codeVerify');
        return redirect('/');
        // if(Session::has('UseID')){
           
        // }
        $result = VerifiedUser::all();
        
    }


    public function UserDelete(Request $request){
            $id = $request->id;
            VerifiedUser::where('id',$id)->delete();
            return redirect()->back();
    }

    public function Block(Request $request){
            $id = $request->id;
            VerifiedUser::where('id',$id)->update(['status'=>1]);
            return redirect()->back();
    }
    public function UnBlock(Request $request){
        $id = $request->id;
        VerifiedUser::where('id',$id)->update(['status'=>0]);
        return redirect()->back();
    }

    public function OrderStatus(Request $request){
            $id = $request->id;
            $status = $request->status;
            $backResult = Order::where('id',$id)->update([
                'status'=>$status
            ]);
            return $backResult;
    }


}
