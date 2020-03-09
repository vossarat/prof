<div class="form-group {{ $errors->has("$field") ? ' has-error' : '' }}">
    <label class="form-label" for="{{ $field }}">
        {{ $title }}
    </label>
    <input class="form-control" id="{{ $field }}" type="password" name="{{ $field }}">
    @if ($errors->has("$field"))
    <span class="help-block">
        <strong>
            {{ $errors->first("$field") }}
        </strong>
    </span>
    @endif
</div>