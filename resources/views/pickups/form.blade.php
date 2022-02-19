<x-layouts.app header="{{$pickup ? 'Edit' : 'Add'}} Pickup">
    <x-form route="pickups" :id="$pickup" :novalidate="false">
    <div class="row">
        <div class="col-lg-5">
            @csrf
            <div class="row">
                <div class="col-6">
                    <x-input field="sender_name" label="Schedule">
                        <input
                            type="datetime-local"
                            name="shedule"
                            class="form-control"
                            placeholder="{{ __('Shedule') }}"
                            {{--                value="{{ old('sender_name', $pickup->shedule->name) }}"--}}
                        >
                    </x-input>
                </div>
                <div class="col-6">
                    <x-input field="sender_name" label="Sender Name">
                        <input
                            type="text"
                            name="sender_name"
                            class="form-control"
                            placeholder="{{ __('Sender Name') }}"
                            value="{{ old('sender_name', $pickup->customer->name) }}"
                            required
                        >
                    </x-input>
                </div>
                <div class="col-6">
                    <x-input field="sender_mobile" label="Sender Mobile">
                        <input
                            type="text"
                            name="sender_mobile"
                            class="form-control"
                            placeholder="{{ __('Sender Mobile') }}"
                            value="{{ old('sender_mobile', $pickup->customer->mobile) }}"
                            required
                        >
                    </x-input>
                </div>
                <div class="col-12">
                    <x-input field="sender_address" label="Sender Address">
                        <input
                            type="text"
                            name="sender_address"
                            class="form-control"
                            placeholder="{{ __('Sender Address') }}"
                            value="{{ old('sender_address', $pickup->address->address) }}"
                            required
                        >
                    </x-input>
                </div>
            </div>
            <livewire:city-search name="sender_city_id" :city="$pickup->address->city"/>
        </div>
        <div class="col-7">

            <livewire:delivery-form :pickup="$pickup"/>
        </div>

    </div>
    </x-form>
</x-layouts.app>
