<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\posts;
use App\Models\user;
use RealRashid\SweetAlert\Facades\Alert;
use App\Imports\PostImport;
use App\Exports\PostExport;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    // Show the home page with all posts
    function index(Request $request){
        $post = posts::all();
        return view('user.home', compact('post'));
    }

    // Redirect based on user type
    function redirect(){
        $usertype = Auth::user()->usertype;
        if($usertype == '1'){
            $total_post=posts::all()->count();
            $total_category=category::all()->count();
            $total_user=user::all()->count();
            $users = user::all();
            return view('admin.home', compact('users','total_post','total_category','total_user'));
        } else {
            $post = posts::all();
            return view('user.home', compact('post'));
        }
    }

    // Show the form to add a new post
    function add_post(){
        if(Auth::user()){
            $category = Category::all();
            return view('user.form', compact('category'));
        } else {
            return redirect('login');
        }
    }

    // Process and save new posts
    function posts(Request $request){
        $post = new posts;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->content = $request->content;
        $post->tag = $request->tag;
        $post->category = $request->category;
        $thumbnail = $request->thumbnail;

        if($thumbnail){
            $thumbnailname = time().'.'.$thumbnail->getClientOriginalExtension();
            $request->thumbnail->move('thumbnail', $thumbnailname);
            $post->thumbnail = $thumbnailname;
        }

        $post->save();
        Alert::success('Blog has been Added', 'Successfully Posted');
        return redirect()->back();
    }

    // Show the user's blogs
    function my_blog(){
        if(Auth::user()){
            $post = posts::all();
            return view('user.showPosts', compact('post'));
        } else {
            return redirect('login');
        }
    }

    // Delete a post
    function delete_post($id){
        $post = posts::find($id);
        $post->delete();
        return redirect()->back();
    }

    // Show the edit form for a post
    function edit_post($id){
        $data = posts::find($id);
        $category = Category::all();
        return view('user.update_form', compact('data','category'));
    }

    // Update edited post
    function edited_post($id, Request $request){
        $post = posts::find($id);
        $post->title = $request->title;
        $post->author = $request->author;
        $post->content = $request->content;
        $post->tag = $request->tag;
        $post->category = $request->category;
        $thumbnail = $request->thumbnail;

        if($thumbnail){
            $thumbnailname = time().'.'.$thumbnail->getClientOriginalExtension();
            $request->thumbnail->move('thumbnail', $thumbnailname);
            $post->thumbnail = $thumbnailname;
        }

        $post->save();
        Alert::success('Blog has been updated', 'Successfully Posted');
        return redirect()->back();
    }

    // Export posts to Excel
    function export(){
        return Excel::download(new PostExport,'Posts.xlsx');
    }

    // Import posts from Excel
    function import(){
        Excel::import(new PostImport, request()->file('file'));
        return redirect()->back();
    }

    // Show details of a specific post
    function post_details($id){
        $post = posts::find($id);
        return view('user.postDetails', compact('post'));
    }
}
