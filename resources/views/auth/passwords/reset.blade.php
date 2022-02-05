@extends('components.layouts.guest')

@section('content')
    <div class="card-body login-card-body">
        <p class="login-box-msg">{{ __('Reset Password') }}</p>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <x-input icon="fas fa-envelope" field="email">
                <input
                    type="email"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="{{ __('Email') }}"
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

            <x-input icon="fas fa-lock" field="password_confirmation">
                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    placeholder="{{ __('Confirm Password') }}"
                    required
                >
            </x-input>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Reset Password') }}</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
@endsection
