@extends('layouts.header')

@section('content')

    <!-- ====== Navbar Section Start -->
    <x-navbar.second-navbar/>
    <!-- ====== Navbar Section End -->

    <!-- ====== Forms Section Start -->
    @if (Request::url() === 'http://127.0.0.1:8000/register')
        @section('title')
            Register
        @endsection
        <x-form.register-form />
    @elseif(Request::url() === 'http://127.0.0.1:8000/login')
        @section('title')
            Login
        @endsection
        <x-form.login-form />
    @elseif(Request::url() === 'http://127.0.0.1:8000/forgetPassword')
        @section('title')
            Forget Password
        @endsection
        <x-form.forget-password-form />
    @else
        @section('title')
            Reset Password
        @endsection
        <x-form.reset-password-form :token="$token" />
    @endif
    <!-- ====== Forms Section End -->

@endsection
