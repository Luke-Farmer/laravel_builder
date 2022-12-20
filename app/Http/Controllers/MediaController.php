<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Analytics;
use Illuminate\Support\Facades\Redirect;
use Spatie\Analytics\Period;
use App\Models\Images;
use Image;
use Session;

class MediaController extends Controller
{

    public function index() {
        Session::forget('message');
        return view('media.index');
    }

    public function uploadImage(Request $request) {
        $image = new Images;

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $location = public_path('/img/' . $filename);
            $test = Image::make($file)->encode('webp', 90)->save($location);

            $image->image = $filename;

        $image->save();
        return Redirect('/admin/media');
    }
}
