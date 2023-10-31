<x-layout>
    <article>
        @foreach ($posts as $post)
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {!! $post->title !!}
                </a>
            </h1>
            <p>
                by <a href="authors/{{$post->author->username}}">{{$post->author->name}}</a> in <a href="{{ $post->category->slug}}">{{ $post->category->name }}</a>
            </p>
            <div>
                <?= $post->excerpt ?>
            </div>
            <hr>
        @endforeach
    </article>
</x-layout>
