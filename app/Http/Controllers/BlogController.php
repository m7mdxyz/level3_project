<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Blog;
use Auth;

class BlogController extends Controller
{
    public function index()
    {
        if (auth()->user()->user_type_id==1) {
            // Show all blogs if the user is an admin
            $blogs = Blog::all();
        } else {
            // Show only published blogs if the user is not an admin
            $blogs = Blog::where('is_published', 1)->get();
        }

        return view('dashboard.blogs.index', ['blogs' => $blogs]);
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
            'image' => 'required|max:2048|mimes:png,jpg,gif,avif',
        ]);

        // Get the authenticated user's ID
        $user_id = auth()->user()->id;

        // Store the image and get the path
        $path = $request->file('image')->store('blogs', 'public');

        // Create a new Blog record with user_id included
        $blog = Blog::create([
            'title' => $request->blog_title,
            'content' => $request->content,
            'user_id' => $user_id,
            'image' => $path
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

    public function showProfile()
    {
        $user = auth()->user(); // Assuming the authenticated user
        $blogsCount = Blog::where('user_id', $user->id)->count();

        return view('/dashboard/Auth/myprofile', compact('user', 'blogsCount'));
    }

    public function showEditProfile()
    {
        $user = auth()->user(); // Assuming the authenticated user
        $blogsCount = Blog::where('user_id', $user->id)->count();

        return view('/dashboard/Auth/edit', compact('user', 'blogsCount'));
    }

    public function saveProfileChanges(Request $request)
    {
        $credentials = $request->validate([
            'name'=> 'required|min:6|max:255',
            'email'=>'required|email:rfc,dns|string|max:255'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            // return Auth::user();
            return redirect('/');
        }

        // return 0;
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function viewPublish()
    {
        $blogs = Blog::all();
        // Retrieve the user_type_id of the authenticated user
        $user_type_id = auth()->user()->user_type_id;
        
        // Check if the user is an admin (user_type_id == 1)
        if ($user_type_id == 1) {
            // Return the view for admin users
            return view('dashboard.blogs.publish')->with('blogs', $blogs);
        } else {
            // Return a different view (in this case, redirect to '/')
            return redirect('/');
        }
    }

    public function publishing($blog_id, $status)
    {
        // Find the blog by its ID
        $blog = Blog::findOrFail($blog_id);

        // // Check the current status and toggle accordingly
        // if ($blog->is_published != 0) {
        //     // If already published, unpublish it
        //     $blog->is_published = 0;
        //     $action = 'unpublished';
        // } else {
        //     // If not published, publish it
        //     $blog->is_published = 1;
        //     $action = 'published';
        // }

        $blog->is_published = $status;


        // Save the updated status
        $blog->update();

        // Redirect back or to a specific route
        return back();
    }



}
