<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstagramAuthController extends Controller
{
    public function show() {
        $profile = \Dymantic\InstagramFeed\Profile::where('username', 'luke')->first();
        $feed = \Dymantic\InstagramFeed\Profile::where('username', 'luke')->first()->feed();

        return view('instagram.index', ['instagram_auth_url' => $profile->getInstagramAuthUrl()], ['instagram' => $feed]);
    }
}
