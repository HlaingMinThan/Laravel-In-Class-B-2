<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <title>Document</title>

    <link
        rel="stylesheet"
        href="/app.css"
    >
</head>

<body>
    <h1>Home Page</h1>
    @foreach ($blogs as $blog)
    <h1 class="{{$loop->even ? 'text-red' : ''}}"><a href="/blogs/{{ $blog->filename}}">
            {{$blog->title}}
            @if ($blog->title=== 'third blog')
            <span> (special blog)</span>
            @endif
        </a></h1>
    <p>
        {{ $blog->intro}}
    </p>
    @endforeach
</body>

</html>