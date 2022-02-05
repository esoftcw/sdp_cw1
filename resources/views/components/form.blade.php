@if($id)
<form action="{{ route("$route.update", $id) }}" method="POST" novalidate>
@method('PUT')
@else
<form action="{{ route("$route.store") }}" method="POST" novalidate>
@endif
    @csrf
    <div class="card">
        <div class="card-header">
            <a onclick="history.back()" class="btn btn-outline-primary">{{ __('Back') }}</a>
        </div>
        <div class="card-body">
            {{$slot}}
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        </div>
    </div>
</form>
