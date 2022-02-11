
@extends('components.layouts.guest')

@section('content')
    <div class="card-body login-card-body">
        <p class="login-box-msg">{{ __('Pickup Request') }}</p>

        <form action="{{route('pickups.store')}}" method="post">
            @csrf
            <x-input icon="fas fa-envelope" field="sender_name">
                <input
                    type="text"
                    name="sender_name"
                    class="form-control @error('sender_name') is-invalid @enderror"
                    placeholder="{{ __('Sender Name') }}"
                    value="{{ old('sender_name') }}"
                    required
                    autofocus
                >
            </x-input>
            <x-input field="sender_mobile">
                <input
                    type="text"
                    name="sender_mobile"
                    class="form-control @error('sender_mobile') is-invalid @enderror"
                    placeholder="{{ __('Sender Mobile') }}"
                    value="{{ old('sender_mobile') }}"
                    required
                    autofocus
                >
            </x-input>
            <x-input field="sender_address">
                <input
                    type="text"
                    name="sender_address"
                    class="form-control @error('sender_address') is-invalid @enderror"
                    placeholder="{{ __('Sender Address') }}"
                    value="{{ old('sender_address') }}"
                    required
                    autofocus
                >
            </x-input>
            <x-input field="sender_city_id">
                <select
                    name="sender_city_id"
                    class="form-control @error('sender_city_id') is-invalid @enderror"
                >
                    @foreach($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
            </x-input>
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
                    name="package_note"
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

            <x-input icon="fas fa-envelope" field="sender_name">
                <input
                    type="text"
                    name="sender_name"
                    class="form-control @error('receiver_name') is-invalid @enderror"
                    placeholder="{{ __('Receiver Name') }}"
                    value="{{ old('receiver_name') }}"
                    required
                    autofocus
                >
            </x-input>
            <x-input field="receiver_mobile">
                <input
                    type="text"
                    name="receiver_mobile"
                    class="form-control @error('receiver_mobile') is-invalid @enderror"
                    placeholder="{{ __('Receiver Mobile') }}"
                    value="{{ old('receiver_mobile') }}"
                    required
                    autofocus
                >
            </x-input>
            <x-input field="receiver_address">
                <input
                    type="text"
                    name="receiver_address"
                    class="form-control @error('receiver_address') is-invalid @enderror"
                    placeholder="{{ __('Receiver Address') }}"
                    value="{{ old('receiver_address') }}"
                    required
                    autofocus
                >
            </x-input>
            <x-input field="receiver_city_id">
                <select
                    name="receiver_city_id"
                    class="form-control @error('receiver_city_id') is-invalid @enderror"
                >
                    @foreach($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
            </x-input>


            <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
        </form>
    </div>
@endsection
