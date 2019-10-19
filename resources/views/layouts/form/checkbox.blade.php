<div class="form-group">
	<br/>
    <div class="form-check">
        <label class="form-check-label">
            <input name="{{ $field }}" value="0" type="hidden">
            <input class="custom-control-input" id="{{ $field }}" name="{{ $field }}" value="1" type="checkbox" {{ old("$field") || $value ? 'checked' : ''}}>
            {{ $title }}
        </label>
    </div>
</div>