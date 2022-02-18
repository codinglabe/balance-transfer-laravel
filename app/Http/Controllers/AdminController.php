<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function guradLogin(Request $request){
        $cr = $request->only('email','password');
            if(Auth::guard('admin')->attempt($cr)){
                return redirect()->route('adminView');
                
            }else {
                dd($id = Auth::guard('admin')->user());
            }
    }
}
