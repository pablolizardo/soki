<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use Session;
use Image;

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

        // imagen instagram
        $img_square = $request->file('img_square');
        $ext = $img_square->getClientOriginalExtension();
        $filename = str_slug($work->titulo) .'_square.' . $ext;
        Image::make($img_square)->encode('jpg', 10)->fit(300)->save( public_path('/uploads/works/' . $filename ) );
        $work->img_square = $filename;
        //dd($work->img_square);

        $work->save();

        Session::flash('message', 'Trabajo publicado n_n');

        return redirect('/');
    }


    public function show($id)
    {
        $work = Work::findOrFail($id);
        if ($work->tipo == 0) {$view = view('apps.show')->with(['app'=>$work]); }
        if ($work->tipo == 1) {$view = view('anim.show')->with(['anim'=>$work]); }
        if ($work->tipo == 2) {$view = view('diseño.show')->with(['diseño'=>$work]); }
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
