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
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

</head>

    
<body>

<!-- Navigation Sidebar -->
    <?php include 'navigationbar.php' ?>

<div class="container">
       
<div class="well well-lg">
<div class="row text-center">
    <div class="col-lg-10 col-lg-offset-1">
        <h2>My Dashboard</h2>
                <?php include('newPost.php'); ?>
                <a href="#newPost" data-toggle="modal" data-target="#newPost" class="btn btn-info btn-sm">
                    <span class="glyphicon glyphicon-plus"></span> New Post 
                  </a>
            <hr class="small">
            
            <div class="row">
             <div class="post-left-square">
                    <div class="post-left-side">
                        <span style="color: #fff; font-weight: bold; font-size: 20px;"> My Posts</h3>
                        <div id="result">
                            
                            <iframe src="createdPosts.php"></iframe>
                        </div>
                                          
                    </div>
                        
                        </div>          
            <div class="right-square">
                <span style="color: #23527c; font-weight: bold; font-size: 20px;"> My Applications</h3>
                
                    <div class="right-side">
                        <div id="result">
                            
                            <iframe src="appliedJobs.php"></iframe>
                        </div>
                                          
                    </div>
                        
            </div>
                            
            </div>
            
            
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>



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
