<x-layouts.app header="{{$route ? 'Edit' : 'Add'}} Route">
    <div class="row">
        <div class="col-lg-6">
            <x-form route="routes" :id="$route">
                <x-input field="name">
                    <input
                        type="text"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="{{ __('Name') }}"
                        value="{{ old('name', $route->name) }}"
                        required
                    >
                </x-input>
                <x-input field="vehicle_id">
                    <select
                        name="vehicle_id"
                        class="form-control @error('vehicle_id') is-invalid @enderror"
                    >
                        @foreach($vehicles as $vehicle)
                            <option {{old('vehicle_id', $route->vehicle_id) == $vehicle->id ? 'selected' : ''}} value="{{$vehicle->id}}">{{$vehicle->user->name}} - {{$vehicle->number}}</option>
                        @endforeach
                    </select>
                </x-input>

            </x-form>
            @if($route)
                <div class="card">
                    <div class="card-header">
                        Add Centers to Route
                    </div>
                    <div class="card-body">
                        <table class="table">
                            @foreach($route->transits as $transit)
                                <tr>
                                    <td>{{$transit->center->name}}</td>
                                </tr>
                            @endforeach
                        </table>
                        <form action="{{ route("transits.store") }}" method="POST" novalidate>
                            @csrf
                            <input type="hidden" name="route_id" value="{{$route->id}}">
                            <x-input icon="fas fa-user" field="name">
                                <select
                                    name="center_id"
                                    class="form-control"
                                >
                                    @foreach($centers as $center)
                                        <option value="{{$center->id}}">{{$center->name}}</option>
                                    @endforeach
                                </select>
                            </x-input>
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </form>

                    </div>
                </div>
            @endif
        </div>
    </div>

</x-layouts.app>
