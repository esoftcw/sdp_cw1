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
            </x-form>
        </div>
    </div>

</x-layouts.app>
