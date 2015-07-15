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

<!-- Navigation Sidebar -->
    <?php include 'navigationbar.php' ?>
    
<!-- About -->

    <!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
<div class="container">


     <div class="well well-lg">

        <div class="row">

            <div class="col-md-3"> <!--Profile start here-->

                <div class="profileStart">
                  
                    <img src="img/user-icon.jpg" alt="User-ImG" height="100" width="100" style="float: left;">

                        <div class="profileSet" id="Profile-List">
                            <a href="#"><b><?php echo getFullName($userEmail);?></b></a>
                            <br>
                            <a href="http://localhost/serviceudocs/index1.php">View My Profile</a>
                        </div>

                </div>

                <div style="clear: both;" class="text-left">
                   
                      <ul id="Profile-List">

                        <li>
                                <a href="#"><span class="glyphicon glyphicon-briefcase"> </span> Contact Information</a>
                                <a href="#" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-education"> </span> Degree</a>
                                <a href="#editDegree" data-toggle="modal" data-target="#editDegree"  class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                                <?php include('editDegreeModal.php') ?>
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-camera"> </span> Photo</a>
                                <a href="photo.php" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-plus"> </span> Experience</a>
                                <a href="#editExperience" data-toggle="modal" data-target="#editExperience" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <?php include('editExperienceModal.php') ?>
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-wrench"> </span> Skills</a>
                                <a href="#editSkill" data-toggle="modal" data-target="#editSkill" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <?php include('editSkillModal.php') ?>
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-cog"> </span> Interest</a>
                                <a href="#editInterest" data-toggle="modal" data-target="#editInterest" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <?php include('editInterestModal.php') ?>
                                
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-thumbs-up"> </span> My Reviews</a>
                                <a href="#" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-certificate"> </span> Account Settings</a>
                                <a href="#" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                        </li>
                                               

                      </ul>
                   

                </div>

            </div>


            
             <?php include 'confirmCode.php' ?>  

            <div class="col-md-9">        
               
                <div class="panel panel-default">
                    <div class="panel-heading"><h3><span class="glyphicon glyphicon-briefcase"></span> Contact Information</h3></div>
                        <div class="panel-body">


                                     <form action="" role="form" method="POST" class="form-horizontal">
                                          
                                        <div id="showSuccess" class="successHide">
                                                <p class="bg-success">Your changes have been saved.</p>
                                        </div>

                                          <div class="form-group" style="margin-left: -7%;">
                                            <label for="fName" class="col-sm-2 control-label">First Name:</label>
                                            <div class="col-sm-5">
                                              <input type="fName" name="userInfoFname" class="form-control" Value="<?php echo getFirstName($userEmail) ?>" >
                                            </div>
                                          </div>

                                          <div class="form-group" style="margin-left: -7%;">
                                            <label for="uPassword" class="col-sm-2 control-label">Last Name:</label>
                                            <div class="col-sm-5">
                                              <input type="lName" name="userInfoLname" class="form-control" value="<?php echo getLastName($userEmail) ?>">
                                            </div>
                                          </div>

                                          <div>
                                            <label>Email Address:</label>
                                             &nbsp&nbsp <?php echo $userEmail; ?>
                                             <a href="#" class="btn btn-light btn-xs" style="background-color: white;"><span class="glyphicon glyphicon-pencil"></span></a>
                                          </div>

                                          <div class="form-group" style="text-align:center; margin-top: 10%;">

                                                <div>                                                  
                                                     <button type="submit" name="updateUserInfo" class="btn btn-info" onclick="Show_Div(showSuccess)">Update Change</button>

                                                </div>

                                                <div>
                                                          <b>button type need to change to 'Submit' pop doesnt work</b>
                                                          <b>Delete Later</b> 
                                                </div>

                                          </div>

                                    </form>
                         </div>
                </div>


                
                
                <!--<div class="row">
                <div class="col-md-4 col-lg-offset-2"><p>Name:</p></div>
                <div class="col-md-4 col-lg-pull-2"> 
                    <?php 
                        //echo getFullName($userEmail);
                    ?> 
                                    </div>
                        </div>
                    <br>     
                        <div class="row">
                                    <div class="col-md-4 col-lg-offset-2"><p>Email: </p></div>
                                    <div class="col-md-4 col-lg-pull-2">
                                        <?php 
                                            //echo $userEmail;
                                        ?> 
                                    </div>
                        </div>
                    <br>
                        <div class="row">
                                    <div class="col-md-4 col-lg-offset-2"><p>Verify</p></div>
                                    <div class="col-md-4 col-lg-pull-2">
                                        <?php
                                            //if(checkVerification($userEmail) == 1)
                                                //echo '<span class="glyphicon glyphicon-ok" style="color: green; font-size: 25px;"></span>';
                                            //else
                                                //echo '<span class="glyphicon glyphicon-remove" style="color: red; font-size: 25px"></span>';
                                        ?>
                                    </div>
                        </div>
                    <br>
                        <div class="row">
                                    <div class="col-md-4 col-lg-offset-2"><p>Password:</p></div>
                                    <div class="col-md-2 col-lg-pull-1"> -------------- </div>
                                        <?php //include 'changepasswordModal.php' ?>                         
                                    <div class="col-md-3 col-lg-pull-1"><a href="#changePassword"  data-toggle="modal" data-target="#changePassword" class="btn btn-light btn-xs">Edit</a></div>
                        </div>
                    <br>
                        <div class="row">
                                    <div class="col-md-4 col-lg-offset-2"><p>Degree: </p></div>
                                    <div class="col-md-2 col-lg-pull-1"> 
                                        
                                        <?php 
                                            //echo strtoupper(getDegree($userEmail));
                                        ?>   
                                    </div>
                                    <div class="col-md-3 col-lg-pull-1">
                                        <a href="#editDegree" data-toggle="modal" data-target="#editDegree" class="btn btn-light btn-xs">Edit</a>
                                        <?php //include('editDegreeModal.php') ?>
                                        
                                        
                                        

                                    </div>
                        </div>
                    <br>
                        <div class="row">
                                    <div class="col-md-4 col-lg-offset-2"><p>Interests:</p></div>
                                    <div class="col-md-2 col-lg-pull-1"> 
                                        <?php 
                                            //echo stripInterest(getInterests($userEmail));
                                        ?> 
                                    </div>
                                    <div class="col-md-3 col-lg-pull-1">
                                        <a href="#editInterest" data-toggle="modal" data-target="#editInterest" class="btn btn-light btn-xs">Edit</a>
                                        <?php //include('editInterestModal.php') ?>
                                    </div>
                        </div> -->                   
                </div>         

            </div>
                    
     </div>    
</div>
        <!-- /.container -->

    <footer style="text-align: center;">

                <ul class="list-inline">
                  <li><a href="about.php">About</a></li>
                  <!--<li><a href="help.php">Help</a></li>-->
				  <li><a href="contactus.php">Contact Us</a></li>
                  <li><a href="#">Directory</a></li>
                  <li><h5 style="color: #aab8c2">&#169 2015 ServiceU, Inc, All rights reserved.</h5></li>
                </ul>
         
    </footer>



    <?php
    if(isset($_POST['updateUserInfo']))  
        {  
            $user_fName ="";
            $user_lName ="";

            if(empty($_POST['userInfoFname'])) {
                //$emailErr = "Email is required";
                //error here
                  
            } else {
                $user_fName = test_user_input($_POST['userInfoFname']); 
              
            }
            
            if(empty($_POST['userInfoLname'])) {
                //$emailErr = "Email is required";
                //error here
                  
            } else {
                 $user_lName = test_user_input($_POST['userInfoLname']);  
               
            }
         
          if($user_fName == getFirstName($userEmail) && $user_fName == getLastName($userEmail)){}
          else
          {
            updateUserInformation($userEmail, $user_fName,  $user_lName);

          }
     
        }  




    ?>



    <script>
      function Show_Div(Div_id) {
            if (false == $(Div_id).is(':visible')) {
                $(Div_id).show(0);

            }
        }
    </script>
    
        

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
