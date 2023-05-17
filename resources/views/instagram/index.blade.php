<x-admin-master>
    <div class="p-3">
        <div class="row g-0">
            <div class="col-12 d-flex bg-accent-light p-3 w-100">
                <p class="white mb-0">Instagram</p>
                <p class="ms-auto mb-0"><a class="white main-button px-2 py-1" href="/instagram-get-auth/">Update Account</a></p>
            </div>
        </div>
        <div class="row g-0 bg-white">
            <div class="col-12 p-3">
                <div class="row instagram-gallery mt-0 mt-md-3">
                    @foreach($feed as $post)
                        <div class="col-12 col-md-3">
                            <div class="card">
                                <div class="top">
                                    <div class="userDetails">
                                        <div class="profile_img">
                                            <img src="https://zupimages.net/up/22/29/j5pm.jpg" class="cover" alt="">
                                        </div>
                                        <!-- Main Title -->
                                        <h3>{{ $user->username }}<br /><span>Khao Lak, Thailande</span></h3>
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
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            position: relative;
            min-height: 400px;
            background: rgb(255, 255, 255);
            box-shadow: 15px 15px 60px rgba(0, 0, 0, 0.01);
            padding: 20px;
        }

        .instagram-gallery .col-12 {
            margin-bottom: 1rem;
        }

        .instagram-gallery .col-12:last-child {
            margin-bottom: 0!important;
        }

        .card .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card .top .userDetails {
            display: flex;
            align-items: center;
        }

        .card .top .userDetails .profile_img {
            position: relative;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 8px;
        }

        .cover {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card .top .userDetails h3 {
            font-size: 16px;
            color: #4d4d4d;
            font-weight: 500;
            line-height: 1em;
        }

        .card .top .userDetails h3 span {
            font-size: 0.7em;
        }

        .imgBox {
            position: relative;
            width: 100%;
            height: 320px;
            margin: 10px 0 15px;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-right: 230px;
        }

        .buttons img {
            max-width: 24px;
            max-height: 24px;
            cursor: pointer;
        }

        .buttons .left img {
            margin-right: 8px;;
        }

        .likes {
            font-weight: 500;
            margin-top: 5px;
            font-size: 16px;
            color: #4d4d4d;
        }

        .message {
            font-weight: 500;
            margin-top: 10px;
            font-size: 16px;
            color: #4d4d4d;
        }

        .message b {
            color: #262626;
        }

        .settings:after {
            content: '\2807';
            font-size: 25px;
            color: #4d4d4d;
            cursor: pointer;
        }

        .icon:hover {
            opacity: 0.7;
        }
    </style>
</x-admin-master>