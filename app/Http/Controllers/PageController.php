<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Settings;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Session;
use Analytics;
use Spatie\Analytics\Period;
use Redirect;
use Auth;
use App\Services\NavigationService;

class PageController extends Controller
{

//    public function __construct()
//    {
//        $dev_mode = Settings::where('setting', '=', 'dev_mode')->first();
//        if($dev_mode->value == 1) {
//            $this->middleware('auth');
//        }
//    }

    public function getIndex()
    {
        $page = Page::where('slug', '=', '/')->first();
        if(!empty($page) && $page->enabled == 0 && Auth::guest()) {
            abort(404);
        }

        return view('pages.template')
            ->withPage(Page::where('slug', '=', '/')
            ->firstOrFail());
    }

    public function getPage($slug)
    {
        $page = Page::where('slug', '=', $slug)->first();

        if(Settings::where('setting', '=', 'portfolio_active')->first()->value == 1 && !isset($page)) {
            $page = Portfolio::where('slug', '=', $slug)->first();
        }

        if(empty($page)) {
            abort(404);
        }

        if($page->enabled == 0 && Auth::guest()) {
            abort(404);
        }

        return view('pages.template')
            ->withPage($page);
    }

    public function show($id)
    {
        return view('pages.show')
            ->withPage($post = Page::find($id));
    }

    public function edit($id)
    {
        return view('pages.edit')
            ->withPage($page = Page::find($id));
    }

    public function update(Request $request, $id)
    {
        $page = Page::find($id);

        if ($request->input('slug') == $page->slug) {
            $this->validate($request, array('body' => 'required'));
        } else {
            $this->validate($request, array('seo_title' => 'required|max:255', 'seo_description' => 'required|max:255', 'body' => 'required', 'slug' => 'required|alpha_dash|min:5|max:255|unique:pages,slug'));
        }
        $page = Page::find($id);
        $page->body = $request->input('body');
        $page->slug = $request->input('slug');
        $page->seo_title = $request->input('seo_title');
        $page->seo_description = $request->input('seo_description');
        $page->enabled = $request->input('enabled');
        $page->title = $request->input('title');
        $page->save();
        Session::put('message', 'Page Updated Successfully!');
        return redirect()
            ->route('pages.edit', $page->id);
    }

    public function store(Request $request) {
        $this->validate($request, array(
            'slug' => 'required|max:255|unique:pages,slug',
            'title' => 'required|max:255|unique:pages,title',
            'seo_title' => 'max:255',
            'seo_description' => 'max:255',
            'body' => 'required'
        ));
        $page = new Page;
        $page->slug = $request->slug;
        $page->title = $request->title;
        $page->seo_title = $request->seo_title;
        $page->seo_description = $request->seo_description;
        $page->body = $request->body;
        $page->enabled = $request->input('enabled');
        $page->save();
        Session::put('message', 'Page Created Successfully!');
        return redirect()
            ->route('pages.edit', $page->id);
    }
    ################################################################ THESE SHOULD BE MOVED TO THEIR OWN ADMIN 'PAGES' CONTROLLER
    public function index() {
        Session::forget('message');
        return view('pages.index')
            ->withPages($pages = Page::all());
    }

    public function destroy($id) {
        $page = Page::where('id', '=', $id)->first();
        $page->delete();
        Session::put('message', 'Page Deleted Successfully!');
        return redirect()
            ->route('pages.index');
    }

}