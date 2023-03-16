<div x-data="{value: '{{ $obj->$field }}'}">
    <input type="text" list="datalist" placeholder="Enter to search" x-on:change="value = [...$refs.datalist.children].find(option => option.value == $refs.input.value).dataset.value" x-ref="input" disabled value="{{ $options->find($obj->$field)->name }}">

    <datalist id="datalist" x-ref="datalist">
        @foreach ($options as $option)
            <option value="{{ $option->$optionField }}" data-value="{{ $option->id }}"/>
        @endforeach
    </datalist>

    <input type="hidden" name="{{ $field }}" x-model="value" form="form-{{ $obj->slug }}">
</div>