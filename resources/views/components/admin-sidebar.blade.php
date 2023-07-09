<?php
use App\Models\Settings;
?>
<div class="w-100 h-100 d-flex flex-column" style="background: #040D1B;">
    <div class="" style="height: 100px;">
        <img src="{{ Settings::where('setting', '=', 'logo')->first()->value }}" class="w-100 p-4" style="height: 100px;object-fit: contain;">
    </div>
    <div class="d-flex flex-column mx-3" style="height:150px;border-bottom: 2px solid #CBA052;">
        <img src="/storage/users-avatar/{{ Auth::user()->avatar }}" class="mx-auto" style="height:100px;width: 100px;object-fit:contain;border-radius:50%;background:linear-gradient(144.39deg, #ffffff -278.56%, #6d6d6d -78.47%, #11101d 91.61%);">
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
            <li class="p-2 mb-2 main-button position-relative"><a class="text-white stretched-link" href="/admin/instagram">Instagram</a></li>
            <li class="p-2 mb-2 main-button position-relative"><a class="text-white stretched-link" href="/admin/navigation/">Navigation</a></li>
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