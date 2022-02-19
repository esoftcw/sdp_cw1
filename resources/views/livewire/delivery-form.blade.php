<div>
    @foreach($inputs as $input)
        <div>
            <hr>
            <x-input field="receiver_name">
                <input
                    type="text"
                    name="receivers[{{$input}}][name]"
                    class="form-control"
                    placeholder="{{ __('Receiver Name') }}"
                    value="{{ $deliveries[$input]['name'] }}"
                    required
                >
            </x-input>
            <x-input field="receiver_mobile">
                <input
                    type="text"
                    name="receivers[{{$input}}][mobile]"
                    class="form-control"
                    placeholder="{{ __('Receiver Mobile') }}"
                    value="{{ $deliveries[$input]['mobile'] }}"
                    required
                >
            </x-input>
            <x-input field="receiver_address">
                <input
                    type="text"
                    name="receivers[{{$input}}][address]"
                    class="form-control"
                    placeholder="{{ __('Receiver Address') }}"
                    value="{{ $deliveries[$input]['address']['address'] }}"
                    required
                >
            </x-input>
            <livewire:city-search :wire:key="$input" name="receivers[{{$input}}][city_id]" :city="$deliveries[$input]['address']['city']"/>
            <x-input field="package_weight">
                <input
                    type="number"
                    name="receivers[{{$input}}][packages][0][weight]"
                    class="form-control"
                    placeholder="{{ __('Package Weight') }}"
                    value="{{ $deliveries[$input]['packages'][0]['weight'] }}"
                    required
                    autofocus
                >
            </x-input>
            <x-input field="package_note">
                <input
                    type="text"
                    name="receivers[{{$input}}][packages][0][note]"
                    class="form-control"
                    placeholder="{{ __('Package Note') }}"
                    value="{{ $deliveries[$input]['packages'][0]['note'] }}"
                    required
                >
            </x-input>
            <x-input field="package_width">
                <input
                    type="number"
                    name="receivers[{{$input}}][packages][0][width]"
                    class="form-control"
                    placeholder="{{ __('Package Width') }}"
                    value="{{ $deliveries[$input]['packages'][0]['width'] }}"
                    required
                    autofocus
                >
            </x-input>
            <x-input field="package_height">
                <input
                    type="number"
                    name="receivers[{{$input}}][packages][0][height]"
                    class="form-control"
                    placeholder="{{ __('Package Width') }}"
                    value="{{ $deliveries[$input]['packages'][0]['height'] }}"
                    required
                >
            </x-input>
            <x-input field="package_length">
                <input
                    type="number"
                    name="receivers[{{$input}}][packages][0][length]"
                    class="form-control"
                    placeholder="{{ __('Package Length') }}"
                    value="{{ $deliveries[$input]['packages'][0]['length'] }}"
                    required
                >
            </x-input>
            @if($deliveries)
            <x-input>
                <input
                    type="text"
                    readonly
                    class="form-control"
                    value="{{ $deliveries[$input]['packages'][0]['price'] }}"
                >
            </x-input>
            <x-input>
                <input
                    type="text"
                    readonly
                    class="form-control"
                    value="{{ $deliveries[$input]->distance() }}"
                >
            </x-input>
            <x-input>
                <input
                    type="text"
                    readonly
                    class="form-control"
                    value="{{ $deliveries[$input]->route->name}}"
                >
            </x-input>
            @endif
            @if(count($inputs) > 1)
                <button type="button" class="btn btn-danger mb-2" wire:click="remove({{$input}})">Remove</button>
            @endif
        </div>
    @endforeach
    <button type="button" class="btn btn-info mb-2" wire:click="add({{$i}})">Add</button>
</div>
