<?php

namespace App\Http\Controllers;

use App\Mail\RandomCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CodeVerify extends Controller
{
    public static function SendCodeUser($name,$email,$verification_code){
            $data = [
                'name'=>$name,
                'code'=>$verification_code
            ];
            
            Mail::to($email)->send(new RandomCode($data));
    }
}
