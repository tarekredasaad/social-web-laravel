<!DOCTYPE html>
<html lang="en">
<head>
@include('layout.pagecss')

</head>
<body style="font-family: tohoma; background-color:#d0d8e4;">

    <div  id="blue_bar">
        <div style="width: 800px; margin:auto;">
            MyBook &nbsp &nbsp<input type="text" id="search_box">
             <?php
             ?>
            <span ><a href="notification.php"><i class="fa fa-bell" style="color:yellow;"></i></a><span id="notif" ><?php  ?></span></span>
            <span ><a href="friends_page.php?userid=<?php  ?>"><i class="fa fa-users" style="color:black;"></i></a><span id="notif" ><?php ?></span></span>
            <span ><a href="messenger.php?userid=<?php  ?>"><i class="fa fa-envelope-o" style="color:#fff;"></i></a><span id="notif" ><?php  ?></span></span>

            <img id="img_profile" class="rounded-circle" style="width: 50px;float: right; height:50px;" src="imagepost/<?php  ?>">
            <a href='logout.php' style="float: right;">Logout</a>


        </div>
    </div>
                        <div class="mm" >
                          <?php   ?>
                        </div>

    <div style="width: 800px; margin:auto; min-height:400px;">
        <div style="text-align:center;height: 320px;">
        @foreach($adminData as $adminData)
        <?php  $id = $adminData->id; ?>
        <img src="imagepost/mountain.jpg" style="width:100%;" alt="">
        <img src="imagepost/<?php  ?>" style="border-radius:50%; margin-top: -162px;width: 150px; border:solid 2px white;" alt=""><br>
            <div style="text-align:center;position:relative;">
                <a href="{{url('change_profile',$id)}}" style="float:right;">change profile</a>
                <span>{{$adminData->id}} </span><span> About</span><a href="group.php?userid=<?php ?>">groups</a><span><a href="friends_list.php?userid=<?php ?>">Friends</a></span><span>Photos</span><span>Settings</span>
            </div>
        </div>

        <div class="row" style="">

            <div class="col-md-3" id="friend_bar" style="min-height: 400px;  background-color:white;">
                friend suggestions <br>

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
                </div>
                @endforeach
                <div class="post_bar">
                @foreach($data2 as $data2)
                <div class='posts col-sm-12'>
                    <div>
                            <img src='$path_img' style='width:75px; height:75px; border-radius:50%;' >
                         </div>
                         <div>
                             <div ><a href='profile.php?userid=$userids' style='color:black'>{{$data2->userid}}</a></div>
                            <p> {{$data2->post}}</p>
                            <br>
                            <a href='likes.php?postid= $postid &type=post&userid=$userid'><span class='likes'><i class='fa fa-thumbs-up'></i></span></a>  <span class='commenticon'><i class='fa fa-comment'></i></span> <a href='directShare.php?postid= $postid &ownerpost=$userids&userid=$userid'  style='color:white; ' class='like commenticon'><span><i class='fa fa-share' aria-hidden='true'></i></span> </a>
                            <br>
                            <a href=''  style='color:white; ' class='like'>$Nlike Like</a> <span class=' com' style='color:white; '>($Ncomment) Comment</span>
                            <a href='directShare.php?postid= $postid &ownerpost=$userids&userid=$userid'  style='color:white; ' class='like'> Share</a> <span style='color:white;'> $date  April 5 20:45</span>
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
