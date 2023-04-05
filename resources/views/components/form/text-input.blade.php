<div class="inputArea">
    <label for="{{ $name }}">
        {{ $label ?? '' }}
    </label>
    <input name="{{ $name }}" type="{{ empty($type) ? 'text' : $type }}" placeholder="{{ $placeholder ?? '' }}"
        {{ empty($required) ? '' : 'required' }} value="{{ $value ?? '' }}" />
</div>
