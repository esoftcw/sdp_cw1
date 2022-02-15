<div>
    <button type="button" class="btn btn-info" wire:click="add({{$i}})">Add</button>
    @foreach($inputs as $input)
        <div class="delete_receiver">
            <x-input field="receiver_name">
                <input
                    type="text"
                    name="receiver_name[]"
                    class="form-control @error('receiver_name') is-invalid @enderror"
                    placeholder="{{ __('Receiver Name') }}"
                    value="@{{ receiver_name }}"
                    required
                    autofocus
                >
            </x-input>
            <x-input field="receiver_mobile">
                <input
                    type="text"
                    name="receiver_mobile[]"
                    class="form-control @error('receiver_mobile') is-invalid @enderror"
                    placeholder="{{ __('Receiver Mobile') }}"
                    value="@{{ receiver_mobile }}"
                    required
                    autofocus
                >
            </x-input>
            <x-input field="receiver_address">
                <input
                    type="text"
                    name="receiver_address[]"
                    class="form-control @error('receiver_address') is-invalid @enderror"
                    placeholder="{{ __('Receiver Address') }}"
                    value="@{{ receiver_address }}"
                    required
                    autofocus
                >
            </x-input>
            <livewire:city-search :wire:key="$input" name="receiver_city_id[]"/>
            <x-input field="package_weight">
                <input
                    type="number"
                    name="package_weight"
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
                    name="package_note[]"
                    class="form-control @error('package_note') is-invalid @enderror"
                    placeholder="{{ __('Package Note') }}"
                    value="{{ old('package_note') }}"
                    required
                    autofocus
                >
            </x-input>
            <x-input field="package_size">
                <input
                    type="number"
                    name="package_size"
                    class="form-control @error('package_size') is-invalid @enderror"
                    placeholder="{{ __('Package Size') }}"
                    value="{{ old('package_size') }}"
                    required
                    autofocus
                >
            </x-input>
            @if(count($inputs) > 1)
                <button type="button" class="btn btn-danger" wire:click="remove({{$input}})">Remove</button>
            @endif
        </div>
    @endforeach
</div>
