<div class="form-group {{ $errors->has("$field") ? ' has-error' : '' }}">
	<label class="form-label" for="{{ $field }}">
		{{ $title }}
	</label>
	<select class="form-control" id="{{ $field }}" name="{{ $field }}">
		@if ($emptyValue)
			<option>Не выбрано</option>
		@endif
		
		@foreach($options as $key => $item)
			<option value="{{ $key + 1 }}" {{ old("$field") == $key+1 || $value == $key+1 ? 'selected' : '' }}>{{ $item }}</option>
		@endforeach
		
	</select>
	@if ($errors->has("$field"))
	 <span class="help-block">
		<strong>
			{{ $errors->first("$field") }}
		</strong>
	</span>
	@endif
</div>