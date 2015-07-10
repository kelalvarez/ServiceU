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

    if (isset($_POST['createJob'])) {
        
        $jobTitle = $_POST['jobTitle'];
        $jobDescription = $_POST['jobDescription'];
    $jobPayment = $_POST['jobPayment'];
    $jobCategory = $_POST['jobCategory'];

        createPost($userEmail, $jobTitle, $jobDescription, $jobPayment, $jobCategory);
        echo '<script type="text/javascript">';
        echo 'alert("Your post has been created")';
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
    <link href="css/dashboardcss.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">
     <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

</head>

    
<body>

<!-- Navigation Sidebar -->
    <?php include 'navigationbar.php' ?>

<div class="container">
       
     <div class="well text-center">


            ServiceU Help

    </div>
	
		
		<iframe src="https://docs.google.com/forms/d/1DkhjMx8zTPL__dtOTRx0_HEbS3T_9vxRA7TRAPowekc/viewform?embedded=true" width="760" height="500" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>



   
    
            <div class="row">

              <!--<div class="col-md-2">
                    <p>
                        <a class="btn btn-sm btn-warning btn-block" href="myjobpost.php" ><b>My Job Post</b></a>
                    </p>

                    <p>
                        <a class="btn btn-sm btn-warning btn-block" href="myapplications.php" ><b>My Applications</b></a>
                    </p>
                

              </div> -->
              <!--<div class="col-md-10">

                     <div class="well well-lg">

                                <header>

                                        <h2 class="wellHeader text-center"><b>My Job Post</b></h2>

                                </header>

                                <div class="rowAddjobpost">
                                        <span class="glyphicon glyphicon-wrench"> </span> 
                                        <h3>Creating Job on ServiceU is effortless.</h3>
                                        <p>Start now to provide service to your local community!</p>
                                        <?php include('newPost.php'); ?>
                                        <a class="btn btn-success" href="#newPost" data-toggle="modal" data-target="#newPost" role="button">Create Job Now!</a>
                                        
                                </div>
                            
                                   
                                
                            


                     </div>
              </div>-->



            </div>

 
</div> <!--End of container-->



<footer style="text-align: center;">

                <ul class="list-inline">
                  <li><a href="about.php">About</a></li>
                  <li><a href="help.php">Help</a></li>
                  <li><a href="#">Directory</a></li>
                  <li><h5 style="color: #aab8c2">&#169 2015 ServiceU, Inc, All rights reserved.</h5></li>
                </ul>
         
</footer>

</div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootbox.js"></script>
    <script src="js/bootbox.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>

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

</body>
</html>
