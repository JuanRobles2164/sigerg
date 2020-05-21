<div class="form-group row">
    <label for="{{ $field_name }}" class="col-md-4 col-form-label text-md-right">{{ $label_text }}</label>
    <div class="col-md-8">
    <input type="{{$tipo}}" 
        class="form-control" 
        name="{{$field_name}}" 
        @if(!$optional)
            required 
        @endif
        autocomplete="{{$field_name}}">
    </div>
</div>