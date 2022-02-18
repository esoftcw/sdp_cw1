<div>
    @foreach($inputs as $input)
        <div>
            <hr>
            <x-input field="receiver_name">
                <input
                    type="text"
                    name="receivers[{{$input}}][name]"
                    class="form-control @error('receiver_name') is-invalid @enderror"
                    placeholder="{{ __('Receiver Name') }}"
                    value="{{ $pickup['deliveries'][$input]['name'] }}"
                    required
                    autofocus
                >
            </x-input>
            <x-input field="receiver_mobile">
                <input
                    type="text"
                    name="receivers[{{$input}}][mobile]"
                    class="form-control @error('receiver_mobile') is-invalid @enderror"
                    placeholder="{{ __('Receiver Mobile') }}"
                    value="{{ $pickup['deliveries'][$input]['mobile'] }}"
                    required
                    autofocus
                >
            </x-input>
            <x-input field="receiver_address">
                <input
                    type="text"
                    name="receivers[{{$input}}][address]"
                    class="form-control @error('receiver_address') is-invalid @enderror"
                    placeholder="{{ __('Receiver Address') }}"
                    value="{{ $pickup['deliveries'][$input]['address']['address'] }}"
                    required
                    autofocus
                >
            </x-input>
            <livewire:city-search :wire:key="$input" name="receivers[{{$input}}][city_id]" :city="$pickup['deliveries'][$input]['address']['city']"/>
            <x-input field="package_weight">
                <input
                    type="number"
                    name="receivers[{{$input}}][packages][0][weight]"
                    class="form-control @error('package_weight') is-invalid @enderror"
                    placeholder="{{ __('Package Weight') }}"
                    value="{{ $pickup['deliveries'][$input]['packages'][0]['weight'] }}"
                    required
                    autofocus
                >
            </x-input>
            <x-input field="package_note">
                <input
                    type="text"
                    name="receivers[{{$input}}][packages][0][note]"
                    class="form-control @error('package_note') is-invalid @enderror"
                    placeholder="{{ __('Package Note') }}"
                    value="{{ $pickup['deliveries'][$input]['packages'][0]['note'] }}"
                    required
                    autofocus
                >
            </x-input>
            <x-input field="package_width">
                <input
                    type="number"
                    name="receivers[{{$input}}][packages][0][width]"
                    class="form-control @error('package_size') is-invalid @enderror"
                    placeholder="{{ __('Package Width') }}"
                    value="{{ $pickup['deliveries'][$input]['packages'][0]['width'] }}"
                    required
                    autofocus
                >
            </x-input>
            <x-input field="package_height">
                <input
                    type="number"
                    name="receivers[{{$input}}][packages][0][height]"
                    class="form-control @error('package_size') is-invalid @enderror"
                    placeholder="{{ __('Package Width') }}"
                    value="{{ $pickup['deliveries'][$input]['packages'][0]['height'] }}"
                    required
                    autofocus
                >
            </x-input>
            <x-input field="package_length">
                <input
                    type="number"
                    name="receivers[{{$input}}][packages][0][length]"
                    class="form-control @error('package_size') is-invalid @enderror"
                    placeholder="{{ __('Package Length') }}"
                    value="{{ $pickup['deliveries'][$input]['packages'][0]['length'] }}"
                    required
                    autofocus
                >
            </x-input>
            @if(count($inputs) > 1)
                <button type="button" class="btn btn-danger mb-2" wire:click="remove({{$input}})">Remove</button>
            @endif
        </div>
    @endforeach
    <button type="button" class="btn btn-info mb-2" wire:click="add({{$i}})">Add</button>
</div>
