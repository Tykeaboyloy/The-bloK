<x-layout>
    @foreach ($posts as $post)
        <article>
            <a href="/post/{{ $post->title }}">
                <h1>{{ $post->title }}</h1>
            </a>
            <p>{{ $post->excerpt }}</p>
        </article>
    @endforeach
</x-layout>
