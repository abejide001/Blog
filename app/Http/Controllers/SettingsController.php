<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
        $settings=Setting::first();

        return view ('admin.settings.settings')->with('settings', $settings);
    }
    public function update(Request $request){

        $this->validate($request, [
            'site_name'=>'required',
            'contact_email'=>'required',
            'contact_number'=>'required',
            'address'=>'required',
        ]);


        $settings=Setting::first();

        $settings->site_name=$request->input('site_name');
        $settings->contact_email=$request->input('contact_email');
        $settings->contact_number=$request->input('contact_number');
        $settings->address=$request->input('address');

        $settings->save();

        return redirect('/home');
    }
}
