<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/regular.min.css">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/solid.min.css') }}">
</head>
<body>
    <style>
        .profile-image{
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-left: 2rem;
        }
        .profile-image img{
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto mr-3">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::guard('verified_user')->user()->email }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="#">Account</a></li>
                  <li><a class="dropdown-item" href="/dashboard/personal-infor">Setting</a></li>
                  <li><a class="dropdown-item" href="/Log-Out">Log Out</a></li>
                </ul>
              </li>
            </ul>
           
          </div>
        </div>
      </nav>

    <div class="container">
        <div class="row mt-5 pt-5">
            <div class="col-md-2 offset-2">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-image text-center">
                            <img class="mx-auto d-block" src="{{ Auth::guard('verified_user')->user()->profile_image }}" alt="image">
                        </div>
                        <p class="fw-bold text-center">{{ Auth::guard('verified_user')->user()->first_name }} @if(Auth::guard('verified_user')->user()->is_verified_user == 1)
                          <i class="far fa-check-circle text-success fw-bold"></i>
                        @else
                        <i class="fas fa-exclamation-circle text-danger fw-bold"></i>
                        @endif</p>
                        
                    </div>
                    <p class="text-center">Balance: <strong id="balances"></strong></p>
                    <input type="hidden" name="" id="balance" value="{{ Auth::guard('verified_user')->user()->balance }}">
                    <div class="list-group">
                      <a href="/dashboard/account" class="list-group-item list-group-item-action {{ Auth::guard('verified_user')->user()->status == 1 ? 'disabled':'' }}">Account</a>
                      <a href="/dashboard/balance-transfer" class="list-group-item list-group-item-action {{ Auth::guard('verified_user')->user()->status == 1 ? 'disabled':'' }}">Balance Transfer</a>
                      <a href="#" class="list-group-item list-group-item-action {{ Auth::guard('verified_user')->user()->status == 1 ? 'disabled':'' }}">Balance Add</a>
                      <a  href="/dashboard/order-history" class="list-group-item list-group-item-action {{ Auth::guard('verified_user')->user()->status== 1 ? 'disabled':'' }}" aria-current="true">
                        Order History
                      </a>
                      <a href="/dashboard/personal-infor" class="list-group-item list-group-item-action {{ Auth::guard('verified_user')->user()->status == 1 ? 'disabled':'' }}">Setting</a>
                      <a href="#" class="list-group-item list-group-item-action {{ Auth::guard('verified_user')->user()->status == 1 ? 'disabled':'' }}">Change Password</a>
                    </div>
                  </div>
            </div>
            @yield('contetn')
        </div>
    </div>
<script type="text\javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.25.0/axios.min.js"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/fontawesome.min.js') }}"></script>
<script src="{{ asset('js/all.min.js') }}"></script>
  <script>
    let balance = document.getElementById("balance").value;
    let userBalance = parseInt(balance).toFixed(2);
    let balancesss = document.getElementById("balances").innerHTML = "$"+userBalance;
  </script>

</body>
</html>