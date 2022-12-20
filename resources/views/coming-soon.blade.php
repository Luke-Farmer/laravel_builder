<?php
use App\Models\Themes;
?>
<style>
    {{ Themes::where('active', '=', '1')->first()->theme_css }}
</style>
<section class="" style="background: #003B5C;height:100vh;padding:0;margin:0;">
    <div style="display:flex;flex-direction:column;align-items:center;justify-content:center;height:100vh;">
        <img src="/img/logo.svg" style="width: 500px;height: auto;">
        <p style="font-size:24px;color:white;font-family: Arial;">Coming Soon!</p>
        <a href="{{ route('login') }}" class="white main-button">Admin Login</a>
    </div>

</section>
<style>
    body{
        margin: 0;
    }
</style>