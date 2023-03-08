<form action="{{ $route }}" method="POST" id="form-{{ $obj->slug }}" onsubmit="onUpdate(event)">
    @csrf
    @method($method)
</form>
