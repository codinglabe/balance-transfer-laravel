<?php

namespace App\Http\Controllers;

use App\Mail\RandomCode;
use App\Models\Order;
use App\Models\VerifiedUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserLoginController extends Controller
{
    public function index(){
        if(Session::has('UserID')){
            return redirect('/');
        }
        return view('login');
    }

    public function User_Login(Request $request){
       
        $email = $request->email;
        $password = $request->password;
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12',
        ]);
        // $userID = VerifiedUser::where('email',$email)->first();
        $cr = $request->only('email','password');
        if(Auth::guard('verified_user')->attempt($cr)){
            // if(Hash::check($password,)){
                if(Auth::guard('verified_user')->user()->is_verified_user == "1"){
                    if(Auth::guard('verified_user')->user()->status == '0'){
                        $request->session()->put('UseID',Auth::guard('verified_user')->user()->id);
                        $sixDigit = random_int(100000, 999999);
                        VerifiedUser::where('id',Auth::guard('verified_user')->user()->id)->update(['verify_code'=>$sixDigit]);
                        CodeVerify::SendCodeUser(Auth::guard('verified_user')->user()->first_name,Auth::guard('verified_user')->user()->email,$sixDigit);
                        return redirect()->route('code');
                        
                    }else{
                        return redirect()->back()->with('Failed','Your account has been block');
                    }
                    
                }else{
                    return redirect()->back()->with('Failed','Please verified your account');
                }
            // }else{
            //     // return Redirect::back()->with('Failed','Password Not Matches');
            // }
        }else{
            return Redirect::back()->with('Failed','You are not a user');
        }
        
    }

    public function Dashboard(){
        $user = array();
        if(Session::get('UseID')){
            $user = VerifiedUser::where('id',Session::get('UseID'))->first();
            
        }
        return view('home.dashboard');
    }

    public function Personal_infor(){
        $user = array();
        if(Session::get('UseID')){
            $user = VerifiedUser::where('id',Session::get('UseID'))->first();
            
        }
        return view('personalinfo');
    }

    public function Order_history(){
        $user = array();
        if(Session::get('UseID')){
            $user = VerifiedUser::where('id',Auth::guard('verified_user')->user()->id)->first();
            $order_history = Order::where('user_email',Auth::guard('verified_user')->user()->email)->orderBy('id','DESC')->get();
        }
        return view('user.order-history',compact('order_history','user'));
    }

    public function Registration(){
        return view('registration');
    }

    public function Random(Request $request){
        $email = $request->email;
        dd($email);
        $code = $request->code;
        $data = [
            'email'=>$email,
            'code'=>$code
        ];
        $result = Mail::to($email)->send(new RandomCode($data));
        if($result == null){
            return redirect()->back()->with('succsess','Code Send Please Check Your Mail');
        }
    }

    public function CodeVerify(Request $request){
        $code1 = $request->code1;
        $code2 = $request->code2;
        $code3 = $request->code3;
        $code4 = $request->code4;
        $code5 = $request->code5;
        $code6 = $request->code6;
        $code = $code1.$code2.$code3.$code4.$code5.$code6;
            // $request->validate([
            //     'code'=>'required|min:6|max:6'
            // ]);
        $text = "Verify";
            
            $result = VerifiedUser::where('verify_code',$code)->value('verify_code');
            $id = VerifiedUser::where('verify_code',$code)->value('id');
            if($result == $code){
                $request->session()->put('codeVerify',$id);
                VerifiedUser::where('id',$id)->update([
                    'verify_code'=> $text
                ]);
                return redirect()->route('dashboard.order-history');
                
            }
            
    }

    public function menuUser(){
        if(Session::get('UseID')){
            $user = VerifiedUser::where('id',Session::get('UseID'))->first();
        }
        return view('layouts.menu');
    }

    
}
