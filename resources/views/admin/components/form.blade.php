<form :action="'{{ $route }}/' + data.slug" method="POST" id="form-{{ $obj->slug }}" @submit.prevent="onUpdate(event)">
    @csrf
    @method($method)
</form>
