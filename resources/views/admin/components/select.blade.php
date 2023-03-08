<select name="{{ $field }}" disabled form="form-{{ $obj->slug }}">
    @foreach ($options as $option)
        <option value="{{ $option->id }}" @selected($option->id === $obj->$field)>{{ $option->name }}</option>
    @endforeach
</select>