<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
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

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard() {
        $twoWeeks = Analytics::fetchVisitorsAndPageViews(Period::days(14));
        $fourWeeks = Analytics::fetchVisitorsAndPageViews(Period::days(28));

        $date = Carbon::now();
        $dates[] = array();
        for($i = 0; $i < 14;) {
            $dates[$i] =  Carbon::now()->subDay($i)->format('d M');
            $i++;
        }

        $graphData = array();
        for($i = 0; $i < 13;) {
            $periodDate = Carbon::now()->subDay($i+ 1);
            $periodEnd = Carbon::now()->subDay($i);
            $graphData[$i] = Analytics::fetchTotalVisitorsAndPageViews(Period::create($periodDate, $periodEnd));
            $i++;
        }
        $startDate = Carbon::now()->subDay(14);
        $endDate = Carbon::now()->subDay(1);
        $graphViews = Analytics::fetchTotalVisitorsAndPageViews(Period::create($startDate, $endDate));
        dd($graphData);



        $usersFour = Analytics::fetchTotalVisitorsAndPageViews(Period::days(28));;
        $totalUsers = Analytics::fetchUserTypes(Period::create($startDate, $endDate));


        return view('dashboard')
            ->withStats($twoWeeks)
            ->withOldStats($fourWeeks)
            ->withDates($dates)
            ->withGraph($graphViews)
            ->withGraphData($graphData)
            ->withUsersTwoWeeks($totalUsers)
            ->withUsersFourWeeks($usersFour);
    }


    public function analytics() {
        Session::forget('message');
        $pages = Page::all();
        $urls = array();
        $analyticsData = array();
//        foreach($pages as $page) {
//            $urls[] = $page->slug;
//        }
//        foreach($urls as $url) {
//
//            if($url !== '/') {
//                $slashUrl = '/' . $url;
//                $analyticsData[] = Analytics::fetchVisitorsAndPageViews(Period::days(7));
//            } else {
//                $analyticsData[] = Analytics::fetchVisitorsAndPageViews(Period::days(7));
//            }
//
//        }
        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));
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

    public function instagramIndex() {
        Session::forget('message');
        $feed = \Dymantic\InstagramFeed\InstagramFeed::for('luke');
        return view('instagram.index')
        ->withFeed($feed);
    }

    public function instagramAuth() {
        $profile = \Dymantic\InstagramFeed\Profile::where('username', 'luke')->first();
        return view('instagram.response')
            ->withAuthurl($profile->getInstagramAuthUrl());
    }

}
