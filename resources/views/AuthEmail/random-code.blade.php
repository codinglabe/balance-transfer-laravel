@extends('layouts.main')
@section('title', 'Email Verify')

<style>
    .email{
        colo: red;
    }
</style>

<p class="fw-bold email" >Hi </p><br>

<p>Here is your Code: <span class="fw-bold">{{ $email_data['code'] }}</span></p><br><br>

Thank You?<br><br>

www.Codinglab.com