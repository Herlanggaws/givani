<div class="menu-right">
    <div class="user-panel-top">    
       


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
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
                <div class="clearfix"> </div>
            </ul>
        </div>

    </div>
</div>