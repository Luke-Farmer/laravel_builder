<x-admin-master>
    <a href="/admin/instagram/auth/">Add Account</a>
    @foreach($feed as $post)
        <img src={{ $post->url }} alt="A post from my instagram">
    @endforeach
</x-admin-master>