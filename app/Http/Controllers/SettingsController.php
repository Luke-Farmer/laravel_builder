<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Settings;
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

        return view('settings.index')
            ->withEnabled($dev_mode->value)
            ->withEmail($site_email->value)
            ->withName($site_name->value)
            ->withCompany($company_name->value)
            ->withBusinessNumber($business_number->value);
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

        return redirect()->route('settings.index');
    }
}