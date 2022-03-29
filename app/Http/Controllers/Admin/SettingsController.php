<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Image;

class SettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $settings = Setting::first();
        if ($settings == null) {
            $setting = new Setting;
            $setting->save();
        }
        return view('admin.settings')->with('settings', Setting::first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $settings = Setting::first();

        // Admin Logo
        if ($request->hasFile('admin_logo')) {
            $request->validate([
                'admin_logo' => 'required|image|mimes:jpg,jpeg,bmp,png,gif|max:2000',
            ]);
            $image = $request->file('admin_logo'); // Get File Name
            $imageExt = $image->getClientOriginalExtension();
            $directoryPath = '/uploads/settings';
            $destinationPath = public_path($directoryPath); // Set File Destination
            // Create Directory If Not Exist
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 755, true);
            }
            $imageName = 'admin-logo-'.(date("Ymd").time()).'.'.$imageExt;
            $adminLogoNameToStore = $directoryPath.'/'.$imageName;
            // Resize And Save Image
            Image::make($image->getRealPath())->resize(640, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);

            if (\File::exists(public_path($settings->admin_logo))) {
                \File::delete(public_path($settings->admin_logo));
            }
            $settings->admin_logo = $adminLogoNameToStore;
        }


        // Admin Favicon
        if ($request->hasFile('admin_favicon')) {
            $request->validate([
                'admin_favicon' => 'required|image|mimes:jpg,jpeg,bmp,png,gif|max:2000',
            ]);
            $image = $request->file('admin_favicon'); // Get File Name
            $imageExt = $image->getClientOriginalExtension();
            $directoryPath = '/uploads/settings';
            $destinationPath = public_path($directoryPath); // Set File Destination
            // Create Directory If Not Exist
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 755, true);
            }
            $imageName = 'admin-favicon-'.(date("Ymd").time()).'.'.$imageExt;
            $adminFaviconNameToStore = $directoryPath.'/'.$imageName;
            // Resize And Save Image
            Image::make($image->getRealPath())->resize(640, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);

            if (\File::exists(public_path($settings->admin_favicon))) {
                \File::delete(public_path($settings->admin_favicon));
            }
            $settings->admin_favicon = $adminFaviconNameToStore;
        }

        // Site Logo Light
        if ($request->hasFile('site_logo_light')) {
            $request->validate([
                'site_logo_light' => 'required|image|mimes:jpg,jpeg,bmp,png,gif|max:2000',
            ]);
            $image = $request->file('site_logo_light'); // Get File Name
            $imageExt = $image->getClientOriginalExtension();
            $directoryPath = '/uploads/settings';
            $destinationPath = public_path($directoryPath); // Set File Destination
            // Create Directory If Not Exist
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 755, true);
            }
            $imageName = 'site-logo-light-'.(date("Ymd").time()).'.'.$imageExt;
            $siteLogoLightNameToStore = $directoryPath.'/'.$imageName;
            // Resize And Save Image
            Image::make($image->getRealPath())->resize(640, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);

            if (\File::exists(public_path($settings->site_logo_light))) {
                \File::delete(public_path($settings->site_logo_light));
            }
            $settings->site_logo_light = $siteLogoLightNameToStore;
        }

        // Site Logo Dark
        if ($request->hasFile('site_logo_dark')) {
            $request->validate([
                'site_logo_dark' => 'required|image|mimes:jpg,jpeg,bmp,png,gif|max:2000',
            ]);
            $image = $request->file('site_logo_dark'); // Get File Name
            $imageExt = $image->getClientOriginalExtension();
            $directoryPath = '/uploads/settings';
            $destinationPath = public_path($directoryPath); // Set File Destination
            // Create Directory If Not Exist
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 755, true);
            }
            $imageName = 'site-logo-dark-'.(date("Ymd").time()).'.'.$imageExt;
            $siteLogoDarkNameToStore = $directoryPath.'/'.$imageName;
            // Resize And Save Image
            Image::make($image->getRealPath())->resize(640, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);

            if (\File::exists(public_path($settings->site_logo_dark))) {
                \File::delete(public_path($settings->site_logo_dark));
            }
            $settings->site_logo_dark = $siteLogoDarkNameToStore;
        }

        // Site Favicon
        if ($request->hasFile('site_favicon')) {
            $request->validate([
                'site_favicon' => 'required|image|mimes:jpg,jpeg,bmp,png,gif|max:2000',
            ]);
            $image = $request->file('site_favicon'); // Get File Name
            $imageExt = $image->getClientOriginalExtension();
            $directoryPath = '/uploads/settings';
            $destinationPath = public_path($directoryPath); // Set File Destination
            // Create Directory If Not Exist
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 755, true);
            }
            $imageName = 'site-favicon-'.(date("Ymd").time()).'.'.$imageExt;
            $siteFaviconNameToStore = $directoryPath.'/'.$imageName;
            // Resize And Save Image
            Image::make($image->getRealPath())->resize(640, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);

            if (\File::exists(public_path($settings->site_favicon))) {
                \File::delete(public_path($settings->site_favicon));
            }
            $settings->site_favicon = $siteFaviconNameToStore;
        }

        // Banner Video
        if ($request->hasFile('site_banner_video')) {
            $request->validate([
                'site_banner_video' => 'required|image|mimes:jpg,jpeg,bmp,png,gif|max:20000',
            ]);
            $video = $request->file('site_banner_video'); // Get File Name
            $videoExt = $video->getClientOriginalExtension();
            $directoryPath = '/uploads/settings';
            $destinationPath = public_path($directoryPath); // Set File Destination
            // Create Directory If Not Exist
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 755, true);
            }

            $videoName = 'site-banner-video-'.(date("Ymd").time()).'.'.$videoExt;
            $videoNameToStore = $directoryPath.'/'.$videoName;

            $video->move($destinationPath, $videoName);

            if (\File::exists(public_path($settings->site_banner_video))) {
                \File::delete(public_path($settings->site_banner_video));
            }
            $settings->site_banner_video = $videoNameToStore;
        }

        $settings->preloader = ($request->input('preloader') == true) ? true : false;
        $settings->site_title = $request->input('site_title');
        $settings->seo_title = $request->input('seo_title');
        $settings->seo_description = $request->input('seo_description');

        if ($settings->save()) {
            return redirect()->route('admin.settings.edit', 1)->with('success', 'Settings Update Successful');
        } else {
            return redirect()->back()->with('error', 'Settings Update Failed');
        }

    }
}
