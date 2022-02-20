<x-layouts.app header="{{$status}}">
    <div class="row">
        <div class="col-lg-6">
            <x-form route="statuses">
                <input type="hidden" name="status" value="{{$status}}">
                <x-input field="delivery_id" label="Package Number">
                    <input
                        type="number"
                        name="delivery_id"
                        class="form-control @error('delivery_id') is-invalid @enderror"
                        placeholder="{{ __('Package Number') }}"
                        required
                    >
                </x-input>
{{--                <x-input field="address" label="Address">--}}
{{--                    <input--}}
{{--                        type="text"--}}
{{--                        name="address"--}}
{{--                        class="form-control @error('address') is-invalid @enderror"--}}
{{--                        placeholder="{{ __('Address') }}"--}}
{{--                        value="{{ old('address', $center->address->address) }}"--}}
{{--                        required--}}
{{--                    >--}}
{{--                </x-input>--}}
            </x-form>
        </div>
    </div>

</x-layouts.app>
