<form id="form-{{ $obj->slug }}" :action="'{{ $route }}/' + data.slug" method="POST"
    @submit.prevent="onUpdate(event)">
    @csrf
    @method($method)
</form>
