<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use App\Post;
use App\Presupuesto;
use App\Theme;
use Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apps = Work::where('tipo','like','0')->orderBy('created_at','DESC')->get();
        $anims = Work::where('tipo','like','1')->orderBy('created_at','DESC')->get();
        $diseños = Work::where('tipo','like','2')->orderBy('created_at','DESC')->get();
        $presupuestos = Presupuesto::orderBy('created_at','DESC')->get();
        $themes = Theme::orderBy('created_at','DESC')->get();
        $posts = Post::orderBy('created_at','DESC')->get();

        return view('admin.index')->with([
            'apps'=>$apps,
            'anims'=>$anims,
            'diseños'=>$diseños,
            'presupuestos'=>$presupuestos,
            'posts'=>$posts,
            'themes'=>$themes,
            ]);   
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
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
        $work = Work::findOrFail($id);
        $work->delete();
        // redirect
        Session::flash('message', 'Trabajo Eliminado!');
        return redirect('/admin');
    }
}
