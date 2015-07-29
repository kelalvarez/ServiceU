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
     <link href="css/dashboardcss.css" rel="stylesheet">
    
    
</head>

    
<body>
    


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
                                                                                                                  
    </div>
    
     <div class="well well-lg myWEll" style="margin-top: 10px">

        <div class="row">

            <div class="col-md-2"> <!--Profile start here-->


                <div style="clear: both;" class="">
                   
                      <ul id="Profile-List">

                        <li>
                                <a href="myjobpost.php"><span class="glyphicon glyphicon-envelope"> </span> My Job Post</a>
                          
                        </li>
                        <li>
                                <a href="myapplications.php"><span class="glyphicon glyphicon-share-alt"> </span> My Applications</a>
                        
                        </li>
    
                                               

                      </ul>
                   

                </div>

            </div>


            
             <?php include 'confirmCode.php' ?>  
            
           
            
            <!--style="max-width:500px" will reduce the width of the container-->
            <div class="col-md-10">        
                
               
                
                <div class="panel panel-info">
                    <div class="panel-heading" style="text-align: center"><h3><span class="glyphicon glyphicon-piggy-bank"></span>&nbsp <b>My Dashboard</b></h3></div>
                       
                            <div class="panel-body">
                            
           
                    
                              <div class="panel-body">
                                  
                                      <div class="rowAddjobpost">
                                        <span class="glyphicon glyphicon-wrench"> </span> 
                                        <h3>Creating Job on ServiceU is effortless.</h3>
                                        <p>Start now to provide service to your local community!</p>
                                        <?php include('newPost.php'); ?>
                                        <a class="btn btn-success" href="#newPost" data-toggle="modal" data-target="#newPost" role="button">Create Job Now!</a>
                                        
                                </div>

                                  
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
    

    <?php
    


    if(isset($_POST['submitMyTrash']))  
            { 

                if(isset($_POST['checkUncheck'])){ 
                    
        
                            $status = "Trash";
                            moveMessageToTrash($userEmail, $status);
                    
                                    
                        }

                }

        

    ?>
    

    <script>
                //check uncheck all check box 
                $('#checkUncheck').change(function(e) {
                $('input[type="checkbox"]').prop('checked', this.checked);
            });

    </script>
    
        <script>
            $(function(){

                        $('input[type=submitMyTrash]').click(function(){

                            $.ajax({
                                type: "POST",
                                url: "inbox.php",
                                data: $("#checkTrashForm").serialized(),
                                success: function(data){
                                    $('#result').html(data);
                                }


                            });



                        });


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
