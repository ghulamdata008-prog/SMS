<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Models\Setting;

use Illuminate\Http\Request;



class SettingController extends Controller
{


    public function index()
    {


        $setting = Setting::first();



        return view(
            'admin.settings.index',
            compact('setting')
        );


    }





    public function update(Request $request)
    {


        $request->validate([


            'school_name'=>'required',

            'email'=>'nullable|email',

            'phone'=>'nullable',

            'address'=>'nullable'


        ]);



        $setting = Setting::first();



        if(!$setting)
        {

            $setting = new Setting();

        }



        $setting->updateOrCreate(

            ['id'=>1],


            [

            'school_name'=>$request->school_name,

            'email'=>$request->email,

            'phone'=>$request->phone,

            'address'=>$request->address,


            ]

        );



        return back()

        ->with(
            'success',
            'Settings Updated Successfully'
        );


    }



}