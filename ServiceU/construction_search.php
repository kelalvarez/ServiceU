<!DOCTYPE html>
<html lang="en">
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

?>


<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ServiceU</title>

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/stylish-portfolio.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!--Customized CSS-->
  <link rel="stylesheet" href="css/mycss.css">

</head>


<body>

  <!-- Navigation Sidebar -->
  <?php include 'navigationbar.php' ?>
  <?php //include 'postInfo.php' ?>
  <!-- About -->


  <!--<div class="container">


    <div class="well text-center">


      <div class="row">
        <div class="col-md-4">

          <input type="text" class="form-control" id="serviceTop" placeholder="Job title">


        </div>
        <div class="col-md-4">

          <input type="text" class="form-control" id="serviceTop" placeholder="Skills">

        </div>
        <div class="col-md-4">

          <input type="text" class="form-control" id="serviceTop" placeholder="City, State">

        </div>

      </div>

    </div>-->
	<div class="container">


    <div class="well text-center">


      <div class="row">
        <!-- <div class="col-md-4"> -->

          <!-- <input type="text" class="form-control" id="serviceTop" placeholder="Job title"> -->
<!-- <h3>Search for Job</h3> -->
<!-- <form method="post" action="searchresults.php" id="searchform">
	<input type="text" name="job">
	<input type="submit" name="submit" value="Search">
	</form> -->

	<!-- <h3>New Search</h3> -->
<span class="h1">ServiceU</span>
  <form class="row" name ="form1" method="post" action="searchresults.php">
    <div class="col-lg-11">
      <input class="form-control" name="search" required pattern="[a-zA-Z0-9\s]+" type="search" placeholder="What service are you looking for?" size="50"/>
    </div>
    <div class="col-lg-1">
      <input type="submit" class="btn btn-primary" name="Submit" value="Search"/>
    </div>

	</form>


    <!--<div class="well well-lg">
      <div class="row text-center">
        <!-- <div class="col-lg-10 col-lg-offset-1"> -->
		
        <!--<span class="h1">ServiceU</span>
        <br />
        <br />

        <div class="row">
          <!--<div class="col-lg-8">
            <!-- Featured Tasks -->
            <!--<div class="row">

              <div class="text-center">
                <a href="mydashboard.php" class="btn btn-primary btn-lg" style="width: 100%">
                 <span class="h2">Start servicing now</span>
                </a>
               <!-- <div class="row">
                  <div class="col-lg-3">
                    <h3>Popular tasks:</h3>
                  </div>
                </div>-->
             <!-- </div>-->
				-
			  
			  
			  <!--<div class="jumbotron">
        <h1 class="text-center">Connecting Lawyers and Clients Globally</h1>
        <div class="row">
        	<a href="mydashboard.php" class="btn btn-primary btn-lg" style="width: 100%">
                  <span class="h2">Start servicing now</span>
            </a>
          <!--<div class="col-lg-2 col-lg-offset-4 col-md-offset-4 col-md-2 col-sm-offset-3 col-sm-3 col-xs-offset-3 col-xs-3">
          <!-- <p><a class="btn btn-success btn-lg" href="#" role="button">FREE TRIAL</a> </p> -->
          <!--</div>
         <!-- <div class="col-lg-2 col-md-6 col-sm-6">-->
            <!--<p><a class="btn btn-primary btn-lg" href="#" role="button">BUY NOW</a> </p> -->
            
         <!-- </div>-->
        <!--</div> -->
		
		<div class="col-lg-12">
      <div class="jumbotron">
        <h1 class="text-center">ServiceU is Providing Excellent Facility and Significance Workmanship</h1>
        <div class="row">
        	<a href="mydashboard.php" class="btn btn-primary btn-lg" style="width: 100%">
                  <span class="h2">Start servicing now</span>
            </a>
          <!--<div class="col-lg-2 col-lg-offset-4 col-md-offset-4 col-md-2 col-sm-offset-3 col-sm-3 col-xs-offset-3 col-xs-3">
          <!-- <p><a class="btn btn-success btn-lg" href="#" role="button">FREE TRIAL</a> </p> -->
          </div>
         <!-- <div class="col-lg-2 col-md-6 col-sm-6">-->
            <!--<p><a class="btn btn-primary btn-lg" href="#" role="button">BUY NOW</a> </p> -->
            
         <!-- </div>-->
        </div>
      <p class="text-center"> Online cloud based software stage with accessible and instant construction services.<br>
      </p>
      <center> <img src="img/main_image_construction.jpg" alt="" class="img-responsive"></center></div>
	  
	  
	  <div class="container">
  <div class="row">
    <div class="text-center col-sm-6">
      <h3>Become Employers</h3>
      <p>ServiceU is the best place to find experience constructors. </p>
      <a class="btn btn-danger btn-lg" href="mydashboard.php" role="button">Dashboard</a></div>
    <div class="text-center col-sm-6">
      <h3>Become Employee</h3>
      <p>ServiceU is the best place to find good clients and get experience.<br>
      </p>
      <a class="btn btn-info btn-lg" href="mydashboard.php" role="button">Dashboard</a></div>
  </div>
</div>



<div class="container">
  <div class="row">
  <h2><p class="text-center">  
  How to choose an employee ?
  <br>
      </p></h2>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <h2>Step 1:</h2><h3> Become an employer</h3>
      <p>Sign up and make a profile with ServiceU. Create job that stores in your job post. </p>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <h2>Step 2:</h2><h3> Pick a job</h3>
      <p>Choose a correct job that you need a help with.</p>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <h2>Step 3:</h2><h3> Explain duty</h3>
      <p>Describe job that you need to get it done with providing how much willing to pay.</p>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
     <h2>Step 3:</h2>
     <h3> Pick an employee</h3>
     <p>Choose an employee from various employees according to price range.</p>
    </div>
  </div>
</div>



<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <div class="thumbnail"> <img src="img/construction1.jpg" alt="Thumbnail Image 1" class="img-responsive">
        <div class="caption">
          <h3>Creating Homes and Buildings</h3>
          <p>ServiceU provides experienced and best construction workers.</p>
          <hr>
        <p><a href="searchresult_construction.php" class="btn btn-primary" role="button">Search for construction workers</a></p>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="thumbnail"> <img src="img/construction2.jpg" alt="Thumbnail Image 1" class="img-responsive">
        <div class="caption">
          <h3>Choose the Right Construction Workers</h3>
          <p>ServiceU is the perfect platform to find &nbsp;excellent and best construction workers.</p>
          <hr>
          <p><a href="searchresult_construction.php" class="btn btn-primary" role="button">Search for construction workers</a></p>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <h2><p class="text-center">  
  Get Yourself Hired!
  <br>
      </p></h2>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <h2>Step 1:</h2><h3> <h3><span> Become an employee</h3>
      <p>Sign up and make a profile &nbsp;providing education and interest of work with ServiceU.</p>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <h2>Step 2:</h2><h3> Apply for a job</h3>
      <p>Always update experience and skills in your profile. Apply jobs according to your interests.</p>
    </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <h2>Step 3:</h2><h3> Contact Employer</h3>
    <p>Contact employer and describe your skills so you can stand out in your application </p>
  </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <h2>Step 4:</h2><h3> Finished your job.</h3>
      <p>Complete your job in given time and make your employer happy and get paid. Also get good reviews for next job.</p>
    </div>
</div>
		
              <!-- 1st task box
              <div class="col-lg-4">
                <div class="thumbnail">
                  <img src="font-awesome/css/overheat-woman.png">
                  <div class="caption">-->
                    <!-- Title -->
                   <!-- <h3>Auto Repair</h3>

                    <!-- Description -->
                   <!-- <p>24 hour service</p>
                  </div>
                </div>
              </div>
              <!-- End task -->

            <!-- 2nd task box -->
            <!--<div class="col-lg-4">
              <div class="thumbnail">
                <img src="font-awesome/css/doctor.jpg">
                <div class="caption">
                  <!-- Title -->
                  <!--<h3>Doctors</h3>

                  <!-- Description -->
                 <!-- <p>Taking care of patients</p>
                </div>
              </div>
            </div>
            <!-- End task -->

          <!-- 3rd task box -->
          <!--<div class="col-lg-4">
            <div class="thumbnail">
              <img src="font-awesome/css/lawyer-500x300.jpg">
              <div class="caption">
                <!-- Title -->
              <!--  <h3>Lawyers</h3>

                <!-- Description -->
               <!-- <p>Get legal help</p>
              </div>
            </div>
          </div>
          <!-- End task -->

        <!-- 4th task box -->
        <!--<div class="col-lg-4">
          <div class="thumbnail">
            <img src="font-awesome/css/images_engineer.jpg">
            <div class="caption">
              <!-- Title -->
             <!-- <h3>Engineers</h3>

              <!-- Description -->
            <!--  <p>Creating new inventions</p>
            </div>
          </div>
        </div>
        <!-- End task -->

      <!-- 5th task box -->
     <!-- <div class="col-lg-4">
        <div class="thumbnail">
          <img src="font-awesome/css/images_construction.jpg">
          <div class="caption">
            <!-- Title -->
          <!--  <h3>Construction</h3>

            <!-- Description -->
         <!--   <p>Building a new future</p>
          </div>
        </div>
      </div>
      <!-- End task -->

    <!-- 6th task box -->
    <!--<div class="col-lg-4">
      <div class="thumbnail">
        <img src="font-awesome/css/images_events.jpg">
        <div class="caption">
          <!-- Title -->
         <!-- <h3>Events</h3>

          <!-- Description -->
        <!--  <p>Hosting your event</p>
        </div>
      </div>
    </div>
    <!-- End task -->

            </div>
			<footer style="text-align: center;">

      <ul class="list-inline">
      <li><a href="about.php">About</a></li>
      <!--<a href='about.php'>About Us</a>-->
       <li><a href="help.php">Help</a></li>
      <li><a href="#">Directory</a></li>
      <li><h5 style="color: #aab8c2">&#169 2015 ServiceU, Inc, All rights reserved.</h5></li>
      </ul>

      </footer>
          </div>
          <div class="col-lg-4">
            <div class="left-side">
              <!--<div id="result">

                <iframe src="servicesPosts.php" style="width: 100%; height: 1000px; border: none;">/iframe>
                </div>-->

              </div>

            </div>

          </div>
          <!-- </div> -->
          <!-- /.col-lg-10 -->
        </div>
        <!-- /.row -->
		
      </div>

      

    </div>





    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootbox.js"></script>
    <script src="js/bootbox.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


    <!-- Custom for project -->
    <script src="js/editProfileactions.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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

  </script>


</body>
</html>
