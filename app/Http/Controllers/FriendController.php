<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friend_Request;
use App\Models\Friends;
use App\Models\User;
use App\Models\Notification;

class FriendController extends Controller
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
        $id = session('adminData')[0]->id;
        $users = User::where('id','!=',$id)->get();
        return view('layout.Friends',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id,$userid)
    {
        $data = new Friend_Request;
        $data->owner_request=$userid;
        $data->owner_target=$id;
        $data->request_status='pending';
        $data->save();
        return redirect('home');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function accept($id,$userid)
    {
        $data =  Friend_Request::select('*')->where('owner_target',$userid)->where('owner_request',$id)->where('request_status','pending')->update(['request_status'=>'friend']);
        // $data->request_status='friend';
        // $data->save();
        $data3= User::find($id);
        $usrName =$data3->name;
        $usrimg =$data3->img;
        $data4= User::find($userid);
        $friName =$data4->name;
        $friimg =$data4->img;
        $data2= new Friends;
        $data2->user_id=$id;
        $data2->friend_id=$userid;
        $data2->user_name=$usrName;
        $data2->friend_name=$friName;
        $data2->user_img=$usrimg;
        $data2->friend_img=$friimg;
        $data2->status='friend';
        $data2->save();
        return redirect('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
    public function destroy($id,$userid)
    {
        $data =  Friend_Request::select('*')->where('owner_target',$id)->where('owner_request',$userid)->where('request_status','pending')->delete();

        // $data->delete();
        return redirect('home');

    }
}
