<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstagramAuthController extends Controller
{
    public function complete() {
        $was_successful = request('result') === 'success';

        return view('instagram.status', ['was_successful' => $was_successful]);
    }
}
