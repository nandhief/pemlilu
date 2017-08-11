<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{

    public function index()
    {
        $settings = Setting::get();
        return view('settings.index', compact('settings'));
    }

    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('settings.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        Setting::find($id)->update($request->all());
        return redirect()->route('settings.index');
    }
}
