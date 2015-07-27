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
    if(isset($_POST['updateUserInfo']))  
        {  
            $user_fName ="";
            $user_lName ="";
            $user_phoneNumber="";

            $showSuccessEdit="";

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
                                 
             if(empty($_POST['userPhoneNumber'])) {
                //$emailErr = "Email is required";
                //error here
                  
            } else {
                 $user_phoneNumber = test_user_input($_POST['userPhoneNumber']);  
               
            }
                                 
                                 
         
             
             
        if(!empty($user_fName) || !empty($user_lName) || !empty($user_phoneNumber)){
             updateUserInformation($userEmail, $user_fName,  $user_lName, $user_phoneNumber);
              $showSuccessEdit = TRUE; 
          
        }else
             $showSuccessEdit = FALSE; 
          
     
           
           
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
            <a href="myapplications.php"> My Applications</a>
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

            <div class="col-md-3"> <!--Profile start here-->

                <div class="profileStart">
                  

                        <?php
                                    if(empty(displayMyImage($userEmail)))
                                       echo '<img id="userImageStyle" alt="msgProfilePic" class="img-circle" src="img/user-icon.jpg">';
                                     else
                                        echo '<img id="userImageStyle" alt="msgProfilePic" class="img-circle" src="data:image/jpeg;base64,'.base64_encode(displayMyImage($userEmail)).'"alt="msgProfilePic">';

                            ?>


                        <div class="profileSet" id="Profile-List">
                            <a href="viewmyprofile.php?userID=<?php echo getID($userEmail) ?>"><b> <?php echo getFullName($userEmail);?> </b></a>
                            <br>
                            <a href="viewmyprofile.php?userID=<?php echo getID($userEmail) ?>">View My Profile</a>
                            <br>
                            <br>
                             <?php
                           
                            
                                            if(checkVerification($userEmail) == 1)
                                                echo '<p>Verified: <span class="glyphicon glyphicon-ok" style="color: green; font-size: 15px;">  </span></p>';
                                            else
                                                echo '<p>Verified: <span class="glyphicon glyphicon-remove" style="color: red; font-size: 15px">  </span></p>';
                             ?>
                        </div>

                </div>

                <div style="clear: both;" class="text-left">
                   
                      <ul id="Profile-List">

                        <li>
                                <a href="#"><span class="glyphicon glyphicon-briefcase"> </span> Contact Information</a>
                                <a href="#" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-education"> </span> Education</a>
                                <a href="degree.php" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                              
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-camera"> </span> Photo</a>
                                <a href="photo.php" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-star-empty"> </span> Experience</a>
                                <a href="experience.php" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-wrench"> </span> Skills</a>
                                <a href="skills.php" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                                
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-cog"> </span> Interest</a>
                                <a href="interest.php" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                                       
                                
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-thumbs-up"> </span> My Reviews</a>
                                <a href="#" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-certificate"> </span> Account Settings</a>
                                <a href="editsettings.php" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                        </li>
                                               

                      </ul>
                   

                </div>

            </div>


            
             <?php include 'confirmCode.php' ?>  

            <div class="col-md-9">        
               
                <div class="panel panel-info">
                    <div class="panel-heading" style="text-align: center"><h3><b><span class="glyphicon glyphicon-briefcase"></span> Contact Information</b></h3></div>
                        <div class="panel-body">


                                     <form action="" role="form" method="POST" class="form-horizontal" id="contactInformationForm">
                                          
                                        <div style="text-align:center;">
                                          <?php
                                                 if(isset($_POST['updateUserInfo'])){
                                 
                                                    if($showSuccessEdit == TRUE)
                                                         echo '<p class="bg-success">Your changes have been saved.</p>';
                                                    else
                                                         echo '<p class="bg-danger">No changes have been made!</p>';
                                        
                                                 }
                                                       
                                          ?>

                                        </div>

                                          <div class="form-group">
                                            <label for="fName" class="col-sm-5 control-label">First Name:</label>
                                            <div class="col-sm-5">
                                              <input type="fName" name="userInfoFname" class="form-control" Value="<?php echo getFirstName($userEmail) ?>" >
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label for="uPassword" class="col-sm-5 control-label">Last Name:</label>
                                            <div class="col-sm-5">
                                              <input type="lName" name="userInfoLname" class="form-control" value="<?php echo getLastName($userEmail)?>">
                                            </div>
                                          </div>
                                         
                                          <div class="form-group">
                                            <label for="uPhone" class="col-sm-5 control-label">Phone Number (optional):</label>
                                            <div class="col-sm-5">
                                              <input type="uPhoneNumber" name="userPhoneNumber" class="form-control" value="<?php echo getUserPhoneNumber($userEmail)?>">
                                            </div>
                                          </div>   

                                         
                                         
                                          <div class="form-group" style="text-align:center; margin-top: 5%;">

                                                <div style="border-top-style: solid; border-width: 1px; border-top-color: #bce8f1; padding-top: 10px;">                                                  
                                                     <button type="submit" name="updateUserInfo" class="btn btn-info" onclick="Show_Div(showSuccess)">Update Changes</button>
                                            

                                                </div>

                                          </div>

                                    </form>
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


    <script>
            $(function(){

                    $('input[type=updateUserInfo]').click(function(){

                        $.ajax({
                            type: "POST",
                            url: "profile.php",
                            data: $("#contactInformationForm").serialized(),
                            success: function(data){
                                $('#result').html(data);
                            }


                        });



                    });


                });
    </script>
    




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
    
    
    <!--This will prevent resfesh page but not submit-->
    <script>
             $('#contactForm').submit(function () 
                {
                     return false;
                });
    </script>

    
</body>
</html>
