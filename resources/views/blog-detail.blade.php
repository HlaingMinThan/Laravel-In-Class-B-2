<x-layout>
    <h1>{{ $blog->title}}</h1>
    <button class="btn btn-warning">subscribe</button>
    <p>{{$blog->body}}</p>
    <h1>Comments</h1>

    <form
        action="/blogs/{{$blog->id}}/comments/store"
        method="POST"
    >
        @csrf
        <textarea
            name="body"
            class="form-control"
            id=""
            cols="30"
            rows="10"
        ></textarea>
        @error('body')
        <p class="text-danger">{{$message}}</p>
        @enderror
        <button
            type="submit"
            class="mt-3 btn btn-primary"
        >comment</button>
    </form>
    @php
    $comments = $blog->comments()->with('user')->latest()->paginate(5);
    @endphp
    @foreach ($comments as $comment)
    <div class="card my-3">
        <div class="card-header">
            {{$comment->user->name}} <span>{{$comment->created_at->format('d-m-y')}}</span>
        </div>
        <div class="card-body">
            <p class="card-text">
                {{$comment->body}}
            </p>
        </div>
    </div>
    @endforeach
    {{$comments->links()}}
</x-layout>