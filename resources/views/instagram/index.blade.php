<x-admin-master>
    @foreach($instagram as $post)
        <img src="{{ $post->url}}">
    @endforeach
</x-admin-master>