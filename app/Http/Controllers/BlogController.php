<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view("dashboard.blogs.index")->with('blogs', $blogs);
    }
    public function create()
    {
        return view('dashboard.blogs.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'blog_title' => 'required|max:255|min:10|string',
            'content' => 'required|string',
            'user_id'=> 'required|exists:users,id|numeric',
            'image'=> 'required|max:2048|mimes:png,jpg,gif,avif',
        ]);

        $path = $request->file('image')->store('blogs', 'public');

        $blog = Blog::create([
            'title' => $request->blog_title,
            'content'=> $request->content,
            'user_id'=> 1,
            'image'=> $path
        ]);


        return back();
    }

    // ???
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('frontend.show')->with('blog', $blog);
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('dashboard.blogs.edit')->with('blog', $blog);
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->title = $request->blog_title;
        $blog->content = $request->content;
        $blog->save();
        return back();

    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return back();
        // return redirect('/');
    }

}
