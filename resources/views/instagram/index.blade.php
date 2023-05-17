<x-admin-master>
    <a href="/instagram-get-auth/">Add Account</a>
    @foreach($feed as $post)
        @dd($post)
        <img src={{ $post->url }} alt="A post from my instagram">
    @endforeach
</x-admin-master>