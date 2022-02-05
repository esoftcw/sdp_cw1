<x-layouts.app>
    <div class="row">
        <div class="col-lg-6">
            <x-form route="users" :id="$user">
                <x-input icon="fas fa-user" field="name">
                    <input
                        type="text"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="{{ __('Name') }}"
                        value="{{ old('name', $user->name) }}"
                        required
                    >
                </x-input>
                <x-input icon="fas fa-envelope" field="email">
                    <input
                        type="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="{{ __('Email') }}"
                        value="{{ old('email', $user->email) }}"
                        required
                    >
                </x-input>
                <x-input icon="fas fa-lock" field="password">
                    <input
                        type="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="{{ __('Password') }}"
                    >
                </x-input>
                <x-input icon="fas fa-lock" field="password_confirmation">
                    <input
                        type="password"
                        name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        placeholder="{{ __('New Password Confirmation') }}"
                    >
                </x-input>

            </x-form>
        </div>
    </div>

</x-layouts.app>
