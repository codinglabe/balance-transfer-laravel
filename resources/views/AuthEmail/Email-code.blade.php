@extends('layouts.main')
@section('title', 'Enter Your Code')

@section('contetn')
    <div class="container">
        <div class="row justify-content-center mt-5 pt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <p class="fw-bold text-center">Please Enter Your Six Digit Code</p>
                        <form action="{{ route('CodeVerify') }}" method="POST">
                            @csrf
                            <div class="row text-center">
                                <div class="col-md-2">
                                    <input class="form-control text-center" type="text" name="code1" id="first" placeholder="0" onkeyup="clickEvent(this,'sec')" maxlength="1">
                                </div>
                                <div class="col-md-2">
                                    <input class="form-control text-center" type="text" name="code2" id="sec" placeholder="0" onkeyup="clickEvent(this,'third')" maxlength="1">
                                </div>
                                <div class="col-md-2">
                                    <input class="form-control text-center" type="text" name="code3" id="third" placeholder="0" onkeyup="clickEvent(this,'fourth')" maxlength="1">
                                </div>
                                <div class="col-md-2">
                                    <input class="form-control text-center" type="text" name="code4" id="fourth" placeholder="0" onkeyup="clickEvent(this,'five')" maxlength="1">
                                </div>
                                <div class="col-md-2">
                                    <input class="form-control text-center" type="text" name="code5" id="five" placeholder="0" onkeyup="clickEvent(this,'six')" maxlength="1">
                                </div>
                                <div class="col-md-2">
                                    <input class="form-control text-center" type="text" name="code6" id="six" placeholder="0" maxlength="1" >
                                </div>
                            </div>
                            <button id="codeBtn" type="submit" class="btn btn-success w-100 mt-2 disabled" >Verify</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script text="type\javascript">
        function clickEvent(first,last){
            if(first.value.length){
                document.getElementById(last).focus();
                if(first.value.length === 1){
                let element = document.getElementById('codeBtn');
                element.classList.remove("disabled");
            }
            }
        }

        
    </script>
@endsection