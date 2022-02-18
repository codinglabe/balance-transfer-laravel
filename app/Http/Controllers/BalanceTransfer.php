<?php

namespace App\Http\Controllers;

use App\Models\TransactionList;
use Illuminate\Support\Facades\Session;
use App\Models\VerifiedUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceTransfer extends Controller
{
    function UserBalance(){
        
        if(Session::get('UseID')){
            $user = VerifiedUser::where('id',Session::get('UseID'))->first();
        }
        $transaction = TransactionList::where('user_id',Auth::guard('verified_user')->user()->id)->get();
        return view('user.account',compact('transaction'));
    }

    public function BalanceTransfer(){
        $transaction = TransactionList::where('reciver_id',Auth::guard('verified_user')->id())->get();
        return view('user.balance-transfer',compact('transaction'));
    }

    public function Transfer(Request $request){
            $email = $request->email;
            $amount = $request->amount;
            $request->validate([
                'email'=>'required|email',
                'amount' => 'required',
            ]);
            $userBalance = VerifiedUser::where('email',$email)->first();
            if($userBalance === null){
                return redirect()->back()->with('fail','You are not a user please create a account');
            }else{
                $balance = Auth::guard('verified_user')->user()->balance;
                if($balance < $amount){
                    return redirect()->back()->with('fail','You have insufficient balance');
                }else{
                    if($balance == 0){
                        return redirect()->back()->with('fail','You have insufficient balance');
                    }else{
                    $total = $balance - $amount;
                    $users = VerifiedUser::where('id',Auth::guard('verified_user')->user()->id)->first();
                    $users->balance = $total;
                    $minus = $users->save();
                    if($minus === true){
                        $userBalance = VerifiedUser::where('email',$email)->first();
                        $previewsBalance = $userBalance->balance;
                        $userBalance->balance = $previewsBalance + $amount;
                        $transferResult = $userBalance->save();

                        $randomNumber = random_int(100000, 999999);
                        $randomNumber2 = 113310;

                        $transaction = new TransactionList;
                        $transaction->user_id = Auth::guard('verified_user')->user()->id;
                        $transaction->user_mail = Auth::guard('verified_user')->user()->email;
                        $transaction->reciver_id = $userBalance->id;
                        $transaction->reciver_email = $email;
                        $transaction->amount = $amount;
                        $transaction->transaction_id = $randomNumber2.$randomNumber;
                        $transaction->save();

                        $transaction->user_id = Auth::guard('verified_user')->user()->id;
                        if($transferResult === true){
                            return redirect()->back()->with('success','Balance Transfer Success');
                        }else{
                            return redirect()->back()->with('fail','Balance Transfer Faield');
                        }
                    }
                    }
                }
                
                
            }
            
            
    }
}