<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use App\Theme;
use Session;
use Image;
use ColorThief\ColorThief;


class WorkController extends Controller
{

    // public function __construct() {$this->middleware('auth'); }

    public function home()
    {
       //$works = Work::orderBy('created_at','DESC')->get();

        $apps = Work::where('tipo','like','0')->inRandomOrder()->take(rand(3,5))->get();
        $anims = Work::where('tipo','like','1')->inRandomOrder()->take(rand(3,5))->get();
        $diseños = Work::where('tipo','like','2')->inRandomOrder()->take(rand(3,5))->get();
         $theme = Theme::where('activo','1')->first();

        return view('home')->with([
            'apps'=>$apps,
            'anims'=>$anims,
            'diseños'=>$diseños,
            'theme'=>$theme,
            ]);    
    }

    public function index()
    {
        $works = Work::orderBy('created_at','DESC')->get();
        return view('works')->with(['works'=>$works]);
    }


    public function create()
    {
        return view('admin.create');
    }


    public function store(Request $request)
    {
        $work = new Work;
        $work->fill($request->all());

        // imagen square
        $img_square = $request->file('img_square');
        if (isset($img_square)) {
            // $ext = $img_square->getClientOriginalExtension();
            $filename = str_slug($work->titulo) .'_square_'.str_random(3).'.jpg';
            Image::make($img_square)->fit(100)->blur(60)->save( public_path('/uploads/works/blur_' . $filename ) );
            Image::make($img_square)->fit(160)->save( public_path('/uploads/works/thumb_' . $filename ) );
            Image::make($img_square)->encode('jpg', 10)->fit(300)->save( public_path('/uploads/works/' . $filename ) );
            $work->img_square = $filename;

                function rgb2hex($rgb) {
                   $hex = str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT); $hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT); $hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT); return $hex; // returns the hex value including the number sign (#)
                }

                $work->color = rgb2hex(ColorThief::getColor(public_path('/uploads/works/' . $filename )));

        } 

        // imagen vertical
        $img_vertical = $request->file('img_vertical');
        if (isset($img_vertical)) {
            // $ext = $img_vertical->getClientOriginalExtension();
            $filename = str_slug($work->titulo) .'_vertical_'.str_random(3).'.jpg';
            Image::make($img_vertical)->fit(128,233)->save( public_path('/uploads/works/thumb_' . $filename ) );
            Image::make($img_vertical)->encode('jpg', 10)->fit(360,640)->save( public_path('/uploads/works/' . $filename ) );
            $work->img_vertical = $filename;
        } 
        
        // imagen horizontal
        $img_horizontal = $request->file('img_horizontal');
        if (isset($img_horizontal)) {
            // $ext = $img_horizontal->getClientOriginalExtension();
            $filename = str_slug($work->titulo) .'_horizontal_'.str_random(3).'.jpg';
            Image::make($img_horizontal)->fit(210,130)->save( public_path('/uploads/works/thumb_' . $filename ) );
            Image::make($img_horizontal)->encode('jpg', 10)->fit(1280,800)->save( public_path('/uploads/works/' . $filename ) );
            $work->img_horizontal = $filename;
        } 

        // img_concept
        $img_concept = $request->file('img_concept');
        if (isset($img_concept)) {
            // $ext = $img_concept->getClientOriginalExtension();
            $filename = str_slug($work->titulo) .'_concept_'.str_random(3).'.jpg';
            Image::make($img_concept)->fit(210,130)->save( public_path('/uploads/works/thumb_' . $filename ) );
            Image::make($img_concept)->encode('jpg', 10)->fit(1280,800)->save( public_path('/uploads/works/' . $filename ) );
            $work->img_concept = $filename;
        } 



        // attachment
        $attachment = $request->file('attachment');
        if (isset($attachment)) {
            // $ext = $attachment->getClientOriginalExtension();
            $filename = str_slug($work->titulo) .'_'.str_random(3).'.jpg';
            //Image::make($attachment)->fit(100)->blur(60)->save( public_path('/uploads/works/blur_' . $filename ) );
            // $attachment->store( public_path('/uploads/attachments/' . $filename ) );
            $attachment->move(public_path('/uploads/attachments/') , $filename);
            $work->attachment = $filename;
            // $path = $request->file('avatar')->store('avatars');
        } 




        $work->save();

        Session::flash('message', 'Trabajo publicado n_n');

        return redirect('/admin');
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
        $work = Work::findOrFail($id);
        return view('admin.edit')->with(['work'=>$work]);
    }


    public function update(Request $request, $id)
    {
        $work = Work::findOrFail($id);
        $work->fill($request->all());


        // imagen square
        $img_square = $request->file('img_square');
        if (isset($img_square)) {
            // $ext = $img_square->getClientOriginalExtension();
            $filename = str_slug($work->titulo) .'_square_'.str_random(3).'.jpg';
            Image::make($img_square)->fit(100)->blur(60)->save( public_path('/uploads/works/blur_' . $filename ) );
            Image::make($img_square)->fit(160)->save( public_path('/uploads/works/thumb_' . $filename ) );
            Image::make($img_square)->encode('jpg', 10)->fit(300)->save( public_path('/uploads/works/' . $filename ) );
            $work->img_square = $filename;

                function rgb2hex($rgb) {
                   $hex = str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT); $hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT); $hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT); return $hex; // returns the hex value including the number sign (#)
                }

                $work->color = rgb2hex(ColorThief::getColor(public_path('/uploads/works/' . $filename )));

        } else {
            $work->color = $request->color;
        }

        // imagen vertical
        $img_vertical = $request->file('img_vertical');
        if (isset($img_vertical)) {
            // $ext = $img_vertical->getClientOriginalExtension();
            $filename = str_slug($work->titulo) .'_vertical_'.str_random(3).'.jpg';
            Image::make($img_vertical)->fit(128,233)->save( public_path('/uploads/works/thumb_' . $filename ) );
            Image::make($img_vertical)->encode('jpg', 10)->fit(360,640)->save( public_path('/uploads/works/' . $filename ) );
            $work->img_vertical = $filename;
        } 


        
        // imagen horizontal
        $img_horizontal = $request->file('img_horizontal');
        if (isset($img_horizontal)) {
            // $ext = $img_horizontal->getClientOriginalExtension();
            $filename = str_slug($work->titulo) .'_horizontal_'.str_random(3).'.jpg';
            Image::make($img_horizontal)->fit(210,130)->save( public_path('/uploads/works/thumb_' . $filename ) );
            Image::make($img_horizontal)->encode('jpg', 10)->fit(1280,800)->save( public_path('/uploads/works/' . $filename ) );
            $work->img_horizontal = $filename;
        } 

        // imagen horizontal
        $img_concept = $request->file('img_concept');
        if (isset($img_concept)) {
            // $ext = $img_concept->getClientOriginalExtension();
            $filename = str_slug($work->titulo) .'_concept_'.str_random(3).'.jpg';
            Image::make($img_concept)->fit(210,130)->save( public_path('/uploads/works/thumb_' . $filename ) );
            Image::make($img_concept)->encode('jpg', 10)->fit(1280,800)->save( public_path('/uploads/works/' . $filename ) );
            $work->img_concept = $filename;
        } 


        // attachment
        $attachment = $request->file('attachment');
        if (isset($attachment)) {
            // $ext = $attachment->getClientOriginalExtension();
            $filename = str_slug($work->titulo) .'_'.str_random(3).'.jpg';
            //Image::make($attachment)->fit(100)->blur(60)->save( public_path('/uploads/works/blur_' . $filename ) );
            // $attachment->store( public_path('/uploads/attachments/' . $filename ) );
            $attachment->move(public_path('/uploads/attachments/') , $filename);
            $work->attachment = $filename;
            // $path = $request->file('avatar')->store('avatars');
        } 



        $work->save();

        Session::flash('message', 'Trabajo actualizado n_n');

        return redirect('/admin');
    }


    public function destroy($id)
    {
        //
    }
}
