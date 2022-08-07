<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class PostController extends Controller
{
    public function index()
    {
        $adminData = User::where(['id'=>1]);
        $data2 = Post::all();
        return view('profile',compact('adminData','data2'));
    }

    public function post(Request $request,$id)
    {
       $data = new Post;
        
        $data->post=$request->post;
       
        $data->user_id=$id;

        $data->save();
        session()->flash('post','your post has been added');
        $Data = User::find($id);
        $data2 = Post::latest()->paginate(PAGINATION_COUNT);
        return redirect('home');
    }
}
