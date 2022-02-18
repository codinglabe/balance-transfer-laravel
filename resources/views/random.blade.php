@extends('layouts.main')
@section('title', 'Random Code')

@section('contetn')

    <div class="container">
        <div class="row justify-content-center pt-5 mt-5">
            <div class="col-md-4">
                @if(Session::has('succsess'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('succsess') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header fw-bold text-center">
                        Verification Code
                    </div>
                    <div class="card-body">
                        <form action="{{ route('mail') }}" method="POST">
                            @csrf
                            <input class="form-control" type="text" name="email" id="email" placeholder="Email">
                            <input class="form-control mt-2" type="text" name="code" id="" placeholder="Code" value="{{ $sixDigit }}">
                            <button class="btn btn-success float-end mt-2">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection