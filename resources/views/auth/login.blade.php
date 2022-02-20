<x-layouts.guest :title="__('Login')">
    <form action="{{ route('login') }}" method="post">
        @csrf
        <x-input field="email" label="Email">
            <input
                type="text"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                placeholder="{{ __('Email') }}"
                value="{{ old('email') }}"
                required
            >
        </x-input>
        <x-input field="password" label="Password">
            <input
                type="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="{{ __('Password') }}"
                required
            >
        </x-input>

        <div class="icheck-primary">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
        <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
    </form>
    <p class="mt-2">
        <a href="{{ route('register') }}">{{ __('Do not have an account ? Register') }}</a>
    </p>
</x-layouts.guest>
