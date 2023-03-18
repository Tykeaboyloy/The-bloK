<x-layout>
    <article style="margin: auto; width:50%; line-height:30px" class="border">
        <h1 class="font-bold">{{ $post->title }}</h1>
        <div class="ml-10">
            {!! $post->body !!}
        </div>
        <a href="/posts">Go back</a>
    </article>
</x-layout>
