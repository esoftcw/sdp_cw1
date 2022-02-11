<x-layouts.app>
    <div class="row">
        <div class="col-lg-6">
            <x-form route="centers" :id="$center">
                <x-input icon="fas fa-user" field="name">
                    <input
                        type="text"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="{{ __('Name') }}"
                        value="{{ old('name', $center->name) }}"
                        required
                    >
                </x-input>
                <x-input icon="fas fa-user" field="name">
                    <input
                        type="text"
                        name="address"
                        class="form-control @error('address') is-invalid @enderror"
                        placeholder="{{ __('Address') }}"
                        value="{{ old('address', $center->address) }}"
                        required
                    >
                </x-input>
                <x-input icon="fas fa-user" field="city_id">
                    <select
                        required
                        name="city_id"
                        class="form-control @error('city_id') is-invalid @enderror"
                    >
                        @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                    </select>
                </x-input>
            </x-form>
        </div>
    </div>

</x-layouts.app>
