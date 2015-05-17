<!DOCTYPE html>
<?php
    include("DatabaseFunctions.php"); 
    include("functions.php");
?>


<?php 
    session_start();
    if (!isset($_SESSION["loginEmail"]))
    {
        header("location: index.php");
        exit();
    }
    else{
       $userEmail = $_SESSION["loginEmail"];
    }   

    if(isset($_GET['jobID']))
    {
        $jobID = $_GET['jobID'];
    }
    
    if (isset($_POST['confirmApp'])) {
        if(existApp($userEmail, $jobID) == 0){
            submitApp($userEmail, $jobID);
            echo '<script type="text/javascript">';
            echo 'alert("Congratulations, you have applied!")';
            echo '</script>';
        }
        else{
            echo '<script type="text/javascript">';
            echo 'alert("You already have submitted an application")';
            echo '</script>';
        } 
            
    }
    else if(isset($_POST['denyApp'])){
        //do something if cancel app
    }

    if (isset($_POST['updateJob'])) {
        
        $jobTitle = $_POST['jobTitle'];
        $jobDescription = $_POST['jobDescription'];
	$jobPayment = $_POST['jobPayment'];
	$jobCategory = $_POST['jobCategory'];

        updatePost($jobID, $jobTitle, $jobDescription, $jobPayment, $jobCategory);
        echo '<script type="text/javascript">';
        echo 'alert("Update Done")';
        echo '</script>';

    }
    
?>


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

<section id="services" class="services bg-info">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>Job Information</h2>
                    <hr class="small">  
                        <div class="row">
                            <div class="col-md-4 col-lg-push-4">
                                <h5><span style="font-weight: bold">
                                    <?php 
                                        echo $title = getJobTitle($jobID);
                                    ?>
                                </span>
                                <span class="badge">
                                    <?php
                                        echo $numApp = numApplications($jobID);
                                    ?>
                                </span>
                                </h3>
                                        
                                <span style="font-size: 11px">
                                    <?php
                                        echo "By: ";
                                        echo $owner = getJobOwner($jobID);
                                    ?>
                                </span>
                            </div>
                        </div>
                    <br>
                        <div class="row">
                            <div class="col-md-4 col-lg-push-4">
                                <?php
                                    echo $description = getJobDescription($jobID);
                                ?>
                            </div>
                        </div>
                    <br>
                        <div class="row">
                            <div class="col-md-4 col-lg-push-7">
                                <span style=" font-size: 15px;">    
                                    <span style="font-weight: bold">
                                        <?php
                                            echo "Payment: ";
                                        ?>
                                    </span>
                                    <?php
                                        echo "$";
                                        echo $payment = getJobPayment($jobID);
                                    ?>
                                </span>        
                            </div>
                        </div>
                        <div class="row">
                                    <div class="col-md-4 col-lg-push-7">
                                    <span style="font-size: 11px; font-style: italic ;">    
                                        <span style="font-weight: bold">
                                        <?php
                                            echo "Category: ";
                                        ?>
                                        </span>
                                        <?php    
                                            echo $category = getJobCategory($jobID);                                            
                                        ?>
                                    </span>
                                    </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-4 col-lg-push-4">
                                <br>
                                <?php include ('confirmApplication.php'); ?>
                                <?php include('editPost.php'); ?>
                                
                                <?php 
                                    if (isOwner($userEmail, $jobID) == 0){
                                ?>
                                <a href="#confirmApplication" data-toggle="modal" data-target="#confirmApplication" class="btn btn-info">
                                    <i class="icon-hand-right"></i>Apply
                                </a>
                                <?php 
                                    }
                                    else {
                                ?>
                                <a href="#editPost" data-toggle="modal" data-target="#editPost" class="btn btn-info">
                                    <i class="icon-hand-right"></i>Edit
                                </a>
                                <?php
                                    }
                                ?>
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
