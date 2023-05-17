<x-admin-master>
    <a class="button-new" href="{{ $instagram_auth_url }}">Click to get Instagram permission</a>
    @foreach($instagram as $post)
        <img src="{{ $post->url}}">
    @endforeach
</x-admin-master>