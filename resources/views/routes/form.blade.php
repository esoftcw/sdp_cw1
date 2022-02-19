<x-layouts.app>
    <div class="row">
        <div class="col-lg-6">
            <x-form route="routes" :id="$route">
                <x-input icon="fas fa-user" field="name">
                    <input
                        type="text"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="{{ __('Name') }}"
                        value="{{ old('name', $route->name) }}"
                        required
                    >
                </x-input>
            </x-form>
            @if($route)
                <table>
                    @foreach($route->transits as $transit)
                        <tr>
                            <td>{{$transit->center->name}}</td>
                        </tr>
                    @endforeach
                </table>
                <form action="{{ route("transits.store") }}" method="POST" novalidate>
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <input type="hidden" name="route_id" value="{{$route->id}}">
                            <x-input icon="fas fa-user" field="name">
                                <select name="center_id">
                                    @foreach($centers as $center)
                                        <option value="{{$center->id}}">{{$center->name}}</option>
                                    @endforeach
                                </select>
                            </x-input>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>

</x-layouts.app>
