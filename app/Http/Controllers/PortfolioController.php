<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Models\Images;
use Image;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::forget('message');
        return view('portfolio.index')
            ->withPortfolios(Portfolio::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'slug' => 'required|max:255|unique:portfolios,slug',
            'title' => 'required|max:255|unique:portfolios,title',
            'seo_title' => 'max:255',
            'seo_description' => 'max:255',
            'body' => 'required'
        ));
        $item = new Portfolio;
        $item->slug = $request->input('slug');
        $item->title = $request->input('title');
        $item->seo_title = $request->input('seo_title');
        $item->seo_description = $request->input('seo_description');
        $item->body = $request->input('body');
        $item->excerpt = $request->input('excerpt');
        $item->enabled = $request->input('enabled');
        $item->image = $request->input('image');
        $item->save();
        return redirect()->route('portfolio.edit', $item->id)->with('message', 'Portfolio Item Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('portfolio.edit')
            ->withPortfolio(Portfolio::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $item = Portfolio::find($id);

        if ($request->input('slug') == $item->slug) {
            $this->validate($request, array('body' => 'required'));
        } else {
            $this->validate($request, array('seo_title' => 'required|max:255', 'seo_description' => 'required|max:255', 'body' => 'required', 'slug' => 'required|alpha_dash|min:5|max:255|unique:pages,slug'));
        }

        $item->body = $request->input('body');
        $item->slug = $request->input('slug');
        $item->seo_title = $request->input('seo_title');
        $item->seo_description = $request->input('seo_description');
        $item->enabled = $request->input('enabled');
        $item->title = $request->input('title');
        $item->image = $request->input('image');
        $item->excerpt = $request->input('excerpt');
        $item->save();
        Session::put('message', 'Portfolio Item Updated Successfully!');
        return redirect()
            ->route('portfolio.edit', $item->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy( $id)
    {
        $item = Portfolio::where('id', '=', $id)->first();
        $item->delete();
        Session::put('message', 'Page Deleted Successfully!');
        return redirect()
            ->route('portfolio.index');
    }
}
