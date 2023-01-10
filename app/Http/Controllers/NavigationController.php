<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Models\Nav;
use Image;

class NavigationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::forget('message');
        return view('navigation.index')
            ->withMenu(Menu::all());
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show(Portfolio $portfolio)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy( $id)
    {

    }
}
