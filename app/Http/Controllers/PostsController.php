<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $adminData = User::where(['id'=>$id]);
        $data2 = Post::all();
        return view('profile',compact('adminData','data2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $adminData = User::where(['id'=>$id]);
        $data2 = Post::all();
        return view('layout.profile',compact('adminData','data2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $data = new Post;
        function postid(){
        $length = rand(0,19);
        $number = "";
        for($i=0 ; $i < $length; $i++){
            
            $new_rand = rand(6,9);
            $number = $number . $new_rand;
        }
        return $number;
        }
        $postid = postid();
        $data->post=$request->post;
       
        $data->user_id=$id;

        $data->save();
        $adminData = User::where(['id'=>$id]);
        $data2 = Post::latest()->paginate(PAGINATION_COUNT);
        return view('profile',compact('adminData','data2'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
