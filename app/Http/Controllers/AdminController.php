<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Analytics;
use Illuminate\Support\Facades\Redirect;
use Spatie\Analytics\Period;
use App\Models\Page;
use App\Models\Settings;
use App\Models\User;
use App\Models\Images;
use App\Models\Todo;
use Image;
use Session;
use Auth;

class AdminController extends Controller
{
    public function analytics() {
        Session::forget('message');
        $pages = Page::all();
        $urls = array();
        $analyticsData = array();
        foreach($pages as $page) {
            $urls[] = $page->slug;
        }
        foreach($urls as $url) {

            if($url !== '/') {
                $slashUrl = '/' . $url;
                $analyticsData[] = Analytics::getPageStats(Period::days(14), $slashUrl);
            } else {
                $analyticsData[] = Analytics::getPageStats(Period::days(14), $url);
            }

        }
        return view('analytics.index')->withAnalytics($analyticsData);
    }

    public function usersIndex() {
        Session::forget('message');
        $users = User::all();

        return view('users.index')->withUsers($users);
    }

    public function userProfile() {
        Session::forget('message');
        $user = User::where('id', '=', Auth::id())->firstOrFail();
        return view('users.profile')->withUser($user);
    }
    
    public function createToDo(Request $request) {
        Session::forget('message');
        if(isset($_POST['create'])) {
            $list = new Todo;
            $list->name = $request->input('name');
            $list->body = $request->input('body');
            $list->complete = 0;
            $list->save();
            Session::put('message', 'To do item created Successfully!');
            return Redirect('/admin/dashboard/');
        }
        if(isset($_POST['delete'])) {
            $list = Todo::where('name', '=', $request->input('name'))->first();
            $list->delete();
            Session::put('message', 'To do item deleted Successfully!');
            return Redirect('/admin/dashboard/');
        }
        return abort(404);
    }

}
