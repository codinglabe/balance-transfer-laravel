@extends('layouts.menu')
@section('title', 'Balance Transfer')


@section('contetn')

<div class="col-md-8">
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    @if(Session::has('fail'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('fail') }}
    </div>
@endif
    <p class="fw-bold text-center">Balance Transfer</p>
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('transfer') }}" method="POST">
                                @csrf
                                <label for="email">Recipient Email or Account</label>
                                <input class="form-control" type="email" name="email" id="email" placeholder="Email Or Account Number">
                                <p class="text-danger p-0 m-0">@error('email')
                                    {{ $message }}
                                @enderror</p>
                                <label class="mt-2" for="amount">Enter Your Amount</label>
                                <input class="form-control" type="number" name="amount" id="email" placeholder="Enter Your Amount">
                                <span class="text-danger">@error('amount')
                                    {{ $message }}
                                @enderror</span>
                                <button class="btn btn-success mt-2 float-end" >Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection