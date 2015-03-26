<!DOCTYPE html>
<?php

include("DatabaseFunctions.php"); ?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ServiceU</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

</head>

    
<body>

<!-- Navigation Sidebar -->
    <?php include 'navigationSidebar.php' ?>

<!-- About -->

    <!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
    <section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>My Profile</h2>
                    <hr class="small">
 
                        <div class="row">
                                    <div class="col-md-4 col-lg-offset-2"><p>Name:</p></div>
                                    <div class="col-md-4 col-lg-pull-2"> 
                                        <?php 
                                            echo getFullName(1);
                                        ?> 
                                    </div>
                        </div>
                    <br>     
                        <div class="row">
                                    <div class="col-md-4 col-lg-offset-2"><p>Email: </p></div>
                                    <div class="col-md-4 col-lg-pull-2">
                                        <?php 
                                            echo getEmail(1);
                                        ?> 
                                    </div>
                        </div>
                    <br>
                        <div class="row">
                                    <div class="col-md-4 col-lg-offset-2"><p>Verify</p></div>
                                    <div class="col-md-4 col-lg-pull-2">
                                        <?php
                                            if(checkVerification(1) == 1)
                                                echo '<span class="glyphicon glyphicon-ok"></span>';
                                            else
                                                echo '<span class="glyphicon glyphicon-remove"></span>';
                                        ?>
                                    </div>
                        </div>
                    <br>
                        <div class="row">
                                    <div class="col-md-4 col-lg-offset-2"><p>Password:</p></div>
                                    <div class="col-md-2 col-lg-pull-1"> xxxxxxxxxxx </div>
                                    <div class="col-md-3 col-lg-pull-1"><a href="#" class="btn btn-light btn-xs">Edit</a></div>
                        </div>
                    <br>
                        <div class="row">
                                    <div class="col-md-4 col-lg-offset-2"><p>Degree: </p></div>
                                    <div class="col-md-2 col-lg-pull-1"> 
                                        <?php 
                                            echo getDegree(1);
                                        ?>  
                                    </div>
                                    <div class="col-md-3 col-lg-pull-1">
                                        <a href="#editDegree" data-toggle="modal" data-target="#editDegree" class="btn btn-light btn-xs">Edit</a>
                                        <?php include 'editDegreeModal.php' ?>
                                        

                                    </div>
                        </div>
                    <br>
                        <div class="row">
                                    <div class="col-md-4 col-lg-offset-2"><p>Interests:</p></div>
                                    <div class="col-md-2 col-lg-pull-1"> 
                                        <?php 
                                            echo getInterests(2);
                                        ?> 
                                    </div>
                                    <div class="col-md-3 col-lg-pull-1">
                                        <a href="#editInterest" data-toggle="modal" data-target="#editInterest" class="btn btn-light btn-xs">Edit</a>
                                        <?php include 'editInterestModal.php' ?>
                                    </div>
                        </div>                    
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>ServiceU</strong>
                    </h4>
                    <p>3481 Melrose Place<br>Beverly Hills, CA 90210</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:name@example.com">name@example.com</a>
                        </li>
                    </ul>
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; ServiceU 2015</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootbox.js"></script>
    <script src="js/bootbox.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

   $('[data-dismiss=modal]').on('click', function (e) {
        var $t = $(this),
            target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];

      $(target)
        .find("input,textarea")
           .val('')
           .end();
   
      $('select option:first-child').attr("selected", "selected");
    
    });
    </script>
    
    <!-- Custom for project -->
    <script src="js/editProfileactions.js"></script>
    
     

</body>
</html>
