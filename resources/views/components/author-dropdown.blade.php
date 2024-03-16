<div class="dropdown">
    <button
        class="btn btn-secondary dropdown-toggle"
        type="button"
        data-bs-toggle="dropdown"
        aria-expanded="false"
    >
        Author Filter
    </button>
    <ul class="dropdown-menu dropdown-menu-dark">
        @foreach ($authors as $author)
        <li><a
                class="dropdown-item active"
                href="/?author={{$author->username}}{{request('search') ?  '&search='.request('search') : ''}}"
            >{{$author->name}}</a></li>
        @endforeach
    </ul>
</div>