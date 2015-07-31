   <div class="container">
     <nav role="navigation" class="navbar navbar-inverse">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">ServiceU</a>
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                
                <!--Home-->
                <li class="active"><a href="services.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                
                
               <form class="navbar-form navbar-left serviceSearch" role="search" style="margin-top: 2px;" method="post" action="searchresults.php">
                 
                        <input type="text" class="form-control" name="search" placeholder="What service are you looking for?" size=45 style="color: #787878; background-color: #EEEEEE;">
                        <button class="btn btn-default btn-sm searchButton" type="submit" name="Submit"><span class="glyphicon glyphicon-search"></button>
                
              </form>

                
                
                <?php $isadmin =  isAdmin($userEmail);
                if($isadmin == 1){ ?>
                <li><a href="payment.php"><span class="glyphicon glyphicon-briefcase"></span>Payment Management</a></li>
                <?php } ?>
                <!--<li><a href="#">Profile</a></li>-->


                <!--Dropdown and separator-->
                <!--<li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Messages <b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="#">Inbox</a></li>
                        <li><a href="#">Drafts</a></li>
                        <li><a href="#">Sent Items</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Trash</a></li>
                    </ul>
                </li>
            </ul>
            <form role="search" class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" placeholder="Search" class="form-control">
                </div>
            </form>-->
            </ul>
             
            <ul class="nav navbar-nav pull-right"> <!--user  nav bar-->
                 <li><a href="notifications.php"> <span style="font-size: 17px; margin-right: 5px;" class="glyphicon glyphicon-flash" data-toggle="tooltip" data-placement="bottom" title="Notification"></span><span class="badge">
                <?php
    
        
                   if(empty(getNroNewNotifications($userEmail)))
                      echo 0;
                    else
                      echo '<span style="color: #37FF00;">' . getNroNewNotifications($userEmail) . '</span>';
                ?>
                
                </span></a></li>
                
            <li><a href="inbox.php"> <span style="font-size: 17px; margin-right: 5px;" class="glyphicon glyphicon-envelope" data-toggle="tooltip" data-placement="bottom" title="Inbox"></span><span class="badge">
                <?php
    
        
                   if(empty(countMyNewMesssages($userEmail)))
                      echo 0;
                    else
                      echo '<span style="color: #37FF00;">' . countMyNewMesssages($userEmail) . '</span>';
                ?>
                
                </span></a></li>
                
            <li class="dropdown">
              
              
                <a href="#" data-toggle="dropdown" style="font-size: 13px;"><?php 
                    
                     if(!empty(displayMyImage($userEmail)))
                     echo '<img  class="img-circle" height="25" width="25" src="data:image/jpeg;base64,'.base64_encode(displayMyImage($userEmail)).'"alt="User-ImG">' . '&nbsp&nbsp';
                    
                    else
                     echo '<span class="glyphicon glyphicon-user" >&nbsp</span>' ;
                        
                        ?><b><?php echo getFullName($userEmail); ?></b>
                <span class="caret"</span></a>

                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">

                <li role="presentation"><a role="menuitem" tabindex="-1" href="profile.php"><span class="glyphicon glyphicon-cog"></span>&nbsp My Profile</a></li>         
                <li role="presentation"><a role="menuitem" tabindex="-1" href="mydashboard.php"><span class="glyphicon glyphicon-bookmark"></span>&nbsp My Dashboard</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="notifications.php"><span class="glyphicon glyphicon-bell"></span>&nbsp Notifications</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php"><span class="glyphicon glyphicon-remove"></span>&nbsp Log Out</a></li>
   
            </ul>

            </li>

            </ul>
        </div>
    </nav>

</div> <!--End of container-->


    <!--Start online JSS first-->
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <!--Bootstrap JSS-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <!--Customized JSS-->
    <script src="js/myjs.js"></script>
    <!--change acive mode in the navbar-->
    <script> 
        $(".nav a").on("click", function(){
           $(".nav").find(".active").removeClass("active");
           $(this).parent().addClass("active");
            
        });
    </script>
