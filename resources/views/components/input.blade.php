<div class="form-group mb-3">
    <label>{{$label}}</label>
    {{$slot}}
    @error($field)
        <span class="error invalid-feedback">
            {{ $message }}
        </span>
    @enderror
</div>
