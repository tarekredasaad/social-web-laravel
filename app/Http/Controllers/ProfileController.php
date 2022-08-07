<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class ProfileController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index($id)
    {
        $Data = User::find($id);
        $data2 =Post::join('users','users.id','=','post.user_id')->where(['user_id'=>$id])->get();
        $adminData = User::where(['id'=>$id]);
        return view('layout.yourprofile',compact('adminData','data2','Data'));
    }

    public function red()
    {
        
        $adminData = User::where(['id'=>1]);
        return view('layout.yourprofile',compact('adminData'));
    }

    public function update_profile(Request $request , $id)
    {
        $data =User::find($id);

        $image = $request->img;
        $imagename =time().'.'.$image->getClientOriginalExtension();
        $request->img->move('imagepost',$imagename);

        $data->img=$imagename;

        $data->save();

        return redirect('home')->with('success','data has been updated');
    }
}
