<x-input field="{{$name}}" label="City">
    <div class="row">
        <div class="col-6">
            <input
                wire:model="query"
                class="form-control"
                type="search"
                placeholder="Search City"
            >
            <div class="sidebar-search-results d-block">
                <div class="list-group">
                    @foreach($searchResults as $searchResult)
                        <a
                            wire:click="selectCity({{ $searchResult->searchable->id }})"
                            class="list-group-item"
                        >
                            {{$searchResult->title}}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-6">
            <select
                name="{{$name}}"
                class="form-control @error($name) is-invalid @enderror"
                required
            >
                <option selected value="{{$city->id}}">{{$city->name}}</option>
            </select>


        </div>
    </div>
</x-input>
