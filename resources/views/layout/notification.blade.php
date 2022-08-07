<!DOCTYPE html>
<html lang="en">
<head>
    
@include('layout.pagecss')
</head>


<body style="font-family: tohoma; background-color:#d0d8e4;">
    <br><div  id="blue_bar">
        <div style="width: 800px; margin:auto;">
            MyBook &nbsp &nbsp<input type="text" id="search_box">
            
            <img id="img_profile" class=" " style="width: 50px;float: right; height:50px;" src="notification.png">
            <img id="img_profile" class="rounded-circle" style="width: 50px;float: right; height:50px;" src="imagepost/member3.jpg">
        </div>
    </div>
    <div style="width: 800px; margin:auto;background-color:white ;">
       
        <div style="display:flex;">
        
                    <div style="min-height: 400px; flex:1.5; margin-top:20px; margin-left:15px;">
                     <!-- <div style="border: solid thin #aaa; padding:10px; background-color:white; position:relative;"> -->
                        <div  > 
                        <div class='notifications' >@foreach($noti as $not) <h6> {{$not->name}}  {{$not->activity}} 'your post' </h6>
                         
                        @endforeach  </div> <br/>
                        <?php   ?>
                        </div>
                        
                    <!-- <form  action="" method="POST" enctype="multipart/form-data">
	  		
                    <textarea placeholder="what's on your mind" name="post" id="" cols="30" rows="4"></textarea>
                    <label class="btn btn-warning float-right" style="position:relative; top: -64px;">
				  select image <input type="file" name="upload_image" style="display:none;"></label>
                    <div>
                    <input class="post " name="sub" type="submit" id="post_button" value="Post"> </div>
                    <br>
                    <br>
                    </form> -->
                    </div>
                    <!-- <div class="post_bar">
                    <!-- <div class="posts"> -->
                         <!-- <div>
                            <img src="imagepost/member2.jpg" style="width:75px; height:75px;" alt="">
                         </div> 
                         <div>
                             <div style="color:#405d9b">First User</div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore deserunt beatae quas sint explicabo placeat, amet quam neque iste voluptas recusandae fugiat labore nesciunt iusto odit consectetur cupiditate aut reiciendis!</p> 
                            <br>
                            <br>
                            <a href="">Like</a> <a href="">Comment</a> <span style="color:#aaa;"> April 5 20:45</span>
                         </div> -->
                    <!-- </div> -->
                   
                     </div>
                </div>
        </div>
    
</body>
</html>