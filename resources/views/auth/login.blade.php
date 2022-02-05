@extends('components.layouts.guest')

@section('content')
    <div class="card-body login-card-body">
        <p class="login-box-msg">{{ __('Login') }}</p>

        <form action="{{ route('login') }}" method="post">
            @csrf

            <x-input icon="fas fa-envelope" field="email">
                <input
                    type="text"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="{{ __('Email') }}"
                    value="{{ old('email') }}"
                    required
                    autofocus
                >
            </x-input>
            <x-input icon="fas fa-lock" field="password">
                <input
                    type="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="{{ __('Password') }}"
                    required
                >
            </x-input>

            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        @if (Route::has('password.request'))
            <p class="mb-1">
                <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
            </p>
        @endif
    </div>
    <!-- /.login-card-body -->
@endsection
