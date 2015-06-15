<!DOCTYPE html> 
<?php //session starts here 
    session_start(); 
    include('DatabaseFunctions.php');//make connection here 
    include("functions.php");
?>



<html lang="en"> <!--Start HTML-->

    <head> <!--Start Head-->

        <meta charset="UTF-8">
        <title>ServiceU Website</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, uer-scalable=no">

        <!--Bootstrap CSS-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

        <!--Customized CSS-->
        <link rel="stylesheet" href="css/mycss.css">

    </head> <!--End Head-->



    <!--BODY to have a dark background <body style="background-color: #101010"-->

 <body> <!--Start Body-->

   <div class="container">
     <nav role="navigation" class="navbar navbar-inverse" id="HomeNav">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="Home.php" class="navbar-brand">ServiceU</a>
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                
                <!--Home-->
                <li class="active"><a href="Home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <!--<li><a href="#">About</a></li>-->
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
            </ul>-->
            <form role="search" class="navbar-form navbar-left">
                <div class="form-group">
                    <div class="input-group">

                        
                        <input type="text" placeholder="Find Services" class="form-control">
                        <div class="input-group-addon" id="btnSearchHome"><button type="button" class="btn btn-default" id="btnSearchHome">
                        <span class="glyphicon glyphicon-search"></span></div>
                   
                    </div>
                </div>
            </form>

            </ul>


            <ul class="nav navbar-nav pull-right"> <!--user  nav bar-->

                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown"> <span class="glyphicon glyphicon-user"> </span> My Account
                                          <span class="caret"</span></a>

                                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">

                                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><b>My Inbox</b></a></li>
                                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><b>My Dashboard</b></a></li>
                                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><b>Another</b></a></li>
                                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><b>Something</b></a></li>
                                              <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php"><b>Log Out</b></a></li>
                                            </ul>

                                    </li>

            </ul>
        </div>
    </nav>

</div> <!--End of container-->

<div class="container">
    <div class="well">

    INSERT DATA HERE

ds




    </div>

</div>


<footer style="text-align: center;">

                <ul class="list-inline">
                  <li><a href="#">About</a></li>
                  <li><a href="#">Help</a></li>
                  <li><a href="#">Directory</a></li>
                  <li><h5 style="color: #aab8c2">&#169 2015 ServiceU, Inc, All rights reserved.</h5></li>
                </ul>
         
</footer>








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



    </body> <!--End Body-->

</html> <!--End HTML-->


<!--
<div class ="headerBox">
            
            <h3>Register on ServiceU</h3> 
            <div class="closeBox">Close</div>
        
        </div> -->