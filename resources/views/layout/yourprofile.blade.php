<!DOCTYPE html>
<html lang="en">
<head>
@include('layout.pagecss')
</head>
<body style="font-family: tohoma; background-color:#d0d8e4;">
    <br><div  id="blue_bar">
        <div style="width: 800px; margin:auto;">
        {{ $img = session('adminData')[0]->img}}
            MyBook &nbsp &nbsp<input type="text" id="search_box">
            <img id="img_profile" class="rounded-circle" style="width: 50px;float: right; height:50px;" src="imagepost/{{$img}}">
            <a href='logout.php' style="float: right;">Logout</a>
        </div>
    </div>
        {{ $id = session('adminData')[0]->id}}
       
    <?php  echo $id ;  ?>
    <div style="width: 800px; margin:auto;background-color:white ;min-height:400px;">
        <div style="text-align:center;">
        <img src="mountain.jpg" style="width:100%;" alt="">
        <img src="imagepost/{{$img}}" style="border-radius:50%; margin-top: -612px;width: 150px; border:solid 2px white;" alt=""><br>
        <form action="{{url('update_profile',$id)}}" method="POST" class='jjs' enctype="multipart/form-data">
            @csrf
            <input type="file" name="img" >
            <input type="submit" name="pp" value="change profile">
            </form>
        <span>Timeline</span><span>About</span><span>Friends</span><span>Photos</span><span>Settings</span> 
          <span class="message"><a href='message.php?userid=<?php  ?>'>Message</a></span>
        </div>
        <div style="display:flex;">
        <!-- friends area -->
            <div id="friend_bar" style="min-height: 400px; flex:1; background-color:white;">
                friends <br>
               
             <?php
                       ;
                         ?>
            </div>
           
            <div style="min-height: 400px; flex:2.5; margin-top:20px; margin-left:15px;">
                <div style="border: solid thin #aaa; padding:10px; background-color:white; position:relative;">
                <form  action="" method="POST" enctype="multipart/form-data">
	  		
                    <textarea placeholder="what's on your mind" name="post" id="" cols="30" rows="4"></textarea>
                    <label class="btn btn-warning float-right" style="position:relative; top: -64px;">
				  select image <input type="file" name="upload_image" style="display:none;"></label>
                    <div>
                    <input class="post " name="sub" type="submit" id="post_button" value="Post"> </div>
                    <br>
                    <br>
                    </form>
                </div>
                <div class="post_bar">
                   
                @foreach($data2 as $data)
                <div class='posts col-sm-12'>
                    <div><?php $id= $data->id;?>
                            <img src='imagepost/{{$data->img}}' style='width:75px; height:75px; border-radius:50%;' >
                         </div> 
                         <div>
                             <div ><a href="{{url('change_profile',$id)}}" style='color:black'>{{$data->name}}</a></div>
                            <p> {{$data->post}}</p> 
                            <br><?php $postid = $data->postid; $user = $Data->id;  ?>
                            <a href="{{url('likes/'.$postid.'/'.$user)}}">like</a>
                            <a href="{{url('likes/'.$postid.'/'.$user)}}"><span class='likes'><i class='fa fa-thumbs-up'></i></span></a>  <span class='commenticon'><i class='fa fa-comment'></i></span> <a href='directShare.php?postid= $postid &ownerpost=$userids&userid=$userid'  style='color:white; ' class='like commenticon'><span><i class='fa fa-share' aria-hidden='true'></i></span> </a>
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
    
</body>
</html>