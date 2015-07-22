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


  <div class="container">


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

    </div>


    <div class="well well-lg">
      <div class="row text-center">
        <!-- <div class="col-lg-10 col-lg-offset-1"> -->
        <span class="h1">ServiceU</span>
        <br />
        <br />

        <div class="row">
          <div class="col-lg-8">
            <!-- Featured Tasks -->
            <div class="row">

              <div class="col-lg-12">
                <a href="#" class="btn btn-primary btn-lg" style="width: 100%">
                  <span class="h2">Start servicing now</span>
                </a>
                <div class="row">
                  <div class="col-lg-3">
                    <h3>Popular tasks:</h3>
                  </div>
                </div>
              </div>

              <!-- 1st task box -->
              <div class="col-lg-4">
                <div class="thumbnail">
                  <img src="font-awesome/css/overheat-woman.png">
                  <div class="caption">
                    <!-- Title -->
                    <h3>Auto Repair</h3>

                    <!-- Description -->
                    <p>24 hour service</p>
                  </div>
                </div>
              </div>
              <!-- End task -->

            <!-- 2nd task box -->
            <div class="col-lg-4">
              <div class="thumbnail">
                <img src="font-awesome/css/doctor.jpg">
                <div class="caption">
                  <!-- Title -->
                  <h3>Doctors</h3>

                  <!-- Description -->
                  <p>Taking care of patients</p>
                </div>
              </div>
            </div>
            <!-- End task -->

          <!-- 3rd task box -->
          <div class="col-lg-4">
            <div class="thumbnail">
              <img src="font-awesome/css/lawyer-500x300.jpg">
              <div class="caption">
                <!-- Title -->
                <h3>Lawyers</h3>

                <!-- Description -->
                <p>Get legal help</p>
              </div>
            </div>
          </div>
          <!-- End task -->

        <!-- 4th task box -->
        <div class="col-lg-4">
          <div class="thumbnail">
            <img src="font-awesome/css/images_engineer.jpg">
            <div class="caption">
              <!-- Title -->
              <h3>Engineers</h3>

              <!-- Description -->
              <p>Creating new inventions</p>
            </div>
          </div>
        </div>
        <!-- End task -->

      <!-- 5th task box -->
      <div class="col-lg-4">
        <div class="thumbnail">
          <img src="font-awesome/css/images_construction.jpg">
          <div class="caption">
            <!-- Title -->
            <h3>Construction</h3>

            <!-- Description -->
            <p>Building a new future</p>
          </div>
        </div>
      </div>
      <!-- End task -->

    <!-- 6th task box -->
    <div class="col-lg-4">
      <div class="thumbnail">
        <img src="font-awesome/css/images_events.jpg">
        <div class="caption">
          <!-- Title -->
          <h3>Events</h3>

          <!-- Description -->
          <p>Hosting your event</p>
        </div>
      </div>
    </div>
    <!-- End task -->

            </div>
          </div>
          <div class="col-lg-4">
            <div class="left-side">
              <div id="result">

                <iframe src="servicesPosts.php" style="width: 100%; height: 1000px; border: none;">/iframe>
                </div>

              </div>

            </div>

          </div>
          <!-- </div> -->
          <!-- /.col-lg-10 -->
        </div>
        <!-- /.row -->
      </div>

      <!--	<footer style="text-align: center;">

      <ul class="list-inline">
      <li><a href="about.php">About</a></li>
      <!--<a href='about.php'>About Us</a>-->
      <!--  <li><a href="help.php">Help</a></li>
      <li><a href="#">Directory</a></li>
      <li><h5 style="color: #aab8c2">&#169 2015 ServiceU, Inc, All rights reserved.</h5></li>
      </ul>

      </footer> -->

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
