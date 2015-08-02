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
   <?php
    if (isset($_POST['submitDegree'])) {
        $D1P1 = $_POST['degree1Part1'];
        $D1P2 = $_POST['degree1Part2'];

        $degree1 = $D1P1 . " " . $D1P2;


        editDegree1($userEmail, $degree1);
    }

    if (isset($_POST['submitInterest'])) {
        $newInterest = $_POST['interest1'];

        insertInterest($userEmail, $newInterest);
    }

    if (isset($_POST['changePassword'])) {
	$oldPassword = $_POST['oldpassword'];
	$newPassword = $_POST['newpassword'];
	$confirmedPassword = $_POST['passverify'];
	if (verifyPassword($userEmail, $oldPassword)) {
            if ($newPassword == $confirmedPassword) {
		editPassword($userEmail, $newPassword);
		echo '<script type="text/javascript">';
		echo 'alert("Password Updated")';
		echo '</script>';
            } else {
		echo '<script type="text/javascript">';
		echo 'alert("Passwords do not match, please try again")';
		echo '</script>';
			}
            } else {
		echo '<script type="text/javascript">';
		echo 'alert("Old Password is invalid")';
		echo '</script>';
            }

    }

    if (isset($_POST['verifyCode'])) {
        $code = $_POST['verificationCode'];

        if (verifyCode($userEmail, $code)) {
            verifyAccount($userEmail);
            echo '<script type="text/javascript">';
            echo 'alert("Account has been verify")';
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Invalid Verification Code")';
            echo '</script>';
	}
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
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!--Customized CSS-->
    <link rel="stylesheet" href="css/mycss.css">


</head>


<body>


    <?php

                if(isset($_GET['userID'])){
                            $userToBeVIew = $_GET['userID'];

                            $user = getEmailByID($userToBeVIew);
                                //////
                            $result = getAllUserOldExperience($user);

                            $result2 = getAllUserCurrentJob($user);

                            $resultEdu = getAllUserEducation($user);

                            $userInterest = getInterests($user);

                            $userSkill = getSkills($user);
                }

            if (!$resultEdu) {
            echo "The fucntion getAllUserEducation is not working properly";
            }

            if (!$result) {
            echo "The fucntion getUserNoCurrentExperience is not working properly";
            }

            if (!$result2) {
            echo "The fucntion getUserCurrentExperience is not working properly";
            }


    ?>

<!-- Navigation Sidebar -->
    <?php include 'navigationbar.php' ?>

<!-- About -->

    <!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
<div class="container">


     <div class="well well-lg">

        <div class="row">




             <?php include 'confirmCode.php' ?>

            <div class="col-md-12">

                <div class="panel panel-info">
                    <!--<div class="panel-heading" style="text-align: center"><h3><span class="glyphicon glyphicon-user"></span> My Profile</h3></div>-->

                        <div class="panel-body">



                                    <div class="row">



                                        <div class="col-md-2">


                                            <div style="padding-left: 5%;">

                                                      <?php
                                                        if(empty(displayMyImage($user)))
                                                             echo '<img id="userImageStyle" alt="msgProfilePic" class="img-circle" src="img/user-icon.jpg">';
                                                        else
                                                              echo '<img id="userImageStyle" alt="msgProfilePic" class="img-circle" src="data:image/jpeg;base64,'.base64_encode(displayMyImage($user)).'"alt="msgProfilePic">';
                                                        ?>

                                            </div>




                                        </div>




                                         <!--style="background-color: gray; padding, margin <a id="myProfileEdit" class="btn btn-default  btn-xs" href="#" role="button">Edit</a>-->

                                        <div class="col-md-8">

                                                        <div class="panel panel-info">
                                                              <div>
                                                                <h3 id="myprofileName"><b><?php echo getFullName($user);?></b></h3>
                                                              </div>

                                                              <div>
                                                                    <?php
                                                                       //Output User Current Experience First
                                                                    if(mysqli_num_rows($result2) != 0)
                                                                        {
                                                                            while ($row = mysqli_fetch_assoc($result2))
                                                                                {
                                                                                          echo '<div style="font-size:14px; margin-left: 15px;">';

                                                                                              echo '<div>' . $row['jobTitle'] . ' at ' . $row['userEmployer'] . '</div>';
                                                                                              echo '<div style="margin-bottom: 10px; margin-top:-5px;">' . $row['startDateMonth'] . ' - ' . $row['startDateYear']  . ' - ' . '<b>' . $row['stillWorkHere'] . '</b>' . ' - ' . $row['location'] .  '</div>';


                                                                                          echo '</div>';
                                                                                }

                                                                        }

                                                                    ?>

                                                              </div>
                                                        </div>




                              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true"> <!--Start of Accodion-->

                                              <div class="panel panel-info">
                                                    <div class="panel-heading" role="tab" id="headingOne">
                                                              <h4 class="panel-title">
                                                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-                                                                                          expanded="true" aria-controls="collapseOne">
                                                                  <b>Education</b>
                                                                   <?php
                                                                    if($userEmail == $user)
                                                                        echo '<a style="float: right"  id="myProfileEdit" class="btn btn-default  btn-xs" href="degree.php" role="button">Edit</a>';          ?>
                                                                </a>

                                                              </h4>
                                                    </div>
                                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">


                                                              <div class="panel-body">


                                                            <?php

                                                                if(mysqli_num_rows($resultEdu) == 0)
                                                                    {
                                                                            echo '<div style="text-align:center;">';
                                                                            echo '<b><p class="bg-danger"> You have not added your education </p></b>';
                                                                            echo '</div>';
                                                                    }else{



                                                                     while ($row = mysqli_fetch_assoc($resultEdu))
                                                                                {
                                                                                          echo '<div style="font-size:16px">';

                                                                                          echo '<div>' . '<b>' . $row['eduSchoolName'] . '</b>' . '</div>';
                                                                                          echo '<div>' . $row['eduDegreeLevel'] . '</div>';
                                                                                          echo '<div>' . $row['eduDegreeName'] . '</div>';
                                                                                          echo '<div>' . $row['eduStartYear'] . ' - '  .  $row['eduEndYear'] . '</div>';

                                                                                          echo '<div id="myprofileDividerLine"> </div>';

                                                                                          echo '</div>';
                                                                                }

                                                                        }




                                                                  ?>



                                                              </div>


                                                    </div>
                                              </div>




                                              <div class="panel panel-info">
                                                <div class="panel-heading" role="tab" id="headingTwo">
                                                  <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                      <b>Experience</b>
                                                         <?php
                                                                    if($userEmail == $user)
                                                      echo '<a style="float: right"  id="myProfileEdit" class="btn btn-default  btn-xs" href="experience.php" role="button">Edit</a>';
                                                                        ?>
                                                    </a>
                                                  </h4>
                                                </div>
                                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                  <div class="panel-body">



                                                       <?php

                                                                if(mysqli_num_rows($result2) == 0 && mysqli_num_rows($result) == 0)
                                                                    {
                                                                            echo '<div style="text-align:center;">';
                                                                            echo '<b><p class="bg-danger"> You have not added work experience </p></b>';
                                                                            echo '</div>';
                                                                    }else{

                                                                    //Output User Current Experience First
                                                                    if(mysqli_num_rows($result2) != 0)
                                                                        {

                                                                            while ($row = mysqli_fetch_assoc($result2))
                                                                                {


                                                                                          echo '<div style="font-size:16px">';

                                                                                          echo '<div>' . '<b>' . $row['jobTitle'] . '</b>' . '</div>';
                                                                                          echo '<div>' . $row['userEmployer'] . '</div>';
                                                                                          echo '<div>' . $row['startDateMonth'] . ' ' . $row['startDateYear'] . ' - ' . '<b>' . $row['stillWorkHere'] . '</b>' . ' - ' . $row['location'] .  '</div>';

                                                                                          echo '<div id="myprofileDividerLine"></div>';
                                                                                          echo '</div>';
                                                                                }

                                                                        }



                                                                    //Output Old User Experience
                                                                    if(mysqli_num_rows($result) != 0){

                                                                            while ($row = mysqli_fetch_assoc($result))
                                                                                        {
                                                                                                 echo '<div style="font-size:16px">';

                                                                                                 echo '<div>' . '<b>' . $row['jobTitle'] . '</b>' . '</div>';
                                                                                                 echo '<div>' . $row['userEmployer'] . '</div>';
                                                                                                 echo '<div>' . $row['startDateMonth'] . ' ' . $row['startDateYear'] . ' - ' . $row['endDateMonth'] . ' ' .  $row['endDateYear'] . ' - ' . $row['location'] . '</div>';


                                                                                                 echo '<div id="myprofileDividerLine""></div>';
                                                                                                  echo '</div>';
                                                                                        }
                                                                            }

                                                                          }



                                                             mysqli_close($con);

                                                        ?>

                                                  </div>
                                                </div>
                                              </div>



                                              <div class="panel panel-info">
                                                <div class="panel-heading" role="tab" id="headingThree">
                                                  <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                      <b>Skills</b>
                                                         <?php
                                                                    if($userEmail == $user)
                                                     echo '<a style="float: right"  id="myProfileEdit" class="btn btn-default  btn-xs" href="skills.php" role="button">Edit</a>';
                                                    ?>
                                                    </a>
                                                  </h4>
                                                </div>
                                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                  <div class="panel-body">

                                                      <?php

                                                        if($userSkill == "na")
                                                        {

                                                             echo '<div style="text-align:center;">';
                                                             echo '<b><p class="bg-danger"> You have not added your skills </p></b>';
                                                             echo '</div>';

                                                        }else{

                                                              $string = str_replace(',', '', $userSkill);
                                                              $myArraySkill = explode(" ", $string);

                                                                 echo '<ul style="line-height: 1.5em; padding-left: 15px; margin-bottom: 0px;">';
                                                            foreach ($myArraySkill as $value){

                                                                        if($value == '')
                                                                                continue;

                                                                        echo '<li>' . "$value" . '</li>';

                                                               }


                                                                 echo '</ul>';
                                                        }  ?>


                                                  </div>
                                                </div>
                                              </div>


                                               <div class="panel panel-info">
                                                <div class="panel-heading" role="tab" id="headingFour">
                                                  <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                                      <b>Interest</b>
                                                         <?php
                                                                    if($userEmail == $user)
                                                      echo '<a style="float: right"  id="myProfileEdit" class="btn btn-default  btn-xs" href="interest.php" role="button">Edit</a>';   ?>
                                                    </a>
                                                  </h4>
                                                </div>
                                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                                  <div class="panel-body">

                                                     <?php

                                                        if($userInterest == "na")
                                                        {

                                                             echo '<div style="text-align:center;">';
                                                             echo '<b><p class="bg-danger"> You have not added your interests </p></b>';
                                                             echo '</div>';

                                                        }else{

                                                              $string = str_replace(',', '', $userInterest);
                                                              $myArrayInterest = explode(" ", $string);

                                                                 echo '<ul style="line-height: 1.5em; padding-left: 15px; margin-bottom: 0px;">';
                                                            foreach ($myArrayInterest as $value){

                                                                        if($value == '')
                                                                                continue;

                                                                        echo '<li>' . "$value" . '</li>';

                                                               }


                                                                 echo '</ul>';
                                                        }  ?>


                                                  </div>
                                                </div>
                                              </div>


                                              <div class="panel panel-info">
                                                <div class="panel-heading" role="tab" id="headingFive">
                                                  <h4 class="panel-title">

                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                                                      <b>Reviews</b>
                                                       <?php
                                                                    if($userEmail == $user)
                                                      echo '<a style="float: right"  id="myProfileEdit" class="btn btn-default  btn-xs" href="#" role="button">Edit</a>';
                                                ?>
                                                    </a>
                                                  </h4>
                                                </div>
                                                <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                                  <div class="panel-body">
                                                    Test
                                                  </div>
                                                </div>
                                              </div>

                         </div> <!--end of Accodion-->



                                        </div>



                                        <!-- <div style="background-color: gray;" class="col-md-2">.col-md-8</div> -->




                                    </div>



                         </div>
                </div>




                </div>

            </div>

     </div>
</div>
        <!-- /.container -->

    <footer style="text-align: center;">

                <ul class="list-inline">
                  <li><a href="about.php">About</a></li>
                  <li><a href="help.php">Help</a></li>
                  <li><a href="#">Directory</a></li>
                  <li><h5 style="color: #aab8c2">&#169 2015 ServiceU, Inc, All rights reserved.</h5></li>
                </ul>

    </footer>





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

    <script type="text/javascript">
    <?php
        if(!checkVerification($userEmail))
        {
    ?>
            $('#confirmCode').modal('show');
    <?php
        }
    ?>
    </script>


      <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootbox.js"></script>
    <script src="js/bootbox.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!--Start online JSS first-->
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <!--Bootstrap JSS-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <!--Customized JSS-->
    <script src="js/myjs.js"></script>
    <!--change active mode in the navbar-->
    <script>
        $(".nav a").on("click", function(){
           $(".nav").find(".active").removeClass("active");
           $(this).parent().addClass("active");
        });
    </script>

    <!--list group script-->
    <script>
          $('.list-group-item').on('click',function(e){
        var previous = $(this).closest(".list-group").children(".active");
        previous.removeClass('active'); // previous list-item
        $(e.target).addClass('active'); // activated list-item
      });
    </script>



</body>
</html>
