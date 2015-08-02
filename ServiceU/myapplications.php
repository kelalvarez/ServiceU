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

    /*if (isset($_POST['submitInterest'])) {
        $newInterest = $_POST['interest1'];

        insertInterest($userEmail, $newInterest);
    }*/

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

            $result = getUserApps($userEmail);

            if (!$result) {
            echo "Could not  successfully ";
            }

            if (mysqli_num_rows($result) == 0) {

            echo '<script type="text/javascript">';
            echo 'alert("You have not created any post yet.")';
            echo '</script>';

            }
    ?>


<!-- Navigation Sidebar -->
    <?php include 'navigationbar.php' ?>

<!-- About -->

    <!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
<div class="container">

         <div class="row" style="">
        <div class="col-xs-6 col-md-5 navLink" style="padding-left: 30px;">

            <a href="myjobpost.php"> My Job Post</a>
            <a href="myapplications.php" style="color:#0e0e0f; text-decoration: underline;"> My Applications</a>
            <a href="inbox.php"> Inbox</a>
            <a href="profile.php"> My Profile</a>



        </div>

        <div class="col-xs-6 col-md-7" style="padding-left: 90px">
            <?php include('newPost.php'); ?>
                 <a class="btn btn-success btn-xs"  href="#newPost" data-toggle="modal" data-target="#newPost" role="button"><b>Create Job Now!</b></a>

        </div>

    </div>

     <div class="well well-lg" style="margin-top: 10px">

        <div class="row">

            <div class="col-md-2"> <!--Profile start here-->


                <div style="clear: both;" class="">

                      <ul id="Profile-List">

                        <li>
                                <a href="myjobpost.php"><span class="glyphicon glyphicon-folder-open"></span>&nbsp My Job Post</a>

                        </li>
                        <li>
                                <a href="myapplications.php"><span class="glyphicon glyphicon-usd"> </span>&nbsp My Applications</a>

                        </li>




                      </ul>


                </div>

            </div>



             <?php include 'confirmCode.php' ?>



            <!--style="max-width:500px" will reduce the width of the container-->
            <div class="col-md-10">



                <div class="panel panel-info">
                    <div class="panel-heading" style="text-align: center"><h3><span class="glyphicon glyphicon-folder-open"></span>&nbsp <b>My Applications</b></h3></div>
                        <div class="panel-body">



                                <table class="table table-bordered ">

                                    <thead>
                                      <tr class="myHeaderInbox">
                                        <th >Job Title</th>
                                        <th>Description</th>
                                        <th>Payment</th>
                                        <th>Category</th>
                                        <th>Applicant</th>
                                        <th>Status</th>

                                      </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                                while ($row = mysqli_fetch_assoc($result))
                                                {
                                                    echo ' <tr> ';
                                                    echo ' <td> ';
                                                    echo "<a href=\"postComplete.php?jobID=";
                                                     echo $row['jobID'];
                                                     echo "\" target=\"_parent\">";
                                                    echo '<b>' . $row['jobTitle'] . '</b>';
                                                     echo "</a>";
                                                    echo ' <td style="width: 50%"> ';
                                                    echo '<p class="showHide">' . $row['jobDescription'] . '</p>';
                                                    echo ' <td> ';
                                                    echo '$' . $row['payment'];
                                                    echo ' <td> ';
                                                    echo $row['category'];
                                                    echo ' <td> ';
                                                    echo $row['totalApp'];

                                                    echo ' <td> ';

                                                   if($row['closeJob'] == 1)
                                                      echo '<span class="label label-success">Open</span>';
                                                   else if($row['closeJob'] == 2)
                                                      echo '<span class="label label-warming">Pending</span>';
                                                   else
                                                     echo '<span class="label label-danger">Closed</span>';
                                                }

                                        ?>


                                    </tbody>


                                </table>


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
         <li><a href="contactus.php">Contact Us</a></li>
        <li><a href="services.php">Home</a></li>
        <li><h5 style="color: #aab8c2">&#169 2015 ServiceU, Inc, All rights reserved.</h5></li>
        </ul>

        </footer>




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


    <!--change acive mode in the navbar-->
    <script>
        $(".nav a").on("click", function(){
           $(".nav").find(".active").removeClass("active");
           $(this).parent().addClass("active");
        });
    </script>


    <script>

    jQuery(function(){

        var minimized_elements = $('p.showHide');

        minimized_elements.each(function(){
            var t = $(this).text();
            if(t.length < 100) return;

            $(this).html(
                t.slice(0,100) + '<span> <b>...</b></span><a href="#" class="more" style="color: black;"><b>More</b></a>' + '<span style="display:none;">'+ t.slice(100,t.length)+' <a href="#" class="less" style="color: black;"><b>Less</b></a></span>'
            );

        });

        $('a.more', minimized_elements).click(function(event){
            event.preventDefault();
            $(this).hide().prev().hide();
            $(this).next().show();
        });

        $('a.less', minimized_elements).click(function(event){
            event.preventDefault();
            $(this).parent().hide().prev().show().prev().show();
        });

    });

</script>




</body>
</html>
