<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Settings;
use App\Models\Portfolio;
use App\Models\Themes;
use Illuminate\Http\Request;
use Session;
use Analytics;
use Spatie\Analytics\Period;
use Redirect;

class SettingsController extends Controller
{
    public function index() {
        Session::forget('message');
        $dev_mode = Settings::where('setting', '=', 'dev_mode')->first();
        $site_email = Settings::where('setting', '=', 'site_email')->first();
        $site_name = Settings::where('setting', '=', 'site_name')->first();
        $company_name = Settings::where('setting', '=', 'company_name')->first();
        $business_number = Settings::where('setting', '=', 'business_number')->first();
        $portfolio_active = Settings::where('setting', '=', 'portfolio_active')->first();
        $instagram = Settings::where('setting', '=', 'instagram')->first();
        $logo = Settings::where('setting', '=', 'logo')->first();
        $theme = Themes::where('active', '=', '1')->first();

        return view('settings.index')
            ->withEnabled($dev_mode->value)
            ->withEmail($site_email->value)
            ->withName($site_name->value)
            ->withCompany($company_name->value)
            ->withBusinessNumber($business_number->value)
            ->withTheme($theme)
            ->withPortfolio($portfolio_active)
            ->withInstagram($instagram)
            ->withLogo($logo);
    }

    public function update(Request $request) {
        $dev_mode = Settings::where('setting', '=', 'dev_mode')->first();
        $dev_mode->value = $request->input('enabled');
        $dev_mode->save();

        $site_email = Settings::where('setting', '=', 'site_email')->first();
        $site_email->value = $request->input('site_email');
        $site_email->save();

        $site_name = Settings::where('setting', '=', 'site_name')->first();
        $site_name->value = $request->input('site_name');
        $site_name->save();

        $company_name = Settings::where('setting', '=', 'company_name')->first();
        $company_name->value = $request->input('company_name');
        $company_name->save();

        $business_number = Settings::where('setting', '=', 'business_number')->first();
        $business_number->value = $request->input('business_number');
        $business_number->save();

        $portfolio_active = Settings::where('setting', '=', 'portfolio_active')->first();
        $portfolio_active->value = $request->input('portfolio_active');
        $portfolio_active->save();

        $css_update = Themes::where('active', '=', '1')->first();
        $css_update->theme_css = $request->input('css');
        $css_update->save();

        $theme = Themes::where('active', '=', '1')->first();
        $theme->active = 0;
        $theme->save();

        $themeNew = Themes::where('theme_name', '=', $request->input('theme'))->first();
        $themeNew->active = 1;
        $themeNew->save();

        $insta = Settings::where('setting', '=', 'instagram')->first();
        $insta->value = $request->input('instagram');
        $insta->save();

        $logo = Settings::where('setting', '=', 'logo')->first();
        $logo->value = $request->input('logo');
        $logo->save();

        return redirect()->route('settings.index');
    }
}