<form action="{{ $route }}" method="POST" id="form-{{ $obj->slug }}" onsubmit="update(event)">
    @csrf
    @method($method)
</form>
