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
    
        $lang = Language::where('code', $request->language)->firstOrFail();
        $data['lang_id'] = $lang->id;
        $data['abs'] = SliderSection::firstOrFail();
        
        return view('admin.home.slider-section', $data);
    }

    public function upload(Request $request, $langid)
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
            return response()->json(['errors' => $validator->errors(), 'id' => 'image']);
        }
     

        if ($request->hasFile('file')) {
       
            $bs = SliderSection::where('language_id', $langid)->firstOrFail();

            @unlink('assets/front/img/' . $bs->image);
            $filename = uniqid() .'.'. $img->getClientOriginalExtension();
            $img->move('assets/front/img/', $filename);
         
            $bs->image = $filename;
            $bs->save();

        }

        return response()->json(['status' => "success", 'image' => 'Slider section image']);
    }

    public function update(Request $request, $langid)
    {
        $rules = [
            'slider_section_title' => 'required|max:125',
            'slider_section_text' => 'required|max:180',
            'slider_section_button_text' => 'nullable|max:115',
            'slider_section_button_url' => 'nullable|max:255',
        
        ];
       
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $bs = SliderSection::where('language_id', $langid)->firstOrFail();
        $bs->title = $request->slider_section_title;
        $bs->text = $request->slider_section_text;
        $bs->button_text = $request->slider_section_button_text;
        $bs->button_url = $request->slider_section_button_url;
        $bs->save();

        Session::flash('success', 'Informations updated successfully!');
        return "success";
    }
}
