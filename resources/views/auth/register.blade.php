<x-layouts.guest :title="__('Register')">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <x-input field="name" label="Name">
            <input
                type="text"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                placeholder="{{ __('Name') }}"
                value="{{ old('name') }}"
                required
                autofocus
            >
        </x-input>

        <x-input field="email" label="Email">
            <input
                type="email"
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
                value="{{ old('password') }}"
                required
            >
        </x-input>

        <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
    </form>
    <p class="mt-2">
        <a href="{{ route('login') }}">{{ __('Already have an account ? Login') }}</a>
    </p>

</x-layouts.guest>
