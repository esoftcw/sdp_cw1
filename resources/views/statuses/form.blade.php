<x-layouts.app header="{{statusName($status)}}">
    <div class="row">
        <div class="col-lg-6">
            <x-form route="statuses">
                <input type="hidden" name="status" value="{{$status}}">
                <input type="hidden" name="center_id" value="{{auth()->user()->center_id}}">
                <x-input field="delivery_id" label="Package Number">
                    <input
                        type="number"
                        name="delivery_id"
                        class="form-control @error('delivery_id') is-invalid @enderror"
                        placeholder="{{ __('Package Number') }}"
                        required
                    >
                </x-input>
                @if($status == 'on_delivery')
                <x-input field="rider_id" label="Rider">
                    <select
                        name="rider_id"
                        class="form-control @error('rider_id') is-invalid @enderror"
                    >
                        <option value="">Select Rider</option>
                        @foreach(riders() as $rider)
                            <option {{old('rider_id', session()->get('rider_id')) == $rider->id ? 'selected' : ''}} value="{{$rider->id}}">{{$rider->name}}</option>
                        @endforeach
                    </select>
                </x-input>
                @endif
                @if($status == 'on_transit')
                <x-input field="vehicle_id" label="Vehicle">
                    <select
                        name="vehicle_id"
                        class="form-control @error('vehicle_id') is-invalid @enderror"
                    >
                        <option value="">Select Rider</option>
                        @foreach($vehicles as $vehicle)
                            <option {{old('vehicle_id', session()->get('vehicle_id')) == $vehicle->id ? 'selected' : ''}} value="{{$vehicle->id}}">{{$vehicle->number}} {{$vehicle->user->name}}</option>
                        @endforeach
                    </select>
                </x-input>
                @endif
            </x-form>
            <table class="table">
                @foreach($stats as $stat)
                    <tr>
                        <td>{{$stat->created_at}}</td>
                        <td>{{$stat->delivery->id}}</td>
                        <td>{{statusName($stat->delivery->name)}}</td>
                        <td>{{statusName($stat->delivery->address->city->name)}}</td>
                        <td>{{statusName($stat->delivery->center->address->city->name)}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

</x-layouts.app>
