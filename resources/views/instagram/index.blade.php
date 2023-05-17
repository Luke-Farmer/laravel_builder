<x-admin-master>
    <a href="{{ $authurl }}">Click to get Instgram permission</a>
    @foreach($eed as $post)
        <img src={{ $post->url }} alt="A post from my instagram">
    @endforeach
</x-admin-master>