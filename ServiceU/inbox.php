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
            <a href="inbox.php" style="color:#0e0e0f; text-decoration: underline;"> Inbox</a>
            <a href="profile.php"> My Profile</a>
            
            

        </div>
        
        <div class="col-xs-6 col-md-7" style="padding-left: 90px">
            <?php include('newPost.php'); ?>
                 <a class="btn btn-success btn-xs"  href="#newPost" data-toggle="modal" data-target="#newPost" role="button"><b>Create Job Now!</b></a>
        
        </div>
                                                                                                                                    
    </div>
    
     <div class="well well-lg" style="margin-top: 10px">

        <div class="row">

            <div class="col-md-1"> <!--Profile start here-->


                <div style="clear: both;" class="">
                   
                      <ul id="Profile-List">

                        <li>
                                <a href="inbox.php"><span class="glyphicon glyphicon-envelope"> </span> Inbox</a>
                          
                        </li>
                        <li>
                                <a href="sent.php"><span class="glyphicon glyphicon-share-alt"> </span> Sent</a>
                        
                        </li>
                        <li>
                                <a href="trash.php"><span class="glyphicon glyphicon-trash"> </span> Trash</a>
                        </li>
                        
                                               

                      </ul>
                   

                </div>

            </div>


            
             <?php include 'confirmCode.php' ?>  
            
           
            
            <!--style="max-width:500px" will reduce the width of the container-->
            <div class="col-md-11">        
                
               
                
                <div class="panel panel-info">
                    <div class="panel-heading" style="text-align: center"><h3><span class="glyphicon glyphicon-envelope"></span>&nbsp <b>My Inbox</b></h3></div>
                       
                            <div class="panel-body">
                            
           
                            
                            <div class="panel panel-default">
                              <!-- Default panel contents -->
                              <div class="panel-heading">
                                  
                                <div class="row">
                                    
                                  <div class="col-xs-6 col-md-2 myHeaderInbox">Subject</div>
                                  <div class="col-xs-6 col-md-2 myHeaderInbox">Sender</div>
                                  <div class="col-xs-6 col-md-5 myHeaderInbox">Last Message</div>
                                  <div class="col-xs-6 col-md-3 myHeaderInbox">Date</div>
                                    
                                </div>

                              </div>
                                    
                              <div class="panel-body">

                                  <?php
                                                                        

                                                                        
                                    $result = getMyInbox($userEmail);

                                      

                                        if(!empty($result)){
                                             while ($row = mysqli_fetch_assoc($result)){
                                                 
                                               /*print_r($row);
                                               echo '<br>';
                                               echo '<br>';*/
                                   
                                                 
                                              //if(countInBoxID($row['inboxID']) == 1)
                                                    //continue;
                                                 
                                              $myMSG = getMyMessageByID($row['dataID']);
                                              $dateSend = getDateSendByID($row['dataID']);
                                            
                                              //sender info
                                              $senderEmail = $row['senderEmail'];
                                              $senderID = getID($senderEmail);
                                        
                                              //msgStatus
                                               $msgStatus = getMessageStatusByID($row['dataID']);
                                              
                                            if(($userEmail == $row['receiverEmail']) && $msgStatus != 'Trash' && $msgStatus != 'Deleted'){  
                                                 
                                            
                                                 if($msgStatus == 'Unread')
                                                     echo '<div class="row myBodyInbox" style="background-color: #fff; padding-top: 10px;">';
                                                   else
                                                     echo '<div class="row myBodyInbox" style="background-color: #F5F5F5; padding-top: 10px;">';
                                                  
                                                    echo '<a href="conversation.php?userID='.$senderID.'&'.'j='.$row['jobID'].'">' .  '<div class="col-xs-6 col-md-2">' . getJobTitle($row['jobID'])  . '</div>';
                                                  
                                                    If(!empty(displayMyImage($senderEmail)))
                                                       echo '<div class="col-xs-6 col-md-2 ">' . '<img  class="img-circle" height="25" width="25" src="data:image/jpeg;base64,'.base64_encode(displayMyImage($senderEmail)).'"alt="User-ImG">' . '&nbsp&nbsp' . getFirstName($senderEmail) . '</div>';
                                        
                                                    else
                                                        echo '<div class="col-xs-6 col-md-2 ">' . '<img  class="img-circle" height="25" width="25" class="img-circle" src="img/user-icon.jpg" alt="User-ImG">' . '&nbsp&nbsp' . getFirstName($myEmail) . '</div>';
        
                                         
                                                        
                                                       echo '<div class="col-xs-6 col-md-5 ">' . $myMSG . '</div>';
                                        
                                           // if($isnewMessage == 'Yes')
                                                       echo '<div class="col-xs-6 col-md-3 ">' .$dateSend. '<a style="float: right" onClick="onClickDelete()" class="btn btn-danger  btn-xs" href="movetotrash.php?dID='.$row['dataID'].'&'.'jID='.$row['jobID'].'" role="button" data-toggle="tooltip" data-placement="left" title="Move to trash!"> Trash!</a> </div>';
                                             //else
                                                    // echo '<div class="col-xs-6 col-md-3 ">' .$userDate. '</div>';
                                        
                                                    echo '</div><a>';
                                                     
                                                     
                                                     
                                                     
                                               }
                                                 
                                                          
                                                    
                                                 
                                            }
                                
                                        }
                                        
                
                                 ?>
                                  
                             
                                  
                                </div> 
                          
                                
                            </div>
                                        
                                 <form role="form" id="checkTrashForm" method="POST" class="form-horizontal" name="submitDeleteMessage">
                                    
                                  <div class="col-xs-6 col-md-2" style="padding: 0px">
                                      <input type="checkbox" name="checkUncheck"><a href=""><button type="submit" style="width: 25px; border: none; background-color: #fff" name="submitMyTrash"><span class="glyphicon glyphicon-trash"> </span></a></button>
                                    <small style="color:#777786">Move all Trash</small>
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
    

    <?php
    


    if(isset($_POST['submitMyTrash']))  
            { 

                if(isset($_POST['checkUncheck'])){ 
                    
        
                            $status = "Trash";
                            moveMessageToTrash($userEmail, $status);
                    
                                    
                        }

                }

    function onClickDelete(){

        echo 'Hi';
    
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
