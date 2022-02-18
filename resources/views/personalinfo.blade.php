@extends('layouts.menu')
@section('title', 'Profile')

@section('contetn')

<style>
    .profile-image{
        widows: 100px;
        height: 100px;
        text-align: center;
    }
    .profile-image img{
        widows: 100px;
        height: 100px;
        text-align: center;
    }
</style>
<div class="col-md-8">
  @if(Session('success'))
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
        {{ Session::get('success') }}
      </div>
    </div>
  @endif

  @if(Session('failed'))
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
  <div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#check-circle-fill"/></svg>
    <div>
      {{ Session::get('failed') }}
    </div>
    
  </div>
@endif

@if(Auth::guard('verified_user')->user()->status == 1)
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
  <div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#check-circle-fill"/></svg>
    <div>
      Your account has been blocked
    </div>
    
  </div>
@endif
    <div class="card">
        <div class="card-body">
            <p class="text-center fw-bold">Personal Information</p>
            <form action="{{ route('UserInfoUpdate') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                  <div class="col-md-6">
                   
                      <label for="fname">First Name</label>
                      <input {{ Auth::guard('verified_user')->user()->status == 1 ? 'readonly':'' }} class="form-control" type="text" name="fname" id="fname" placeholder="First Name" value="{{Auth::guard('verified_user')->user()->first_name }}">
                     <input type="hidden" name="id" id="id" value="{{ Auth::guard('verified_user')->user()->id }}">

                      <label class="mt-2" for="email">Email</label>
                      <input {{ Auth::guard('verified_user')->user()->status == 1 ? 'readonly':'' }} class="form-control" type="email" name="email" id="email" placeholder="Email" value="{{ Auth::guard('verified_user')->user()->email }}">

                      <label class="mt-2" for="address">Address</label>
                      <input {{ Auth::guard('verified_user')->user()->status == 1 ? 'readonly':'' }} class="form-control" type="text" name="address" id="address" placeholder="#Holding/Word" value="{{ Auth::guard('verified_user')->user()->address }}">
                      

                      <label class="mt-2" for="zella">City</label>
                      <select {{ Auth::guard('verified_user')->user()->status == 1 ? 'readonly':'' }} class="form-control" name="city" id="zella">
                          <option value="">Select Your City</option>
                          <option {{ Auth::guard('verified_user')->user()->city === "Jessore" ? "selected":"Select Your City" }} value="Jessore">Jessore</option>
                          <option {{ Auth::guard('verified_user')->user()->city === "Magura" ? "selected":"Select Your City" }} value="Magura">Magura</option>
                          <option {{ Auth::guard('verified_user')->user()->city === "Barishal" ? "selected":"Select Your City" }} value="Barishal">Barishal</option>
                          <option {{ Auth::guard('verified_user')->user()->city === "Sunamganj" ? "selected":"Select Your City" }} value="Sunamganj">Sunamganj</option>
                      </select>

                      <label class="mt-2" for="dob">Date Of Birth</label>
                      <input {{ Auth::guard('verified_user')->user()->status == 1 ? 'readonly':'' }} class="form-control" type="date" name="dob" id="dob" value="{{ Auth::guard('verified_user')->user()->date_of_birth }}">

                     
                    </div>
                    <div class="col-md-6">
                      <label for="lName">Last Name</label>
                      <input {{ Auth::guard('verified_user')->user()->status == 1 ? 'readonly':'' }} class="form-control" type="text" name="lName" id="lName" placeholder="Last Name" value="{{ Auth::guard('verified_user')->user()->last_name }}">

                      <label class="mt-2" for="phone">Phone Number</label>
                      <div class="row">
                        <div class="col-md-3 mr-0">
                            <select class="form-control" name="" id="">
                                <option value="">+880</option>
                                <option value="">+411</option>
                                <option value="">+091</option>
                                <option value="">+126</option>
                                <option value="">+263</option>
                                <option value="">+542</option>
                            </select>
                        </div>
                        <div class="col-md-9 ps-0">
                          <input {{ Auth::guard('verified_user')->user()->status == 1 ? 'readonly':'' }} class="form-control " type="number" name="phone" id="phone" placeholder="017********" value="{{ Auth::guard('verified_user')->user()->phone }}">
                        </div>
                      </div>

                      <label class="mt-2" for="state">State</label>
                      <select {{ Auth::guard('verified_user')->user()->status == 1 ? 'readonly':'' }} class="form-control" name="state" id="state">
                          <option value="">Select Your State</option>
                          <option {{ Auth::guard('verified_user')->user()->state === "Dhaka" ? 'selected':'Select Your State' }} value="Dhaka">Dhaka</option>
                          <option {{ Auth::guard('verified_user')->user()->state === "Khulna" ? 'selected':'Select Your State' }} value="Khulna">Khulna</option>
                          <option {{ Auth::guard('verified_user')->user()->state === "Barishal" ? 'selected':'Select Your State' }} value="Barishal">Barishal</option>
                          <option {{ Auth::guard('verified_user')->user()->state === "Sylhet" ? 'selected':'Select Your State' }} value="Sylhet">Sylhet</option>
                      </select>

                      <label class="mt-2" for="Thana">Thana</label>
                      <select {{ Auth::guard('verified_user')->user()->status == 1 ? 'readonly':'' }} class="form-control" name="thana" id="Thana">
                          <option value="">Select Your Thana</option>
                          <option {{ Auth::guard('verified_user')->user()->thana === "Chowgachha" ? 'selected':'Select Your Thana' }} value="Chowgachha">Chowgachha</option>
                          <option {{ Auth::guard('verified_user')->user()->thana === "Jhikargachha" ? 'selected':'Select Your Thana' }} value="Jhikargachha">Jhikargachha</option>
                      </select>

                      <label for="profile">Profile Picture</label>
                      <input  class="form-control" type="file" name="image" id="picture">
                    </div>
                    
                    
                </div>
                <button {{ Auth::guard('verified_user')->user()->status == 1 ? 'disabled':'' }} type="submit" class="btn btn-primary float-end mt-2" >Save</button>
            </form>
        </div>
    </div>
</div>
@endsection