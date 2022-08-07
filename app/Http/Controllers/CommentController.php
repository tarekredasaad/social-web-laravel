<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\DB;
use App\Models\Notification;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$postid , $user ,$useridp)
    {
        //
        $data = new Comment;
        $data->user_id=$user;
        $data->post_id=$postid;
        $data->comments=$request->comment;
        $data->save();
        $data3= new Notification;
          $data3->userid = $user;
          $data3->activity = 'commented';
          $data3->contentid = $postid;
          $data3->content_owner = $useridp;
          $data3->content_type = 'post';
          $data3->save();
        //   $data5= Post::where(['postid'=>$postid])->get('comment');
          $data4= Post::where(['postid'=>$postid])->update(['comment'=>DB::raw('comment+1')]);
        // $com=  $data4+1;

        // $data4=2;
        // DB::table('post')->where('postid', $postid)->update(['comment' => $data4+1]);
        // $data4->save();
        //   $data2 = DB::update('update post set comment = ? where postid = ?',[$com+1,$postid]);
        return redirect('home')->with('data5',$data5);
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
