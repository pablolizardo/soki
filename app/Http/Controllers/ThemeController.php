<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use Session;
use Image;
use ColorThief\ColorThief;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theme = Theme::first();
        return view('themes.edit')->with([
                                         'theme'=>$theme
                                         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $theme = new Theme;
        $theme->fill($request->all());

        // logo
        $logo = $request->file('logo');
        if (isset($logo)) {
            $ext = $logo->getClientOriginalExtension();
            $filename = str_slug($theme->name) .'_square_'.str_random(3).'.'.$ext;
            Image::make($logo)->fit(100)->blur(60)->save( public_path('/uploads/themes/blur_' . $filename ) );
            Image::make($logo)->encode('jpg', 10)->fit(300)->save( public_path('/uploads/themes/' . $filename ) );
            $theme->logo = $filename;

                function rgb2hex($rgb) {
                   $hex = str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT); $hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT); $hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT); return $hex; // returns the hex value including the number sign (#)
                }

                $theme->color = rgb2hex(ColorThief::getColor(public_path('/uploads/themes/' . $filename )));

        } else {
            $theme->logo = '';
        }

        $theme->save();

        Session::flash('message', 'theme actualizado n_n');

        return redirect('/admin');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $theme = Theme::findOrFail($id);
        return view('themes.edit')->with(['theme'=>$theme ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        function rgb2hex($rgb) {
           $hex = str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT); $hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT); $hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT); return $hex; // returns the hex value including the number sign (#)
        }


        $theme = Theme::findOrFail($id);
        $theme->fill($request->all());


        if ($request->activo) {
            if ($request->activo == "on") {
                $theme->activo = 1;
            }
        }


        // logo
        $logo = $request->file('logo');
        if (isset($logo)) {
            $ext = $logo->getClientOriginalExtension();
            $filename = str_slug($theme->name) .'_logo_'.str_random(3).'.'.$ext;
            // Image::make($logo)->fit(100)->blur(60)->save( public_path('/uploads/themes/blur_' . $filename ) );
            Image::make($logo)->encode('jpg', 10)->fit(300)->save( public_path('/uploads/themes/' . $filename ) );
            $theme->logo = $filename;
        } else {$theme->logo = ''; }

        // apps_bg
        $apps_bg = $request->file('apps_bg');
        if (isset($apps_bg)) {
            $ext = $apps_bg->getClientOriginalExtension();
            $filename = str_slug($theme->name) .'_apps_bg_'.str_random(3).'.'.$ext;
            Image::make($apps_bg)->encode('jpg', 10)->fit(1920,900)->save( public_path('/uploads/themes/' . $filename ) );
            $theme->apps_bg = $filename;
        } else {$theme->apps_bg = ''; }

        // posts_bg
        $posts_bg = $request->file('posts_bg');
        if (isset($posts_bg)) {
            $ext = $posts_bg->getClientOriginalExtension();
            $filename = str_slug($theme->name) .'_posts_bg_'.str_random(3).'.'.$ext;
            Image::make($posts_bg)->encode('jpg', 10)->fit(1920,900)->save( public_path('/uploads/themes/' . $filename ) );
            $theme->posts_bg = $filename;
        } else {$theme->posts_bg = ''; }

        // anim_bg
        $anim_bg = $request->file('anim_bg');
        if (isset($anim_bg)) {
            $ext = $anim_bg->getClientOriginalExtension();
            $filename = str_slug($theme->name) .'_anim_bg_'.str_random(3).'.'.$ext;
            Image::make($anim_bg)->encode('jpg', 10)->fit(1920,900)->save( public_path('/uploads/themes/' . $filename ) );
            $theme->anim_bg = $filename;
        } else {$theme->anim_bg = ''; }
        
        // dis_bg
        $dis_bg = $request->file('dis_bg');
        if (isset($dis_bg)) {
            $ext = $dis_bg->getClientOriginalExtension();
            $filename = str_slug($theme->name) .'_dis_bg_'.str_random(3).'.'.$ext;
            Image::make($dis_bg)->encode('jpg', 10)->fit(1920,900)->save( public_path('/uploads/themes/' . $filename ) );
            $theme->dis_bg = $filename;
        } else {$theme->dis_bg = ''; }

        $theme->save();

        Session::flash('message', 'theme actualizado n_n');

        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
