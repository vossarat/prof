<div class="form-group {{ $errors->has("$field") ? ' has-error' : '' }}">
	<label class="form-label" for="{{ $field }}">
		{{ $title }}
	</label>
	<div class="input-group">		
		<span class="input-group-addon">
			<i class="fa fa-calendar"></i>			
		</span>
		{{--<input type="text"  id="{{ $field }}" class="form-control"  name="{{ $field }}" value="{{ old("$field", date('d.m.Y',strtotime($value))) }}"/>--}}
		<input type="text"  id="{{ $field }}" class="form-control"  name="{{ $field }}" value="{{ old("$field", $value) }}"/>
	</div>
	@if ($errors->has("$field"))
		<span class="help-block">
			<strong>
				{{ $errors->first("$field") }}
			</strong>
		</span>
		@endif
</div>     