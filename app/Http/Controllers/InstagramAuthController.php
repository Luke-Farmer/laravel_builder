<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstagramAuthController extends Controller
{
    public function show() {
        $profile = \Dymantic\InstagramFeed\Profile::where('username', 'michael')->first();

        return view('instagram-auth-page', ['instagram_auth_url' => $profile->getInstagramAuthUrl()]);
    }
}
