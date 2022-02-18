@extends('layouts.main')
@section('title', 'Admin')

@section('contetn')
    <div class="container">
        <div class="row justify-content-center mt-5 pt-5">
            <div class="col-md-4">
                <P>User Log In</P>
                <hr>
                <p>User Name: {{ Auth::guard('admin')->user()->name }}</p>
                <p>User email: {{ Auth::guard('admin')->user()->email }}</p>
            </div>
        </div>
    </div>
@endsection