@extends('layouts/blankLayout')

@section('title', 'Dashboard Login')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')
<div class="container-xxl" >
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card" >
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <span class=" demo"><img src="{{asset('assets/img/bu_crm_logo.png')}}" style="" width="205px" alt="LOGO" class="rounded"></span>
              <!-- <h3 class="  fw-bolder" style="color: #6B8A3C"> CRM Dashboard</h3> -->
            </a>
          </div>
          <!-- /Logo -->
         
          <p class="mb-4"></p>

          <form id="formAuthentication" class="mb-3" action="{{route('login')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email </label>
              <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email or username" autofocus>
                @error('email')
    <span class="text-danger">{{ $message }}</span>
@enderror
            </div>
            <div class="mb-3 form-password-toggle">
              <!-- <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                <a href="{{url('auth/forgot-password-basic')}}">
                  <small>Forgot Password?</small>
                </a>
             
              </div> -->
              <label for="password" class="form-label">Password</label>
              <div class="input-group input-group-merge">
             
                <input type="password" id="password" class="form-control  @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
                @error('password')
    <span class="text-danger">{{ $message }}</span>
@enderror
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me">
                <label class="form-check-label" for="remember-me">
                  Remember Me
                </label>
              </div>
            </div>
            <div class="mb-3">
              <button class="btn btn-success d-grid w-100" type="submit" style="background-color: #6B8A3C;
    border-color: #678236;
    color: white;">Login</button>
            </div>
          </form>

          <!-- <p class="text-center">
            <span>New on our platform?</span>
            <a href="{{url('auth/register-basic')}}">
              <span>Create an account</span>
            </a>
          </p> -->
        </div>
      </div>
    </div>
    <!-- /Register -->
  </div>
</div>
</div>
@endsection
