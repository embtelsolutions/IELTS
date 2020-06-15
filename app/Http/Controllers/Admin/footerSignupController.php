<?php

namespace App\Http\Controllers\Admin;

use App\FooterSignup;
use App\Language;
use Validator;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class footerSignupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $lang = Language::where('code', $request->language)->firstOrFail();
        $data['lang_id'] = $lang->id;
        $data['abs'] = FooterSignup::firstOrFail();
       
        return view('admin.home.signup.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FooterSignup  $footerSignup
     * @return \Illuminate\Http\Response
     */
    public function show(FooterSignup $footerSignup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FooterSignup  $footerSignup
     * @return \Illuminate\Http\Response
     */
    public function edit(FooterSignup $footerSignup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FooterSignup  $footerSignup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $langid)
    {
    
        $request->validate([
            'signup_text_one' => 'required|max:25',
            'signup_description_one' => 'required|max:255',
            'signup_button_text_one' => 'required|max:80',
            'signup_button_url_one' => 'required|max:80',
            'signup_text_two' => 'required|max:25',
            'signup_description_two' => 'required|max:255',
            'signup_button_text_two' => 'required|max:80',
            'signup_button_url_two' => 'required|max:80',
        ]);

        $bs = FooterSignup::where('language_id', $langid)->firstOrFail();
        $bs->title_one = $request->signup_text_one;
        $bs->description_one = $request->signup_description_one;
        $bs->button_text_one = $request->signup_button_text_one;
        $bs->button_url_one = $request->signup_button_url_one;
        $bs->title_two = $request->signup_text_two;
        $bs->description_two = $request->signup_description_two;
        $bs->button_text_two = $request->signup_button_text_two;
        $bs->button_url_two = $request->signup_button_url_two;
        $bs->save();

        Session::flash('success', 'Text updated successfully!');
        return back();
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FooterSignup  $footerSignup
     * @return \Illuminate\Http\Response
     */
    public function destroy(FooterSignup $footerSignup)
    {
        //
    }
}
