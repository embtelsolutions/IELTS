<?php

namespace App\Http\Controllers\Admin;

use App\HomepageAbout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Language;
use Validator;
use Session;


class homepageaboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lang = Language::where('code', $request->language)->firstOrFail();
        $data['lang_id'] = $lang->id;
        $data['abs'] = HomepageAbout::firstOrFail();
        
        return view('admin.home.about-section', $data);

    }
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomepageAbout  $homepageAbout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $langid)
    {
        $rules = [
            'title' => 'required|max:125',
            'paragraph_one' => 'required|max:255',
            'paragraph_two' => 'nullable|max:555',
        
        ];
       
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $bs = HomepageAbout::where('language_id', $langid)->firstOrFail();
        $bs->title = $request->title;
        $bs->text = $request->paragraph_one;
        $bs->text_two = $request->paragraph_two;
        $bs->save();

        Session::flash('success', 'Informations updated successfully!');
        return "success";
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
     * @param  \App\HomepageAbout  $homepageAbout
     * @return \Illuminate\Http\Response
     */
    public function show(HomepageAbout $homepageAbout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomepageAbout  $homepageAbout
     * @return \Illuminate\Http\Response
     */
    public function edit(HomepageAbout $homepageAbout)
    {
        //
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomepageAbout  $homepageAbout
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomepageAbout $homepageAbout)
    {
        //
    }
}
