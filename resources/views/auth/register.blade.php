@extends('layouts.master')
@section('content')
<style>
.bg-register-image{
  background-image:url("{{asset('upload/blogimage/register.jpg')}}") !important;
  background-size:contain !important;
  background-repeat:no-repeat !important;
}
</style>

<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
      <div class="col-lg-7">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
          </div>

            <form class="user"  method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group row">
                <div class="col-sm-12">
                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" placeholder="First Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email"  placeholder="Email Address" value="{{ old('email') }}" required autocomplete="off">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password-confirm" placeholder="Repeat Password" name="password_confirmation" required autocomplete="new-password">
                </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Register') }}
                </button>
                <hr>
            </form>
          <hr>
          <div class="text-center">
            <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
@endsection
