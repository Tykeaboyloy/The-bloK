<x-layout>
    @foreach ($posts as $post)
        <div class="p-5 {{ !$loop->first ? 'border-t' : '' }}" style="width: 50%; margin:auto">
            <a href="/posts/{{ $post->slug }}">
                <h2> {{ $post->title }} </h2>
            </a>
            <h6> {{ $post->excerpt }} </h6>
        </div>
    @endforeach
</x-layout>
