<x-layouts.app>
    <div class="row">
        <div class="col-lg-6">
            <x-form route="vehicles" :id="$vehicle">
                <x-input icon="fas fa-user" field="number">
                    <input
                        type="text"
                        name="number"
                        class="form-control @error('number') is-invalid @enderror"
                        placeholder="{{ __('Number') }}"
                        value="{{ old('name', $vehicle->number) }}"
                        required
                    >
                </x-input>
            </x-form>
        </div>
    </div>

</x-layouts.app>
