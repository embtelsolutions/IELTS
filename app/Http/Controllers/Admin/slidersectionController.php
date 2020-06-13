<?php

namespace App\Http\Controllers\Admin;

use App\SliderSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BasicSetting as BS;
use App\Language;
use Validator;
use Session;

class slidersectionController extends Controller
{
    public function index(Request $request)
    {

        $data = SliderSection::firstOrFail();
        // $data['lang_id'] = $lang->id;
        // $data['abs'] = $lang->basic_setting;

        return view('admin.home.slider-section', $data);
    }

    public function upload(Request $request)
    {
        $img = $request->file('file');
        $allowedExts = array('jpg', 'png', 'jpeg');

        $rules = [
            'file' => [
                function ($attribute, $value, $fail) use ($img, $allowedExts) {
                    if (!empty($img)) {
                        $ext = $img->getClientOriginalExtension();
                        if (!in_array($ext, $allowedExts)) {
                            return $fail("Only png, jpg, jpeg image is allowed");
                        }
                    }
                },
            ],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $validator->getMessageBag()->add('error', 'true');
            return response()->json(['errors' => $validator->errors(), 'id' => 'intro_bg']);
        }


        if ($request->hasFile('file')) {
            $bs = SliderSection::where('id', $id)->firstOrFail();
            @unlink('assets/front/img/' . $bs->intro_bg);
            $filename = uniqid() .'.'. $img->getClientOriginalExtension();
            $img->move('assets/front/img/', $filename);

            $bs->image = $filename;
            $bs->save();

        }

        return response()->json(['status' => "success", 'image' => 'Slider section image']);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'slider_section_title' => 'required|max:25',
            'slider_section_text' => 'required|max:80',
            'slider_section_button_text' => 'nullable|max:15',
            'slider_section_button_url' => 'nullable|max:255',
        
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $bs = SliderSection::where('id', $id)->firstOrFail();
        $bs->title = $request->slider_section_title;
        $bs->text = $request->slider_section_text;
        $bs->button_text = $request->slider_section_button_text;
        $bs->button_url = $request->slider_section_button_url;
        $bs->save();

        Session::flash('success', 'Informations updated successfully!');
        return "success";
    }
}
