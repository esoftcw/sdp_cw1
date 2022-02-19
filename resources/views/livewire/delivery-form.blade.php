<div>
    @foreach($inputs as $input)
        <div class="row">
            <div class="col-6">
                <x-input field="receiver_name" label="Receiver Name">
                    <input
                        type="text"
                        name="receivers[{{$input}}][name]"
                        class="form-control"
                        placeholder="{{ __('Receiver Name') }}"
                        value="{{ $deliveries[$input]['name'] }}"
                        required
                    >
                </x-input>
            </div>
            <div class="col-6">
                <x-input field="receiver_mobile" label="Receiver Mobile">
                    <input
                        type="text"
                        name="receivers[{{$input}}][mobile]"
                        class="form-control"
                        placeholder="{{ __('Receiver Mobile') }}"
                        value="{{ $deliveries[$input]['mobile'] }}"
                        required
                    >
                </x-input>
            </div>
            <div class="col-12">
                <x-input field="receiver_address" label="Receiver Address">
                    <input
                        type="text"
                        name="receivers[{{$input}}][address]"
                        class="form-control"
                        placeholder="{{ __('Receiver Address') }}"
                        value="{{ $deliveries[$input]['address']['address'] }}"
                        required
                    >
                </x-input>
            </div>
        </div>
        <livewire:city-search :wire:key="$input" name="receivers[{{$input}}][city_id]" :city="$deliveries[$input]['address']['city']"/>
        <div class="row">
            <div class="col-12">
                <x-input field="package_note" label="Package Note">
                    <input
                        type="text"
                        name="receivers[{{$input}}][packages][0][note]"
                        class="form-control"
                        placeholder="{{ __('Package Note') }}"
                        value="{{ $deliveries[$input]['packages'][0]['note'] }}"
                        required
                    >
                </x-input>
            </div>
            <div class="col-3">
                <x-input field="package_weight" label="Weight(g)">
                    <input
                        type="number"
                        name="receivers[{{$input}}][packages][0][weight]"
                        class="form-control"
                        placeholder="{{ __('Package Weight') }}"
                        value="{{ $deliveries[$input]['packages'][0]['weight'] }}"
                        required
                    >
                </x-input>
            </div>
            <div class="col-3">
                <x-input field="package_width" label="Width(cm)">
                    <input
                        type="number"
                        name="receivers[{{$input}}][packages][0][width]"
                        class="form-control"
                        placeholder="{{ __('Package Width') }}"
                        value="{{ $deliveries[$input]['packages'][0]['width'] }}"
                        required
                    >
                </x-input>
            </div>
            <div class="col-3">
                <x-input field="package_height" label="Height(cm)">
                    <input
                        type="number"
                        name="receivers[{{$input}}][packages][0][height]"
                        class="form-control"
                        placeholder="{{ __('Package Width') }}"
                        value="{{ $deliveries[$input]['packages'][0]['height'] }}"
                        required
                    >
                </x-input>
            </div>
            <div class="col-3">
                <x-input field="package_length" label="Length(cm)">
                    <input
                        type="number"
                        name="receivers[{{$input}}][packages][0][length]"
                        class="form-control"
                        placeholder="{{ __('Package Length') }}"
                        value="{{ $deliveries[$input]['packages'][0]['length'] }}"
                        required
                    >
                </x-input>
            </div>
            @if($deliveries)
                <div class="col-4">
                    <x-input label="Price(Rs)">
                        <input
                            type="text"
                            readonly
                            class="form-control"
                            value="{{ $deliveries[$input]['packages'][0]['price'] }}"
                        >
                    </x-input>
                </div>
                <div class="col-4">
                    <x-input label="Distance(Km)">
                        <input
                            type="text"
                            readonly
                            class="form-control"
                            value="{{ $deliveries[$input]->distance() }}"
                        >
                    </x-input>
                </div>
                <div class="col-4">
                    <x-input label="Route">
                        <input
                            type="text"
                            readonly
                            class="form-control"
                            value="{{ $deliveries[$input]->route->name}}"
                        >
                    </x-input>
                </div>
            @endif
        </div>
        @if(count($inputs) > 1)
            <button type="button" class="btn btn-danger mb-2" wire:click="remove({{$input}})">Remove</button>
        @endif
        <hr>
    @endforeach
    <button type="button" class="btn btn-info mb-2" wire:click="add({{$i}})">Add</button>
</div>

