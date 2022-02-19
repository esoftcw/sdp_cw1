<x-layouts.app header="{{$center ? 'Edit' : 'Add'}} Center">
    <div class="row">
        <div class="col-lg-6">
            <x-form route="centers" :id="$center">
                <x-input field="name" label="Name">
                    <input
                        type="text"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="{{ __('Name') }}"
                        value="{{ old('name', $center->name) }}"
                        required
                    >
                </x-input>
                <x-input field="address" label="Address">
                    <input
                        type="text"
                        name="address"
                        class="form-control @error('address') is-invalid @enderror"
                        placeholder="{{ __('Address') }}"
                        value="{{ old('address', $center->address->address) }}"
                        required
                    >
                </x-input>
                <livewire:city-search  name="city_id" :city="$center->address->city"/>
            </x-form>
        </div>
    </div>

</x-layouts.app>
