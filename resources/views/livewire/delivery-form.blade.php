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
                    value="{{ $receiver_name }}"
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
                    value="{{ $receiver_mobile }}"
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
                    value="{{ $receiver_address }}"
                    required
                    autofocus
                >
            </x-input>
            <livewire:city-search :wire:key="$input" name="receivers[{{$input}}][city_id]"/>
            <x-input field="package_weight">
                <input
                    type="number"
                    name="receivers[{{$input}}][packages][0][weight]"
                    class="form-control @error('package_weight') is-invalid @enderror"
                    placeholder="{{ __('Package Weight') }}"
                    value="{{ old('package_weight') }}"
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
                    value="{{ old('package_note') }}"
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
                    value="{{ old('package_size') }}"
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
                    value="{{ old('package_size') }}"
                    required
                    autofocus
                >
            </x-input>
            <x-input field="package_length">
                <input
                    type="number"
                    name="receivers[{{$input}}][packages][0][length]"
                    class="form-control @error('package_size') is-invalid @enderror"
                    placeholder="{{ __('Package Width') }}"
                    value="{{ old('package_size') }}"
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
