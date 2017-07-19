@extends('layouts.master')
 @section('content')
 <style>

 </style>
 <div class="container bootstrap snippet" style="margin-top:20px;">
     <div class="row">
         <div class="col-lg-3 bg-white ">
             <div class=" row border-bottom padding-sm" style="height: 40px;">Member</div>
             <!--===============================================================-
             ->

             <!-- member list -->
             <ul class="friend-list">
                 <li class="active bounceInDown">	<a href="#" class="clearfix">

                 		<img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="rounded-circle" />

                 		<div class="friend-name">

                 			<strong>John Doe</strong>

                 		</div>

                 		<div class="last-message text-muted">Hello, Are you there?</div>

                 		<small class="time text-muted">Just now</small>

                 		<small class="chat-alert badge badge-danger">1</small>

                 	</a>
                 </li>
                 <li>	<a href="#" class="clearfix">

                 		<img src="https://bootdey.com/img/Content/user_2.jpg" alt="" class="rounded-circle" />

                 		<div class="friend-name">

                 			<strong>Jane Doe</strong>

                 		</div>

                 		<div class="last-message text-muted">Lorem ipsum dolor sit amet.</div>

                 		<small class="time text-muted">5 mins ago</small>

                 	<small class="chat-alert text-muted"><i class="fa fa-check"></i></small>

                 	</a>
                 </li>
                 <li>	<a href="#" class="clearfix">

                 		<img src="https://bootdey.com/img/Content/user_3.jpg" alt="" class="rounded-circle" />

                 		<div class="friend-name">

                 			<strong>Kate</strong>

                 		</div>

                 		<div class="last-message text-muted">Lorem ipsum dolor sit amet.</div>

                 		<small class="time text-muted">Yesterday</small>

                 		<small class="chat-alert text-muted"><i class="fa fa-reply"></i></small>

                 	</a>
                 </li>
                 <li>	<a href="#" class="clearfix">

                 		<img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="rounded-circle" />

                 		<div class="friend-name">

                 			<strong>Kate</strong>

                 		</div>

                 		<div class="last-message text-muted">Lorem ipsum dolor sit amet.</div>

                 		<small class="time text-muted">Yesterday</small>

                 		<small class="chat-alert text-muted"><i class="fa fa-reply"></i></small>

                 	</a>
                 </li>
                 <li>	<a href="#" class="clearfix">

                 		<img src="https://bootdey.com/img/Content/user_2.jpg" alt="" class="rounded-circle" />

                 		<div class="friend-name">

                 			<strong>Kate</strong>

                 		</div>

                 		<div class="last-message text-muted">Lorem ipsum dolor sit amet.</div>

                 		<small class="time text-muted">Yesterday</small>

                 		<small class="chat-alert text-muted"><i class="fa fa-reply"></i></small>

                 	</a>
                 </li>
                 <li>	<a href="#" class="clearfix">

                 		<img src="https://bootdey.com/img/Content/user_6.jpg" alt="" class="rounded-circle" />

                 		<div class="friend-name">

                 			<strong>Kate</strong>

                 		</div>

                 		<div class="last-message text-muted">Lorem ipsum dolor sit amet.</div>

                 		<small class="time text-muted">Yesterday</small>

                 		<small class="chat-alert text-muted"><i class="fa fa-reply"></i></small>

                 	</a>
                 </li>
                 <li>	<a href="#" class="clearfix">

                 		<img src="https://bootdey.com/img/Content/user_5.jpg" alt="" class="rounded-circle" />

                 		<div class="friend-name">

                 			<strong>Kate</strong>

                 		</div>

                 		<div class="last-message text-muted">Lorem ipsum dolor sit amet.</div>

                 		<small class="time text-muted">Yesterday</small>

                 		<small class="chat-alert text-muted"><i class="fa fa-reply"></i></small>

                 	</a>
                 </li>
                 <li> <a href="#" class="clearfix">

                 		<img src="https://bootdey.com/img/Content/user_2.jpg" alt="" class="rounded-circle" />

                 		<div class="friend-name">

                 			<strong>Jane Doe</strong>

                 		</div>

                 		<div class="last-message text-muted">Lorem ipsum dolor sit amet.</div>

                 		<small class="time text-muted">5 mins ago</small>

                 	<small class="chat-alert text-muted"><i class="fa fa-check"></i></small>

                 	</a>
                 </li>
             </ul>
         </div>
         <!--=========================================================-->
         <!-- selected chat -->
         <div class="col-lg-9 bg-white ">
             <div class="chat-message">
                 <ul class="chat">
                     <li class="left clearfix">	<span class="chat-img float-left">

                     		<img src="https://bootdey.com/img/Content/user_3.jpg" alt="User Avatar" />

                     	</span>
                         <div class="chat-body clearfix">
                             <div class="header">	<strong class="primary-font">John Doe</strong>
 	<small class="float-right text-muted"><i class="fa fa-clock-o"></i> 12 mins ago</small>
                             </div>
                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                         </div>
                     </li>
                     <li class="right clearfix">	<span class="chat-img float-right">

                     		<img src="https://bootdey.com/img/Content/user_1.jpg" alt="User Avatar" />

                     	</span>
                         <div class="chat-body clearfix">
                             <div class="header">	<strong class="primary-font">Sarah</strong>
 	<small class="float-right text-muted"><i class="fa fa-clock-o"></i> 13 mins ago</small>
                             </div>
                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                 ornare dolor, quis ullamcorper ligula sodales at.</p>
                         </div>
                     </li>
                     <li class="left clearfix"> <span class="chat-img float-left">

                     		<img src="https://bootdey.com/img/Content/user_3.jpg" alt="User Avatar" />

                     	</span>
                         <div class="chat-body clearfix">
                             <div class="header">	<strong class="primary-font">John Doe</strong>
 	<small class="float-right text-muted"><i class="fa fa-clock-o"></i> 12 mins ago</small>
                             </div>
                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                         </div>
                     </li>
                     <li class="right clearfix"> <span class="chat-img float-right">

                     		<img src="https://bootdey.com/img/Content/user_1.jpg" alt="User Avatar" />

                     	</span>
                         <div class="chat-body clearfix">
                             <div class="header">	<strong class="primary-font">Sarah</strong>
 	<small class="float-right text-muted"><i class="fa fa-clock-o"></i> 13 mins ago</small>
                             </div>
                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                 ornare dolor, quis ullamcorper ligula sodales at.</p>
                         </div>
                     </li>
                     <li class="left clearfix"> <span class="chat-img float-left">

                     		<img src="https://bootdey.com/img/Content/user_3.jpg" alt="User Avatar" />

                     	</span>
                         <div class="chat-body clearfix">
                             <div class="header">	<strong class="primary-font">John Doe</strong>
 	<small class="float-right text-muted"><i class="fa fa-clock-o"></i> 12 mins ago</small>
                             </div>
                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                         </div>
                     </li>
                     <li class="right clearfix"> <span class="chat-img float-right">

                     		<img src="https://bootdey.com/img/Content/user_1.jpg" alt="User Avatar" />

                     	</span>
                         <div class="chat-body clearfix">
                             <div class="header">	<strong class="primary-font">Sarah</strong>
 	<small class="float-right text-muted"><i class="fa fa-clock-o"></i> 13 mins ago</small>
                             </div>
                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                 ornare dolor, quis ullamcorper ligula sodales at.</p>
                         </div>
                     </li>
                     <li class="right clearfix"> <span class="chat-img float-right">

                     		<img src="https://bootdey.com/img/Content/user_1.jpg" alt="User Avatar" />

                     	</span>
                         <div class="chat-body clearfix">
                             <div class="header">	<strong class="primary-font">Sarah</strong>
 	<small class="float-right text-muted"><i class="fa fa-clock-o"></i> 13 mins ago</small>
                             </div>
                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                 ornare dolor, quis ullamcorper ligula sodales at.</p>
                         </div>
                     </li>
                 </ul>
             </div>
             <div class="chat-box bg-white">
                 <div class="input-group">
                     <input class="form-control border no-shadow no-rounded" placeholder="Type your message here"
                     />	<span class="input-group-btn">

             			<button class="btn btn-success no-rounded" type="button">Send</button>

             		</span>
                 </div>
                 <!-- /input-group -->
             </div>
         </div>
     </div>
 </div>


@endsection('content')
