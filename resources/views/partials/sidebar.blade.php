<ul class="sidebar">
    <a href="{{ route('category', 'all') }}"><li>All Categories</li></a>
    @foreach($categories as $category)
        <a href="{{ route('category', $category->id) }}"><li>{{ $category->name }}</li></a>
    @endforeach
</ul>