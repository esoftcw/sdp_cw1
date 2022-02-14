<x-input field="{{$name}}">
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
                    wire:click="selectCity({{ $searchResult->searchable->id }}, '{{$searchResult->title}}')"
                    class="list-group-item"
                >
                    {{$searchResult->title}}
                </a>
            @endforeach
        </div>
    </div>
    <select
        name="{{$name}}"
        class="form-control @error('{{$name}}') is-invalid @enderror"
        required
    >
        <option selected value="{{$city_id}}">{{$city}}</option>
    </select>
</x-input>
