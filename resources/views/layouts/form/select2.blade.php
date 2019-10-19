<div class="form-group {{ $errors->has("$field") ? ' has-error' : '' }}">
	<label class="form-label" for="{{ $field }}">
		{{ $title }}
	</label>
	<select class="form-control" id="{{ $field }}" name="{{ $field }}">
		@if ($emptyValue)
			<option>Не выбрано</option>
		@endif
		
		@foreach($options as $item)
			<option value="{{ $item->id }}" {{ old("$field") == $item->id || $value == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
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