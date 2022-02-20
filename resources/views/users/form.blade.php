<x-layouts.app header="{{$user ? 'Edit' : 'Add'}} User">
    <div class="row">
        <div class="col-lg-6">
            <x-form route="users" :id="$user">
                <x-input field="name" label="Name">
                    <input
                        type="text"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="{{ __('Name') }}"
                        value="{{ old('name', $user->name) }}"
                        required
                    >
                </x-input>
                <x-input field="email" label="Email">
                    <input
                        type="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="{{ __('Email') }}"
                        value="{{ old('email', $user->email) }}"
                        required
                    >
                </x-input>
                <x-input field="password" label="Password">
                    <input
                        type="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="{{ __('Password') }}"
                    >
                </x-input>
                <x-input field="role" label="Role">
                    <select name="role" class="form-control">
                        @foreach($roles as $role)
                            <option {{old('role', $user->role) == $role ? 'selected' : ''}} value="{{$role}}">{{$role}}</option>
                        @endforeach
                    </select>
                </x-input>
                @if(in_array($user->role, ['center-admin', 'rider']))
                <x-input field="center_id" label="Center">
                    <select
                        name="center_id"
                        class="form-control @error('center_id') is-invalid @enderror"
                    >
                        <option value="">Select Center</option>
                        @foreach($centers as $center)
                            <option {{old('center_id', $user->center_id) == $center->id ? 'selected' : ''}} value="{{$center->id}}">{{$center->name}}</option>
                        @endforeach
                    </select>
                </x-input>
                @endif
            </x-form>
        </div>
    </div>

</x-layouts.app>
