<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private $indexView = 'admin.settings.all';

    private $storeRoute = 'admin.settings';

    private $createView = 'admin.settings.create';

    private $editView = 'admin.settings.edit';

    private $deleteRoute = 'admin.settings';

    private $deleteMessage = 'Setting deleted successfully.';

    private $createMessage = 'Setting created successfully.';

    private $updateMessage = 'Setting updated successfully.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::first();

        return view($this->createView, ['settings' => $settings, 'edit' => false]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable',
            'description' => 'nullable',
            'domain' => 'nullable',
            'address' => 'nullable',
            'mobile' => 'nullable',
            'email' => 'nullable',
            'logo' => 'nullable|mimes:png,jpg,jpeg,gif,svg',
            'page_header' => 'nullable|mimes:png,jpg,jpeg,gif,svg',
        ]);
        // Handle file upload
        $logo = null;
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time().'_'.$file->getClientOriginalName();
            $logo = $file->storeAs('uploads/logo', $fileName, 'uploads'); // 'uploads' is the storage folder
        }

        $icon = null;
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $fileName = time().'_'.$file->getClientOriginalName();
            $icon = $file->storeAs('uploads/logo', $fileName, 'uploads'); // 'uploads' is the storage folder
        }
        
        $pageHeader = null;
        if ($request->hasFile('page_header')) {
            $file = $request->file('page_header');
            $fileName = time().'_'.$file->getClientOriginalName();
            $pageHeader = $file->storeAs('uploads/page_header', $fileName, 'uploads'); // 'uploads' is the storage folder
        }

        Setting::create(['title' => $request->title, 'description' => $request->description, 'domain' => $request->domain, 'address' => $request->address, 'mobile' => $request->mobile, 'email' => $request->email, 'logo' => $logo, 'icon' => $icon, 'page_header'=>$pageHeader, 'facebook' => $request->facebook, 'twitter' => $request->twitter, 'linkedin' => $request->linkedin, 'instagram' => $request->instagram, 'youtube' => $request->youtube]);

        return redirect()->route($this->storeRoute)->with('success', $this->createMessage);
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        // $validatedData = $request->validate([
        //     'title'=>'required',
        //     'description'=>'required',
        //     'domain'=>'required',
        //     'address'=>'required',
        //     'mobile'=>'required',
        //     'email'=>'required',
        //     'logo'=>'required|mimes:png,jpg,jpeg,gif,svg',
        // ]);
        // Handle file upload
        $logo = null;
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time().'_'.$file->getClientOriginalName();
            $logo = $file->storeAs('uploads/logo', $fileName, 'uploads'); // 'uploads' is the storage folder
        }

        $icon = null;
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $fileName = time().'_'.$file->getClientOriginalName();
            $icon = $file->storeAs('uploads/logo', $fileName, 'uploads'); // 'uploads' is the storage folder
        }

        $pageHeader = null;
        if ($request->hasFile('page_header')) {
            $file = $request->file('page_header');
            $fileName = time().'_'.$file->getClientOriginalName();
            $pageHeader = $file->storeAs('uploads/page_header', $fileName, 'uploads'); // 'uploads' is the storage folder
        }

        $newSetting = [
            'title' => $request->title,
            'description' => $request->description,
            'domain' => $request->domain,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
        ];

        if ($logo) {
            $newSetting['logo'] = $logo;
        }

        if ($icon) {
            $newSetting['icon'] = $icon;
        }

        if ($pageHeader) {
            $newSetting['page_header'] = $pageHeader;
        }

        $setting->update($newSetting);

        return redirect()->route($this->storeRoute)->with('success', $this->updateMessage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();

        return redirect()->route($this->deleteRoute)->with('success', $this->deleteMessage);
    }
}
