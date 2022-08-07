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
            <img id="img_profile" class="rounded-circle" style="width: 50px;float: right; height:50px;" src="imagepost/<?php  ?>">
        </div>
    </div>
    <div style="width: 800px; margin:auto;background-color:white ;">

        <div style="">

                    <div style="height: auto; margin-top:20px; margin-left:15px;">
                        <div style="height: 58px;">

                            <img id="img_profile" class="rounded-circle" style="width: 50px;float: left; height:50px; margin-bottom:20px;" src="imagepost/<?php  ?>">

                        </div>
                        <div class="row ml-2" style="margin-top: 54px; height: auto">
                        <?php

                        ?>
                            {{$id = session('adminData')[0]->id;}}
                <div class="contacts p-2 flex-1 overflow-y-scroll">
                @foreach($users as $user )

                {{$userid = $user->id}}

                    <div class="flex justify-between items-center p-3 hover:bg-gray-800 rounded-lg relative" >
                        <div class="w-16 h-16 relative flex flex-shrink-0">
                          <a href="{{url('messageuser',$userid)}}">  <img class="shadow-md rounded-full w-full h-full object-cover"
                                 src="{{asset('')}}./imagepost/{{$user->img}}"
                                 alt=""
                            /></a>
                        </div>

                        <div class="flex-auto min-w-0 ml-4 mr-6 hidden md:block group-hover:block">
                            <p>{{$user->name}}</p>
                            <div class="flex items-center text-sm text-gray-600">
                                <div class="min-w-0">
                                    <p class="truncate">Ok, see you at the subway in a bit.</p>
                                </div>
                                <p class="ml-2 whitespace-no-wrap">Just now</p>
                            </div>
                        </div>
                    </div> @endforeach
                         </div>
                         <div style="border: solid thin #aaa; padding:5px; background-color:white; position:relative;">




                     </div>
                        </div>




                     </div>
                </div>


</body>
</html>
