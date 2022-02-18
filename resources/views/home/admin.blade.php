@extends('layouts.main')
@section('title', 'Admin')

@section('contetn')
    <div class="container">
        <div class="row justify-content-center mt-5 pt-5">
            <div class="col-md-4">
                <P>User Log In</P>
                <hr>
                <form action="{{ route('user-in') }}" method="POST">
                    @csrf
                    <input class="form-control" type="email" name="email" id="email" placeholder="Email">
                    <input class="form-control mt-2" type="password" name="password" id="email" placeholder="Password">
                    <button type="submit" class="btn btn-success float-end mt-2">Log In</button>
                </form>
            </div>
        </div>
    </div>
@endsection