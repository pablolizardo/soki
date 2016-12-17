<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use Image;
use ColorThief\ColorThief;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('created_at','DESC')->get();
        return view('posts.index')->with(['posts'=> $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->fill($request->all());

        // imagen 
        $image = $request->file('image');
        if (isset($image)) {
            $ext = $image->getClientOriginalExtension();
            $filename = str_slug($post->titulo) .'_vertical_'.str_random(3).'.'.$ext;
            Image::make($image)->fit(100)->blur(60)->save( public_path('/uploads/posts/blur_' . $filename ) );
            Image::make($image)->encode('jpg', 10)->resize(360,640)->save( public_path('/uploads/posts/' . $filename ) );
            $post->image = $filename;

                function rgb2hex($rgb) {
                   $hex = str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT); $hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT); $hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT); return $hex; // returns the hex value including the number sign (#)
                }

                $post->color = rgb2hex(ColorThief::getColor(public_path('/uploads/posts/' . $filename )));

        } else {
            $post->image = '';
        }


        $post->save();

        return redirect('/blog');

    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show')->with('post', $post);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit')->with(['post'=>$post]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->fill($request->all());

        // imagen 
        $image = $request->file('image');
        if (isset($image)) {
            $ext = $image->getClientOriginalExtension();
            $filename = str_slug($post->titulo) .'_vertical_'.str_random(3).'.'.$ext;
            Image::make($image)->fit(100)->blur(60)->save( public_path('/uploads/posts/blur_' . $filename ) );
            Image::make($image)->encode('jpg', 10)->resize(360,640)->save( public_path('/uploads/posts/' . $filename ) );
            $post->image = $filename;

                function rgb2hex($rgb) {
                   $hex = str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT); $hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT); $hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT); return $hex; // returns the hex value including the number sign (#)
                }

                $post->color = rgb2hex(ColorThief::getColor(public_path('/uploads/posts/' . $filename )));

        }


        $post->save();

        return redirect('/blog');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        Session::flash('message', 'Trabajo Eliminado!');

        return redirect('/admin');
    }
}
