@extends('layouts.main')
@section('title', 'Email Verify')

Hello {{ $email_data['name'] }}
<br><br>

Welcome To My Website
<br>
please click the link blow to verify your email and active your account!
<a href="http://127.0.0.1:8000/verify?code={{ $email_data['verification_code'] }}">Click Here</a>

<br><br>

Thank You

<br><br>

sn.com