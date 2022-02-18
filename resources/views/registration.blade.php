@extends('layouts.main')
@section('title', 'Registration')

@section('contetn')
    <div class="container">
        <div class="row justify-content-center mt-5 pt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center fw-bold">
                        Registration
                    </div>
                    <div class="card-body">
                        <div class="flash-message">
                            @foreach(['danger','warning','success','info'] as $value)
                                @if(Session::has('alert-'.$value))
                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                    </symbol>
                                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                    </symbol>
                                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </symbol>
                                  </svg>
                                    <div class="alert alert-success d-flex align-items-center" role="alert">
                                      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                      <div>
                                        {{ Session::get('alert-'.$value) }}
                                      </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        @if(Session('error'))
                            <div class="alert alert-{{ $value }} text-center" role="alert">
                                {{ Session::get('error') }} <a href="#" class="close" data-dismiss="alert" aria-lebel="close">&times;</a>
                            </div>
                        @endif
                        <form action="{{ route('user-registration') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="" for="first_name">First Name</label>
                                    <input class="form-control" type="text" name="first_name" id="first_name" placeholder="First Name">
                                    <p class="text-danger" >@error('first_name'){{ $message }} @enderror</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="" for="last_name">Last Name</label>
                                    <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Last Name">
                                    <p class="text-danger" >@error('last_name'){{ $message }} @enderror</p>
                                </div>
                            </div>
                            <label class="" for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="Email">
                            <p class="text-danger" >@error('email'){{ $message }} @enderror</p>
        
                            <label class="" for="password">Password</label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Password">
                            <p class="text-danger" >@error('password'){{ $message }} @enderror</p>

                            <label class="" for="cpassword">Conform-Password</label>
                            <input class="form-control" type="password" name="cpassword" id="cpassword" placeholder="Conform-Password">
                            <p class="text-danger" >@error('cpassword'){{ $message }} @enderror</p>

                            <button class="btn btn-success mt-2 float-end" >Create</button>
                        </form>
                    </div>
                    <p class="ms-2 mb-2 fw-bold">You Already Have An Account Please <a  href="/">Login</a> Here</p>
                </div>
            </div>
        </div>
    </div>
@endsection