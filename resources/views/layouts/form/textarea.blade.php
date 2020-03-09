<div class="form-group {{ $errors->has("$field") ? ' has-error' : '' }}">
	<label class="form-label form-label-outside" for="{{ $field }}">
		{{ $title }}:
	</label>
	<textarea class="form-control form-control-has-validation form-control-last-child" id="{{ $field }}" name="{{ $field }}" style="height: 100px" placeholder="{{$placeholder or ''}}">{{ $value or old("$field") }}</textarea>
	@if ($errors->has("$field"))
	<span class="form-validation">
		<strong>
			{{ $errors->first("$field") }}
		</strong>
	</span>
	@endif
</div>