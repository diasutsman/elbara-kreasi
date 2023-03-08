<button disabled onclick="onEditLongText(event)">{{ Str::limit(strip_tags($obj->$field), 20, '...') }}</button>

<div class="hidden editor">
    <form>
        <input id="{{ $field }}" value="{{ $obj->$field }}" name="{{ $field }}" type="hidden" name="content" form="form-{{ $obj->slug }}">
        <trix-editor input="{{ $field }}"></trix-editor>
    </form>
</div>
