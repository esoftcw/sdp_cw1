
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
            <div class="col-md-2" style="margin-top:26px;">
                <button type="button" id="addReceiverButton" class="btn btn-success btn-sm">Add More </button>
            </div>
            <div id="addReceiverSection"></div>

            <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
        </form>
    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>
    <script id="receiver-template" type="text/x-handlebars-template">
        <div class="delete_receiver" id="delete_receiver">
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
            <x-input field="receiver_city_id">
                <select
                    name="receiver_city_id[]"
                    class="form-control @error('receiver_city_id') is-invalid @enderror"
                >
                    @foreach($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
            </x-input>
            <button class="btn btn-danger removeReceiver">Remove</button>
        </div>
    </script>
    <script type="text/javascript">

        $(document).on('click','#addReceiverButton',function(){
            let receiver_name = $("#receiver_name").val();
            let receiver_address = $("#receiver_address").val();
            let receiver_mobile = $("#receiver_mobile").val();
            let receiver_city_id = $("#receiver_city_id").val();
            let source = $("#receiver-template").html();
            let template = Handlebars.compile(source);

            let data = {
                receiver_name,
                receiver_address,
                receiver_mobile,
                receiver_city_id
            }
            let html = template(data);
            $("#addReceiverSection").append(html)
        });

        $(document).on('click','.removeReceiver',function(event){
            $(this).closest('.delete_receiver').remove();
        });
    </script>
@endsection
