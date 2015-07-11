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

<!--currently i just put the abstract as the motivation in the about page, i guess we can come up with a better about page in the future.-->
            Motivation

    </div>
	
		<div class="well text-left">

			<?php
$str = "Service networks are useful social mediums for individuals who are increasingly preoccupied with tasks.  Social platforms such as Craigslist and Uber aim to provide services to individuals on a business-to-consumer level by allowing businesses to advertise in real-time services they offer and in turn, the consumer can take advantage of the available opportunities.  With the aid of these services individuals or consumers increase efficiency of daily tasks completed through the available opportunities. \n
There are many individuals that encounter problems throughout their day due to the lack of time, poor time management skills, or just being the fact that they don’t have knowledge of the matter at hand.  Daily chores, such as buying groceries or accomplishing some household task, are now postponed until a later date.  If these tasks continuously get pushed back various undesired consequences can occur.  Individuals can possibly feel stressed and households can perhaps experience increased inefficiencies due to a certain task not being performed. \n
ServiceU is designed to connect these types of individuals through the means of a web application platform.  A ServiceU account will allow an individual, the consumer, who requires a certain job to be completed, such as buying groceries, to use the service, to contact another individual, the business, who is willing to complete the task. The consumer will post a job description that the business will seek to fulfill or vice versa.  The consumer will benefit because their task has been completed, and the business will benefit because they will be paid for their service.   
 ";
echo nl2br($str);
?>
		
		</div>



   
    
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
                  <!--<li><a href="help.php">Help</a></li>-->
				  <li><a href="contactus.php">Contact Us</a></li>
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
