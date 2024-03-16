<x-layout>
    <h1>Home Page</h1>
    @if (session()->has('success'))
    {{session('success')}}
    @endif
    <form action="/">
        @if (request('category'))
        <input
            type="hidden"
            name="category"
            value="{{request('category')}}"
        >
        @endif
        <input
            value="{{request('search')}}"
            name="search"
            type="text"
            placeholder="search blogs...."
        >
        <button type="submit">search</button>
    </form>
    <x-category-dropdown />
    <x-author-dropdown />
    @forelse ($blogs as $blog)
    <h1 class="{{$loop->even ? 'text-red' : ''}}"><a href="/blogs/{{ $blog->slug }}">
            {{$blog->title}}
        </a></h1>
    <p>
        {{ $blog->intro}}
    </p>
    <p>category -
        <a href="/?category={{$blog->category->slug}}"> {{$blog->category->name}}</a>
    </p>
    <p> author -
        <a href="/?author={{$blog->author->username}}"> {{$blog->author->name}}</a>
    </p>
    @empty
    <p>no results found.</p>
    @endforelse

    {{ $blogs->links()}}

</x-layout>