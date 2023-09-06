@extends('layouts.auth')

@section('title', 'Set New Password')

@section('content')
    <div class="card-body login-card-body">
      <p class="login-box-msg">Set your new strong password</p>

      <form action="{{ route('password.store') }}" method="POST">
        @csrf
        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        
        <div class="input-group">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>          
        </div>
        <div class="text-danger mb-3">@error('email') {{ $message }} @enderror</div>
        <div class="input-group">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="text-danger mb-3">@error('password') {{ $message }} @enderror</div>
        <div class="input-group">
          <input type="password" class="form-control" name="password_confirmation" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="text-danger mb-3">@error('password_confirmation') {{ $message }} @enderror</div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
@endsection