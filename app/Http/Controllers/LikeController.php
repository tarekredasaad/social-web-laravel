<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
class LikeController extends Controller
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
    public function create($postid , $user ,$useridp)
    {
        $id = session('adminData')[0]->id;
        $data = new Like;
        $like = Like::where(["contentid"=>$postid])->where('likes',$user)->count();
        print_r($like);
        if($like >0){
        //     return redirect('home')->with( 'success','data is already exist ');
            // $ss = $like->likes;
            $likke = Like::select('id')->where(["contentid"=>$postid])->where('likes',$user)->delete();
            $data4= Post::where(['postid'=>$postid])->update(['likes'=>DB::raw('likes-1')]);
        //   $lik[] =  json_decode($ss);
        // $data =Like::find($likke);
        // $data->delete();
        //  $ff= print_r($lik);
        //   if(in_array($user,$lik)){
        //     for($i = 0 ;$i <sizeof($lik->userid); $i++){
        //         if($lik->userid[$i] === $user){
        //     unset($lik->userid[$i]);
        //         }
        //     }
        //     $ke = json_encode($lik);$ff= print_r($lik);
        //     DB::update('update likes set likes = ? where contentid = ?',[$ke,$postid]);
            return redirect('home')->with('ff');

        //   }else{
        //     for($i = 0 ;$i <sizeof($lik); $i++){
        //         if($lik[$i] === $user){
        //             array_push($lik[$i]);
        //         }
        //     }
        //     array_push($lik,$user);
        //     $llk = json_encode($lik);$ff= print_r($lik);
        //     DB::update('update likes set likes = ? where contentid = ?',[$llk,$postid]);
        //     // return redirect('home')->with('ff');
        //   }
        }else{

        $data->contentid = $postid;
        // $users['userid'] = [];
        // array_push($users['userid'],$user);
        $data->likes = $user;
        $data->type = 'post';
        $data->save();
          $data3= new Notification;
          $data3->userid = $user;
          $data3->activity = 'liked';
          $data3->contentid = $postid;
          $data3->content_owner = $useridp;
          $data3->content_type = 'Post';
          $data3->save();
          $data4= Post::where(['postid'=>$postid])->update(['likes'=>DB::raw('likes+1')]);
        return redirect('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
