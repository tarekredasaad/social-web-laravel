<!DOCTYPE html>
<html lang="en">
<head>
@include('pagecss')

</head>
<body style="font-family: tohoma; background-color:#d0d8e4;">
@if( session()->has('post'))
                <div class="alert alert-success">
                    {{session('post')}}
                </div>@endif
    <div  id="blue_bar">
        <div style="width: 800px; margin:auto;margin-top:5px;"><?php  $id = $Data->id; print_r($id);
         $img = $Data->img;  ?>
            MyBook &nbsp &nbsp<input type="text" id="search_box">
             <?php
             ?>
            <span ><a href="{{url('notification')}}"><i class="fa fa-bell" style="color:yellow;"></i></a><span id="notif" ><?php  ?>{{$notipost}}</span></span>
            <span ><a href="{{url('friend_request/'.$id)}}"><i class="fa fa-users" style="color:black;"></i></a><span id="notif" ><?php ?></span></span>
            <span ><a href="{{url('messenger')}}">mess<i class="fa fa-envelope-o" style="color:#fff;"></i></a><span id="notif" ><?php  ?>{{$noti}}</span></span>

            <img id="img_profile" class="rounded-circle" style="width: 50px;float: right; height:50px;" src="imagepost/{{$img}}">
            <a href='logout.php' style="float: right;">Logout</a>


        </div>
    </div>
                        <div class="mm" >
                          <?php   ?>
                        </div>

    <div style="width: 800px; margin:auto; min-height:400px;">
        <div style="text-align:center;height: 320px;">


        <img src="imagepost/mountain.jpg" style="width:100%;" alt="">
        <img src="imagepost/{{$img}}" style="border-radius:50%; margin-top: -162px;width: 150px; border:solid 2px white;" alt=""><br>
            <div style="text-align:center;position:relative;">
                <a href="{{url('change_profile',$id)}}" style="float:right;">change profile</a>
                <span><?php echo $Data->name;?></span><span>About</span><a href="{{url('post',$id)}}">groups</a><span><a href="friends_list.php?userid=<?php ?>">Friends</a></span><span>Photos</span><span>Settings</span>
            </div>
        </div>

        <div class="row" style="">

            <div class="col-md-3" id="friend_bar" style="min-height: 400px;  background-color:white;">
                friend suggestions <br>
                <div class="contacts p-2 flex-1 overflow-y-scroll">
                    {{-- {{ dd($users) }} --}}
                @foreach($users as $user )

               <?php $userid = $user->id ?>

                    <div class="flex justify-between items-center p-3 hover:bg-gray-800 rounded-lg relative" >
                        <div class="w-16 h-16 relative flex flex-shrink-0">  @if( $user->owner_target !== $id && $user->owner_request !== $id)
                          <a href="{{url('change_profile',$userid)}}">  <img class="shadow-md   object-cover"
                                 src="{{asset('')}}./imagepost/{{$user->img}}" style='width:75px; height:75px; border-radius:50%;'
                                 alt=""
                            /></a>
                        </div>

                        <div class="flex-auto min-w-0 ml-4 mr-6 hidden md:block group-hover:block">
                            <p>{{$user->name}}</p>

                            @if(   $user->request_status == 'pending' && $user->owner_target == $user->id)
                            <span class="btn btn-danger"><a href="{{url('friend_reject/'.$userid.'/'.$id)}}"> Reject</a></span>
                            @endif
                            @if($user->request_status !== 'pending' )
                            <span class="btn btn-info"><a href="{{url('friend_request/'.$userid.'/'.$id)}}"> Request</a></span>
                            @endif
                            @if($user->request_status == 'pending' && $user->owner_request == $user->id)
                            <span class="btn btn-primary"><a href="{{url('friend_Accept/'.$userid.'/'.$id)}}"> Accept</a></span>
                            <span class="btn btn-danger"><a href="{{url('friend_rejected/'.$userid.'/'.$id)}}"> Reject</a></span>
                            @endif
                            @endif
                        </div>
                    </div> @endforeach
                    </div>
             <?php
                        // echo $user_id . $date;
                         ?>
            </div>

            <div class="col-md-9" style="min-height: 400px;  margin-top:20px; margin-left:0px;">
                <div style="border: solid thin #aaa; padding:10px; background-color:white; position:relative;">
                <form  action="{{url('post',$id)}}" method="POST" enctype="multipart/form-data">
                     @csrf
                    <textarea placeholder="what's on your mind" name="post" id="" cols="30" rows="4"></textarea>
                    <label class="btn btn-warning float-right" style="position:relative; top: -64px;">
				  select image <input type="file" name="upload_image" style="display:none;"></label>
                    <div>
                    <input class="post " name="sub" type="submit" id="post_button" value="Post"> </div>
                    <br>
                    <br>
                    </form>
                </div><?php //$hh = json_decode($like->likes);
                // if($hh[1] == 1){
                //     unset($hh[1]);
                //  } array_push($hh,3)?>


                <div class="post_bar">
                @foreach($data2 as $data)
                <div class='posts col-sm-12'>
                    <div><?php $id= $data->id;?>
                            <img src='imagepost/{{$data->img}}' style='width:75px; height:75px; border-radius:50%;' >
                         </div>
                         <div>
                             <div ><a href="{{url('change_profile',$id)}}" style='color:black'>{{$data->name}}</a></div>
                            <p> {{$data->post}}</p>
                            <br><?php $postid = $data->postid;$useridp = $data->user_id; $user = $Data->id;  ?>
                            <a href="{{url('likes/'.$postid.'/'.$user.'/'.$useridp)}}">like</a>
                            <a href="{{url('likes/'.$postid.'/'.$user)}}"><span class='likes'><i class='fa fa-thumbs-up'></i></span></a>  <span class='commenticon'><i class='fa fa-comment'></i></span> <a href='directShare.php?postid= $postid &ownerpost=$userids&userid=$userid'  style='color:white; ' class='like commenticon'><span><i class='fa fa-share' aria-hidden='true'></i></span> </a>
                            <br>
                            <a href=''  style='color:white; ' class='like'>$Nlike Like</a> <span class=' com' style='color:white; '>($Ncomment) Comment</span>
                            <a href='directShare.php?postid= $postid &ownerpost=$userids&userid=$userid'  style='color:white; ' class='like'> Share</a> <span style='color:white;'> $date  April 5 20:45</span>
                            </div>

                         </div>
                         <div class='row'>
                                <div class='col-md-12 col-md-offset-6'>
                                    <div class='panel panel-info'>
                                        <div class=' panel-body'>
                            <form action="{{url('comment/'.$postid.'/'.$user.'/'.$useridp)}}" method="post">
                                @csrf
                                <input type="text" name='comment' style='height:30px;width:80%; border-radius:12px;'>
                                <span  class='info pull-right' name='reply'> <input type='submit'> </span>
                            </form>
                                        </div>
                                     </div>
                                </div>
                            </div>
                            <div class='row commentt' style='background-color: #3f5a8c; color: white;margin-top: 5px; margin-bottom: 4px;border-radius: 15px; width: 480px; margin-left: 2px;'>
                                <div class='col-md-12 col-md-offset-6'>
                                    <div class='panel panel-info'>
                                        <div class=' panel-body'>
                                            <div>
                                            <p>$com_author <i> commented</i> on $date</p>
                                            <h3 class='text-primaty' style='margin-left:5px; font-size:17px;'>{{$data->comments}}</h3>
                                            <span style='display:block;'><?php $comid = $data->com_id ;?>
                                            <a href="{{url('likes/'.$comid.'/'.$user.'/'.$useridp)}}">like</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         @endforeach

                         <a href='profile_page.php?page=<?php  ?>'>
                          <button    id="post_button" style = "float:right; width:120px;" > Next Page </button>
                          </a>
                          <a href='profile_page.php?page=<?php  ?>'>
                          <button    id="post_button" style = "float:left; width:120px;"> Pervious Page </button>
                          </a>
                </div>

            </div>
        </div>
    </div>
    <script>

   </script>

</body>
</html>
