<x-layouts.app header="{{$vehicle ? 'Edit' : 'Add'}} Vehicle">
    <div class="row">
        <div class="col-lg-6">
            <x-form route="vehicles" :id="$vehicle">
                <x-input field="number" label="Number">
                    <input
                        type="text"
                        name="number"
                        class="form-control @error('number') is-invalid @enderror"
                        placeholder="{{ __('Number') }}"
                        value="{{ old('name', $vehicle->number) }}"
                        required
                    >
                </x-input>
                <x-input field="user_id" label="Driver">
                    <select
                        name="user_id"
                        class="form-control @error('user_id') is-invalid @enderror"
                    >
                        @foreach($users as $user)
                            <option {{old('user_id', $vehicle->user_id) == $user->id ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </x-input>

            </x-form>
        </div>
    </div>

</x-layouts.app>
