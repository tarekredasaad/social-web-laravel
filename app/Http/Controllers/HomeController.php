<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Friend_Request;
use App\Models\Notification;

class HomeController extends Controller
{



    public function home()
    {
        $data = new Post;
        $like = Like::where(['contentid'=>85])->get();
        $adminData = User::where(['id'=>1]);
        $id = session('adminData')[0]->id;
        $Data = User::find($id);//('bookings', function($join)

        $users = User::leftJoin('friend_request',function($join){
            $join->on('friend_request.owner_request','=','users.id')->orOn('friend_request.owner_target','=','users.id');
        })->where('users.id','!=',$id)->get();
        $notiFriend = Friend_Request::where('owner_target',$id)->where('request_status','pending')->count();
        $noti = Notification::where('content_owner',$id)->
        where('content_type','Message')->where('noti_status',0)->count();
        $notipost = Notification::where('content_owner',$id)->
        where('content_type','Post')->where('noti_status',0)->count();
        $data2 = Post::join('users','users.id','=','post.user_id')
        ->join('comments','comments.post_id','=','post.postid')
        ->latest('post.created_at')->orderBy('post.created_at')->paginate(PAGINATION_COUNT);
        $com =new Comment;
        return view('profile',compact('adminData','data2','users','Data','like','noti','notipost','com','notiFriend'));
    }
    public $password;
    public $email;

    protected $rules = [
        'password' => 'required|min:6',
        'email' => 'required|email',
    ];

    // public function updated($email)
    // {
    //     $this->validateOnly($email);
    // }


    // Check Login
    function check_login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6',
        ]);
        $admin=User::where(['email'=>$request->email,'password'=>sha1($request->password)])->count();
        if($admin>0){
            $adminData=User::where(['email'=>$request->email,'password'=>sha1($request->password)])->get();
            session(['adminData'=>$adminData]);
                $t =$adminData[0]->id;
            $Data =  User::find($t);
            $like = Like::find(14);
            $users = User::leftJoin('friend_request',function($join){
                $join->on('friend_request.owner_request','=','users.id')->orOn('friend_request.owner_target','=','users.id');
            })->where('users.id','!=',$t)->get();
            $noti = Notification::where('content_owner',$t)->
            where('content_type','Message')->where('noti_status',0)->count();
            $notipost = Notification::where('content_owner',$t)->
            where('content_type','Post')->where('noti_status',0)->count();
            $data2 =  Post::join('users','users.id','=','post.user_id')
            ->leftJoin('comments','comments.post_id','=','post.postid')
            ->latest('post.created_at')->orderBy('post.created_at')->paginate(PAGINATION_COUNT);
            $com =new Comment;
            return view('profile',compact('adminData','data2','users','Data','like','noti','notipost','com'));
        }else{
            session()->flash('msg','Invalid email/Password!!');
            return redirect('/')->with('msg','Invalid email/Password!!');
        }


    }

    public function signup(Request $request)
    {
       $data = new User;

        $data->name=$request->name;
        $data->email=$request->email;
        $data->password=$request->password;
        $data->gender=$request->gender;
        // $data->user_id=$id;

        $data->save();


        return redirect('/')->with(['success' => 'تم ألاضافة بنجاح']);
    }

}
