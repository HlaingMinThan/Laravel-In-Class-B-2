<div class="dropdown">
    <button
        class="btn btn-secondary dropdown-toggle"
        type="button"
        data-bs-toggle="dropdown"
        aria-expanded="false"
    >
        Category Filter
    </button>
    <ul class="dropdown-menu dropdown-menu-dark">
        @foreach ($categories as $category)
        <li><a
                class="dropdown-item active"
                href="/?category={{$category->slug}}{{request('search') ?  '&search='.request('search') : ''}}"
            >{{$category->name}}</a></li>
        @endforeach
    </ul>
</div>