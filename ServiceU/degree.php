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
    
            $result = getAllUserEducation($userEmail);

            if (!$result) {
            echo "The fucntion getUserEducation is not working properly";
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

            <div class="col-md-3"> <!--Profile start here-->

                <div class="profileStart">
                  
                     <?php
                                    if(empty(displayMyImage($userEmail)))
                                        echo '<img id="userImageStyle" alt="msgProfilePic" class="img-circle" src="img/user-icon.jpg">';
                                     else
                                        echo '<img id="userImageStyle" alt="msgProfilePic" class="img-circle" src="data:image/jpeg;base64,'.base64_encode(displayMyImage($userEmail)).'"alt="msgProfilePic">';

                            ?>

                        <div class="profileSet" id="Profile-List">
                            <a href="viewmyprofile.php?userID=<?php echo getID($userEmail) ?>"><b><?php echo getFullName($userEmail);?></b></a>
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
                                <a href="profile.php" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
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
                    <div class="panel-heading" style="text-align: center"><h3><b><span class="glyphicon glyphicon-education"></span> My Education</b></h3></div>
                        <div class="panel-body">

                                        
                                     <?php
                                 
                                             if (mysqli_num_rows($result) == 0) {
                                                        echo '<div style="text-align:center;">';
                                                        echo '<b><p class="bg-danger"> You have not added your education </p></b>';
                                                        echo '</div>';

                                                }else{

                                                while ($row = mysqli_fetch_assoc($result)) 
                                                            {

                                                    

                                                                echo '<div style="font-size:16px">';

                                                                      echo '<div style="border-top-style: solid; border-width: 1px; border-top-color: #bce8f1;">' . '<b>' . $row['eduSchoolName'] . '</b>' . 
            '<a style="float:right; background-color: white; font-size:15px;" class="btn btn-light btn-s" onclick="deleteEdu()" href="deleteEducation.php?eduID='.$row['eduID'].'" role="button"><span class="glyphicon glyphicon-remove"></span></a>' . 
            '<a href="editDegree.php?eduID='.$row['eduID'].'" style="float:right; background-color: white; font-size:15px;" class="btn btn-light btn-s" id="editGlyp">Edit</span></a>' . '</div>';



                                                                      echo '<div>' . $row['eduDegreeLevel'] . '</div>';

                                                                      echo '<div>' . $row['eduDegreeName'] . '</div>';

                                                                        
                                                                      //Need to validate more about month and year
                                                                      if(!empty($row['eduStartMonth']) && !empty($row['eduEndMonth'])){
                                                                          
                                                                         echo '<div>' . $row['eduStartMonth'] . ' ' .  $row['eduStartYear'] . ' - ' . $row['eduEndMonth'] . ' ' . $row['eduEndYear'] . ' - ' . $row['eduLocation'] . '</div>';  
                                                                         
                                                                          
                                                                       }else
                                                                      {
                                                                           echo '<div>' . $row['eduLocation'] . '</div>';
                                                                          
                                                                          
                                                                      }
                                                                
                                           
                                                    
                                                                    echo '<div style="padding-bottom: 20px;">' . '</div>';

                                                                 echo '</div>';
                                                            }    


                                                      }


                                                    mysqli_close($con);
                                 ?>
                            
                                  
                                          
                            
                                         
                                          <div class="form-group" style="text-align:center; margin-top: 5%;">

                                                <div style="border-top-style: solid; border-width: 1px; border-top-color: #bce8f1; padding-top: 10px;">                                                  
                                                    
                                                      <a class="btn btn-info" href="editDegree.php" role="button">Add Education</a>
                                                    
                                                </div>

                                               

                                          </div>

                                    
                         </div>
                </div>

                
                

                              
                </div>         

            </div>-
                    
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
            function deleteEdu() {
                var ask = window.confirm("Are you sure you want to delete this post?");
                if (ask) {
                    window.alert("This post was successfully deleted.");

                    document.location.href = "window-location.html";
                        var dsd = $_GET[''];
                }
            }
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


    
</body>
</html>
