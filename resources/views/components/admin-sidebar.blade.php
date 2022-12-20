<div class="w-100 bg-dark-blue h-100 d-flex flex-column">
    <div class="" style="height: 100px;">
        <img src="/img/logo.svg" class="w-100 p-4" style="height: 100px;object-fit: contain;">
    </div>
    <div class="mx-3" style="height:150px;border-bottom: 2px solid #CBA052;">
        <img src="/img/avatar.png" class="w-100" style="height:100px;object-fit:contain;">
        <div class="d-flex align-items-center" style="height: 50px;">
            <p class="white mb-0 mx-auto">{{ Auth::user()->name }}</p>
        </div>
    </div>
    <div class="mx-3 mt-4" style="">
        <ul class="p-0" style="list-style: none;">
            <li class="p-2 mb-2 main-button position-relative"><a class="text-white stretched-link" href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="p-2 mb-2 main-button position-relative"><a class="text-white stretched-link" href="{{ route('pages.index') }}">Pages</a></li>
            <li class="p-2 mb-2 main-button position-relative"><a class="text-white stretched-link" href="/admin/media">Media</a></li>
            <li class="p-2 mb-2 main-button position-relative"><a class="text-white stretched-link" href="#">Blog - Not Working</a></li>
            <li class="p-2 mb-2 main-button position-relative"><a class="text-white stretched-link" href="{{ route('portfolio.index') }}">Portfolio</a></li>
            <li class="p-2 mb-2 main-button position-relative"><a class="text-white stretched-link" href="/admin/analytics">Google Analytics - Not Working</a></li>
            <li class="p-2 mb-2 main-button position-relative"><a class="text-white stretched-link" href="#">Instagram - Not Working</a></li>
            <li class="p-2 mb-2 main-button position-relative"><a class="text-white stretched-link" href="{{ route('users.index') }}">Users</a></li>
            <li class="p-2 mb-2 mt-auto main-button position-relative"><a class="text-white stretched-link" href="/admin/settings">Site Settings</a></li>


        </ul>
    </div>
</div>
<style>
    li {
        background: #D9D9D6;
    }
</style>