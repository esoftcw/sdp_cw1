
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
            <livewire:city-search name="sender_city_id"/>
            <livewire:delivery-form/>
            <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
        </form>
    </div>
@endsection
