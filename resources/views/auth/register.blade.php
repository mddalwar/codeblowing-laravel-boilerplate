@extends('layouts.auth')

@section('title', 'Sign Up')

@section('content')
    <div class="card-body login-card-body">
      <p class="login-box-msg">Register yourself to start session</p>

      <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="input-group">
          <input type="text" class="form-control" name="name" placeholder="Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="text-danger mb-3">@error('name') {{ $message }} @enderror</div>
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
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      @if (Route::has('login'))
      <p class="mb-1">
        <a href="{{ route('login') }}">Have an account? Login Now</a>
      </p>
      @endif
    </div>
@endsection