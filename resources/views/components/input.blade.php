<div class="input-group mb-3">
    {{$slot}}
    @if($icon)
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="{{$icon}}"></span>
        </div>
    </div>
    @endif
    @error($field)
        <span class="error invalid-feedback">
            {{ $message }}
        </span>
    @enderror
</div>
