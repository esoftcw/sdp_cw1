<x-layouts.guest :title="__('Login')">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <x-input icon="fas fa-user" field="name">
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

        <x-input icon="fas fa-envelope" field="email">
            <input
                type="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                placeholder="{{ __('Email') }}"
                value="{{ old('email') }}"
                required
            >
        </x-input>

        <x-input icon="fas fa-lock" field="password">
            <input
                type="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="{{ __('Password') }}"
                value="{{ old('password') }}"
                required
            >
        </x-input>

        <x-input icon="fas fa-lock" field="password">
            <input
                type="password"
                name="password_confirmation"
                class="form-control @error('password_confirmation') is-invalid @enderror"
                placeholder="{{ __('Confirm Password') }}"
                value="{{ old('password_confirmation') }}"
                required
            >
        </x-input>

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
            </div>
        </div>
    </form>
</x-layouts.guest>
