<form onsubmit="updateCategory(event)" class="category-form"
    action="{{ route('admin.categories.update', $category->slug) }}">
    <input type="text" value="{{ $category->name }}" class="focus-visible:outline-none w-full bg-transparent"
        name="name">
    @method('PUT')
    @csrf
</form>
