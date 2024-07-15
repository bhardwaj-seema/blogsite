<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index(){
        $setting= Setting::find(1);
        return view('admin.setting.index', compact('setting'));
    }

    public function savedata(Request $request){
        $validatore = Validator::make($request->all(), [
            'website_name' => 'required|max:255',
            'website_logo'=>'required',
            'website_favicon'=>'required',
            'description'=>'nullable',
            'meta_title'=>'nullable',
            'meta_keywords'=>'required|max:225',
            'meta_description'=>'nullable',

        ]);

        if ($validatore->fails()) {
            return redirect()->back()->withErrors($validatore);
        }

        $setting = Setting::where('id','1')->first();
        if ($setting) {
            $setting->website_name =$request->website_name;
            if ($request->hasFile('website_logo')) {

                $destination = 'uploads/settings/'.$setting->logo;
                if(File::exists($destination)){
                    File::delete($destination);
                }
                $file = $request->file('website_logo');
                $filename = time(). '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings', $filename);
                $setting->logo =$filename;
            }
            if ($request->hasFile('website_favicon')) {
                $destination = 'uploads/settings/'.$setting->favicon;
                if(File::exists($destination)){
                    File::delete($destination);
                }
                $file = $request->file('website_favicon');
                $filename = time(). '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings', $filename);
                $setting->favicon=$filename;
            }
            
            $setting->description =$request->description;
            $setting->meta_title =$request->meta_title;
            $setting->meta_keywords =$request->meta_keywords;
            $setting->meta_description =$request->meta_description;

            $setting->save();
            return  redirect('admin/settings')->with('message', 'setting Updated successfully');
            
        }
        else{
            $setting = new Setting;
            $setting->website_name =$request->website_name;
            if ($request->hasFile('website_logo')) {
                $file = $request->file('website_logo');
                $filename = time(). '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings', $filename);
                $setting->logo =$filename;
            }
            if ($request->hasFile('website_favicon')) {
                $file = $request->file('website_favicon');
                $filename = time(). '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings', $filename);
                $setting->favicon=$filename;
            }
            
            $setting->description =$request->description;
            $setting->meta_title =$request->meta_title;
            $setting->meta_keywords =$request->meta_keywords;
            $setting->meta_description =$request->meta_description;

            $setting->save();
            return  redirect('admin/settings')->with('message', 'setting added successfully');
           

        }

    }
}
