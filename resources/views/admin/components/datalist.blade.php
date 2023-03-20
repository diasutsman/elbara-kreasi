<div x-data="{
    find(func) {
        return [...$refs.datalist.children].find(func)
    }
}">
    <input type="text" list="datalist" placeholder="Enter to search" x-on:change="data.{{ $field }} = find(option => option.value == $refs.input.value).dataset.value" x-ref="input" x-bind:disabled="!editMode" :value="find(option => option.dataset.value == data.{{ $field }}).value">

    <datalist id="datalist" x-ref="datalist">
        @foreach ($options as $option)
            <option value="{{ $option->$optionField }}" data-value="{{ $option->id }}"/>
        @endforeach
    </datalist>

    <input type="hidden" name="{{ $field }}" x-model="data.{{ $field }}" form="form-{{ $obj->slug }}">
</div>