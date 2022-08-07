<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\Message;
use Illuminate\Support\Facades\DB;
class MassengerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = session('adminData')[0]->id;
        $users = User::where('id','!=',$id)->get();
        return view('layout.message',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //$message = Message::where('sender','=',$userid,'and','receiver','=',$id ||'receiver','=',$userid,'and','sender','=',$id )->join('users','users.id','=',$userid || $id);
    public function create($userid)
    {
        $id = session('adminData')[0]->id;
        $user= session('adminData')[0];
        $sender = Message::join('users','users.id','=','message.sender')->where(
            'receiver',$id)->where('sender',$userid
            )->orWhere(
            'sender',$id)->where('receiver',$userid
            )->latest()->paginate(PAGINATION_COUNT);
        $receiver = Message::where('receiver',$userid)->latest()->paginate(PAGINATION_COUNT);
        $users = User::where('id','!=',$id)->get();
        return view('layout.messenger',compact('user','users','userid','sender','receiver'))->with(['success' => 'تم ألاضافة بنجاح']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,$userid,$id)
    {
        $data = new Message;
        $data->sender=$userid;
        $data->receiver=$id;
        $data->message=$request->message;
        $data->save();
        session()->flash('message','your message has been submited');
        return redirect('messageuser/'.$id)->with($userid);
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
