<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use Session;
use Image;
use ColorThief\ColorThief;


class WorkController extends Controller
{

    public function home()
    {
       //$works = Work::orderBy('created_at','DESC')->get();

        $apps = Work::where('tipo','like','0')->orderBy('created_at','DESC')->get();
        $anims = Work::where('tipo','like','1')->orderBy('created_at','DESC')->get();
        $diseños = Work::where('tipo','like','2')->orderBy('created_at','DESC')->get();

        return view('home')->with([
            'apps'=>$apps,
            'anims'=>$anims,
            'diseños'=>$diseños,
            ]);    
    }

    public function index()
    {
        $works = Work::orderBy('created_at','DESC')->get();
        return view('works')->with(['works'=>$works]);
    }


    public function create()
    {
    }


    public function store(Request $request)
    {
        $work = new Work;
        $work->fill($request->all());

        // imagen square
        $img_square = $request->file('img_square');
        if (isset($img_square)) {
            $ext = $img_square->getClientOriginalExtension();
            $filename = str_slug($work->titulo) .'_square_'.str_random(3).'.'.$ext;
            Image::make($img_square)->fit(100)->blur(60)->save( public_path('/uploads/works/blur_' . $filename ) );
            Image::make($img_square)->encode('jpg', 10)->fit(300)->save( public_path('/uploads/works/' . $filename ) );
            $work->img_square = $filename;

                function rgb2hex($rgb) {
                   $hex = "#"; $hex .= str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT); $hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT); $hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT); return $hex; // returns the hex value including the number sign (#)
                }

                $work->color = rgb2hex(ColorThief::getColor(public_path('/uploads/works/' . $filename )));

        } else {
            $work->img_square = '';
        }

        // imagen vertical
        $img_vertical = $request->file('img_vertical');
        if (isset($img_vertical)) {
            $ext = $img_vertical->getClientOriginalExtension();
            $filename = str_slug($work->titulo) .'_vertical_'.str_random(3).'.'.$ext;
            //Image::make($img_vertical)->fit(100)->blur(60)->save( public_path('/uploads/works/blur_' . $filename ) );
            Image::make($img_vertical)->encode('jpg', 10)->resize(360,640)->save( public_path('/uploads/works/' . $filename ) );
            $work->img_vertical = $filename;
        } else {
            $work->img_vertical = '';
        }
        
        // imagen horizontal
        $img_horizontal = $request->file('img_horizontal');
        if (isset($img_horizontal)) {
            $ext = $img_horizontal->getClientOriginalExtension();
            $filename = str_slug($work->titulo) .'_horizontal_'.str_random(3).'.'.$ext;
            //Image::make($img_horizontal)->fit(100)->blur(60)->save( public_path('/uploads/works/blur_' . $filename ) );
            Image::make($img_horizontal)->encode('jpg', 10)->resize(1280,800)->save( public_path('/uploads/works/' . $filename ) );
            $work->img_horizontal = $filename;
        } else {
            $work->img_horizontal = '';
        }

        $work->save();

        Session::flash('message', 'Trabajo publicado n_n');

        return redirect('/');
    }


    public function show($id)
    {
        $work = Work::findOrFail($id);
        if ($work->tipo == 0) {$view = view('apps.show')->with(['app'=>$work,'color'=>$work->color ]); }
        if ($work->tipo == 1) {$view = view('anims.show')->with(['anim'=>$work,'color'=>$work->color ]); }
        if ($work->tipo == 2) {$view = view('disenos.show')->with(['diseno'=>$work,'color'=>$work->color ]); }
        return $view;
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
