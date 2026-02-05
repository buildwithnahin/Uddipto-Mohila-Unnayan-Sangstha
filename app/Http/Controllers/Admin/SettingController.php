<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $settingsData = [
            'site_name' => $request->input('site_name'),
            'site_tagline' => $request->input('site_tagline'),
            'email' => $request->input('email'),
            'email_secondary' => $request->input('email_secondary'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'facebook' => $request->input('facebook'),
            'twitter' => $request->input('twitter'),
            'youtube' => $request->input('youtube'),
            'footer_text' => $request->input('footer_text'),
            'meta_description' => $request->input('meta_description'),
            'meta_keywords' => $request->input('meta_keywords'),
        ];

        foreach ($settingsData as $key => $value) {
            Setting::set($key, $value);
        }

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = 'logo.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            Setting::set('logo', 'uploads/' . $imageName);
        }

        if ($request->hasFile('favicon')) {
            $image = $request->file('favicon');
            $imageName = 'favicon.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            Setting::set('favicon', 'uploads/' . $imageName);
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Settings updated successfully.');
    }
}
