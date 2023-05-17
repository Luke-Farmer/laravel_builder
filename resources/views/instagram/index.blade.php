<x-admin-master>
    <a href="/instagram-get-auth/">Add Account</a>
    @foreach($feed as $post)
        <div class="card">
            <div class="top">
                <div class="userDetails">
                    <div class="profile_img">
                        <img src="https://zupimages.net/up/22/29/j5pm.jpg" class="cover" alt="">
                    </div>
                    <!-- Main Title -->
                    <h3>loic_ts<br /><span>Khao Lak, Thailande</span></h3>
                </div>
                <div>
                    <!-- Settings Dot -->
                    <div class="settings"></div>
                </div>
            </div>
            <div class="imgBox">
                <!-- Main Image -->
                <img src={{ $post->url }} class="cover">
            </div>
            <!-- Buttons -->
            <div class="buttons">
                <!-- Like Button -->
                <img class="icon" src="https://zupimages.net/up/22/29/d1bd.png">
                <!-- Comment Button -->
                <img class="icon" src="https://zupimages.net/up/22/29/h5ft.png">
                <!-- Share Button -->
                <img class="icon" src="https://zupimages.net/up/22/29/9y56.png">
            </div>
            <!-- Number Like -->
            <h4 class="likes">1, 038 likes</h4>
            <!-- Description -->
            <h4 class="message"><b>loic_ts</b>Sunset in Khao Lak in Thailand 🌅#sunset</h4>
        </div>
        <img src= alt="A post from my instagram">
    @endforeach
</x-admin-master>