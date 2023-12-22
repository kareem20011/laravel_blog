<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\SettingTranslation;

class SettingController extends Controller
{

    // public function index(){
    //     return view('dashboard.index');
    // }

    public function edit(){
        $setting = Setting::first();
        $this->authorize('view', $setting);
        return view('dashboard.settings');
    }

    public function update(Request $request, Setting $setting){

        $data = [

            'facebook'=>'string|nullable',
            'instagram'=>'string|nullable',
            'email'=>'email|nullable',
            'phone'=>'numeric|nullable',

        ];

        foreach (config('app.languages') as $key => $value) {
            $data[$key.'*.title'] = 'nullable|string';
            $data[$key.'*.content'] = 'nullable|string';
            $data[$key.'*.address'] = 'nullable|string';
        }
        $request->validate($data);

        if ($request->has('logo')) {
            $fileName = time().'.'.$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('dashboard/uploads/'), $fileName);
            $setting->update(['logo'=>'dashboard/uploads/'.$fileName]);

        }


        if ($request->has('favicon')) {
            $fileName = time().'.'.$request->favicon->getClientOriginalExtension();
            $request->favicon->move(public_path('dashboard/uploads/'), $fileName);
            $setting->update(['favicon'=>'dashboard/uploads/'.$fileName]);

        }
        $setting->update($request->except(['logo','favicon']));
        return redirect()->route('dashboard.setting');
    }
}
