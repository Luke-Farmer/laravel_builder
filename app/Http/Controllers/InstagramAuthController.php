<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstagramAuthController extends Controller
{
    public function show() {
        $profile = \Dymantic\InstagramFeed\Profile::where('username', 'krissy')->first();

        return view('instagram-get-auth', ['instagram_auth_url' => $profile->getInstagramAuthUrl()]);
    }
}
