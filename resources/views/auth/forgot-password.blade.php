@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="card-body login-card-body">
      <p class="login-box-msg">Give your account email to send account verification link.</p>

      @if(Session::has('status'))
      <div class="alert alert-success">{{ Session::get('status') }}</div>
      @endif

      <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="input-group">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>          
        </div>
        <div class="text-danger mb-3">@error('email') {{ $message }} @enderror</div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Send Link</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      @if (Route::has('login'))
      <p class="mb-1">
        <a href="{{ route('login') }}">Login to Account</a>
      </p>
      @endif
    </div>
@endsection
{{--
<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
--}}
