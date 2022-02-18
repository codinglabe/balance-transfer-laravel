@extends('layouts.menu')
@section('title', 'Balance Transfer')
@section('contetn')
<style>
    .transectios-list{
        background-color: #ffffff;
        box-shadow: rgba(9, 30, 66, 0.25) 0px 1px 1px, rgba(9, 30, 66, 0.13) 0px 0px 1px 1px;
        padding: 20px;
    }
    .icon{
        width: 40px;
        height: 40px;
        display: inline-block;
        border-radius: 50%;
        background: rgba(0, 0, 0, .2) !important;
        display: block;
    }
    .icon i{
        
        
    }
    .name{
        padding: 10px;
        background-color: rgba(0, 0, 0, .2);
        border-radius: 50%;
        color: black;
        font-size: 20px;
        font-weight: bold;
    }
    .transaction-card{
        height: 294px;
        overflow-y: scroll;
        scrollbar-width: none;
    }
    .transaction-card::-webkit-scrollbar {
        display: none;
    }
    
</style>
<div class="col-md-8">
    <p class="fw-bold text-center">Current Balance</p>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <img class="w-25" src="https://currency.morgrowe.com/images/flag-icons-256/usd.png" alt="">
                         <span id="userBalance" class="fw-bold fs-4 ms-4"> </span>
                         <input type="hidden" name="" id="balance" value="{{ Auth::guard('verified_user')->user()->balance }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="transaction-card mt-5">
        @foreach($transaction as  $transaction)
        <div class="transectios-list mt-2">
            <div class="row">
                <div class="col-md-1">
                    <div class="icon">
                        <i class="fa-solid fa-arrow-up-from-bracket ms-2 ps-1 mt-2 pt-1"></i>
                    </div>
                </div>
                <div class="col-md-4">
                    <p class="m-0 fw-bold">To: {{ $transaction->reciver_email }}</p>
                    <p class="m-0">Account To Account</p>
                </div>

                <div class="col-md-2 ms-auto">
                    <p class="m-0 fw-bold">USD <span class="{{ $transaction->amount < 0 ? 'text-success':'text-danger'}}" >{{ $transaction->amount < 0 ? "+":"-" }} ${{ $transaction->amount }}</span> </p>
                    <p class="m-0">{{ $transaction->created_at }}</p>
                    
                </div>
            </div>
            
        </div>
        @endforeach
        
    </div>
</div>
<script>
    let balanceU = document.getElementById("balance").value;
    let userBalanceU = parseInt(balanceU).toFixed(2);
    document.getElementById("userBalance").innerHTML = "$"+userBalanceU;
  </script>
@endsection