@extends('layouts.main')
@section('title', 'Log In')


@section('contetn')
    <div class="container">
        <div class="row justify-content-center mt-5 pt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Log In
                    </div>
                    <div class="card-body">
                        @if(Session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        @if(Session('Failed'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('Failed') }}
                            </div>
                        @endif
                        <form action="{{ route('user-login') }}" method="POST">
                            @csrf
                            <input class="form-control mt-2" type="email" name="email" id="email" placeholder="Email">
                            <span class="text-danger" >@error('email') {{ $message }} @enderror</span>
                            <input class="form-control mt-2" type="password" name="password" id="password" placeholder="Password">
                            <span class="text-danger" >@error('password') {{ $message }} @enderror</span>
                            <button type="submit" class="btn btn-success float-end mt-2" >Log In</button>
                        </form>

                        <div class="row justify-content-center mt-5 ">
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-body">
                                        <span class="fw-bold" >Google</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="ms-2 mb-2 fw-bold">You Don't Have An Account Please <a  href="/Registration">Register</a> Here</p>
                </div>
            </div>
        </div>
    </div>
@endsection