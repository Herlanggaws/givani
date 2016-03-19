<div class="menu-right">
    <div class="user-panel-top">    
        <div class="profile_details_left">
            <ul class="nofitications-dropdown">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">3</span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="notification_header">
                                <h3>You have 3 new notification</h3>
                            </div>
                        </li>
                        <li><a href="#">
                            <div class="user_img"><img src="images/1.png" alt=""></div>
                            <div class="notification_desc">
                                <p>Lorem ipsum dolor sit amet</p>
                                <p><span>1 hour ago</span></p>
                            </div>
                            <div class="clearfix"></div>  
                        </a></li>
                        <li class="odd"><a href="#">
                            <div class="user_img"><img src="images/1.png" alt=""></div>
                            <div class="notification_desc">
                                <p>Lorem ipsum dolor sit amet </p>
                                <p><span>1 hour ago</span></p>
                            </div>
                            <div class="clearfix"></div> 
                        </a></li>
                        <li><a href="#">
                            <div class="user_img"><img src="images/1.png" alt=""></div>
                            <div class="notification_desc">
                                <p>Lorem ipsum dolor sit amet </p>
                                <p><span>1 hour ago</span></p>
                            </div>
                            <div class="clearfix"></div> 
                        </a></li>
                        <li>
                            <div class="notification_bottom">
                                <a href="#">See all notification</a>
                            </div> 
                        </li>
                    </ul>
                </li>   

                <div class="clearfix"></div>    
            </ul>
        </div>


        <div class="profile_details">       
            <ul>
                <li class="dropdown profile_details_drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <div class="profile_img">   
                            <span style="background:url(images/1.jpg) no-repeat center"> </span> 
                            <div class="user-name">
                                <p>I'm {{ Auth::user()->name }}<span>Administrator</span></p>
                            </div>
                            <i class="lnr lnr-chevron-down"></i>
                            <i class="lnr lnr-chevron-up"></i>
                            <div class="clearfix"></div>    
                        </div>  
                    </a>
                    <ul class="dropdown-menu drp-mnu">
                        <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
                        <li> <a href="#"><i class="fa fa-user"></i>Profile</a> </li> 
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
                <div class="clearfix"> </div>
            </ul>
        </div>

    </div>
</div>