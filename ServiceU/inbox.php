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
          //read Email
          
          
          $result = getMyMessage($userEmail);
            
            //$result = getUserMessage($userEmail);
        
    ?>
    

<!-- Navigation Sidebar -->
    <?php include 'navigationbar.php' ?>
    
<!-- About -->

    <!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
<div class="container">


     <div class="well well-lg">

        <div class="row">

            <div class="col-md-1"> <!--Profile start here-->


                <div style="clear: both;" class="">
                   
                      <ul id="Profile-List">

                        <li>
                                <a href="inbox.php"><span class="glyphicon glyphicon-envelope"> </span> Inbox</a>
                          
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-share-alt"> </span> Sent</a>
                        
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-trash"> </span> Trash</a>
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
                                    
                                <form role="form" id="checkTrashForm" method="POST" class="form-horizontal" name="submitDeleteMessage">
                                    
                                  <div class="col-xs-6 col-md-1 myHeaderInbox">
                                      <input type="checkbox" onClick="toggle(this)" value="0" id="" class="list-checkbox">&nbsp&nbsp
                                      <a href="">
                                      <button type="submit" style="width: 25px; border: none; background-color: #F5F5F5" name="submitMyTrash"><span class="glyphicon glyphicon-trash"> </span></a></button></div>
                                    
                                    
                                  <div class="col-xs-6 col-md-2 myHeaderInbox">Sender</div>
                                  <div class="col-xs-6 col-md-6 myHeaderInbox">Last Message</div>
                                  <div class="col-xs-6 col-md-3 myHeaderInbox">Date</div>
                                </div>

                              </div>

                              <div class="panel-body">
                             
                                  <?php
                                
                                    if(!empty($result))
                                             while ($row = mysqli_fetch_assoc($result)){
        
                                                $userMessage = getRecepientMessage($row['senderID']);
                                                $userDate = getRecepientLatestDate($row['senderID']);
                                                $isnewMessage = getIfNewMessage($row['senderID']);
                                                
                                                $replySenderID = getID($row['senderEmail']);
        
                                                   if($isnewMessage == 'Yes')
                                                     echo '<div class="row myBodyInbox" style="background-color: #fff; padding-top: 10px;">';
                                                   else
                                                     echo '<div class="row myBodyInbox" style="background-color: #F5F5F5; padding-top: 10px;">';
        
                                                       echo '<div class="col-xs-6 col-md-1 "><input type="checkbox" name="foo" value="0" id="chkSelected_0" class="list-checkbox"></div>';
                                                     
                                                    If(!empty(displayMyImage($row['senderEmail'])))
                                                       echo '<a href="conversation.php?userID='.$replySenderID.'"> ' . '<div class="col-xs-6 col-md-2 ">' . '<img  class="img-circle" height="25" width="25" src="data:image/jpeg;base64,'.base64_encode(displayMyImage($row['senderEmail'])).'"alt="User-ImG">' . '&nbsp&nbsp' . getFirstName($row['senderEmail']) . '</div>';
                                                    else
                                                        echo '<a href="conversation.php?userID='.$replySenderID.'"> ' . '<div class="col-xs-6 col-md-2 ">' . '<img  class="img-circle" height="25" width="25" class="img-circle" src="img/user-icon.jpg" alt="User-ImG">' . '&nbsp&nbsp' . getFirstName($row['senderEmail']) . '</div>';
        
                                                       echo '<div class="col-xs-6 col-md-6 ">' . $userMessage . '</div>';
                                                       echo '<div class="col-xs-6 col-md-3 ">' .$userDate. '<a style="float: right" class="btn btn-info  btn-xs" href="conversation.php?userID='.$replySenderID.'" role="button" data-toggle="tooltip" data-placement="left" title="Read Message"><span class="glyphicon glyphicon-arrow-left"></span></a>' . '</div>';
                                                    echo '</div><a>';

                                            }
                                    

                
                                 ?>
                                  
                                </div> 
                           </form>
                                
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
    


    if(isset($_POST['submitDeleteMessage']))  
            { 
                
                
                      $aSize = count($_POST['interestText']);
                      $checkNum = 0;
                
                            if(isset($_POST['interestText'])){
                              
                                
                                 foreach($_POST['interestText'] as $key => $text_field){ //check if all fields are empty
                                        if(empty($text_field)){
                                                $checkNum++;
                                        }
                                     }
                                
                                if($aSize == $checkNum){  //if all fields are empty send 'na' to the database
                                    $string = 'na';
                                    insertInterest($userEmail, $string);
                                    
                                }else{//if not empty means there is a field that is filled
                                     $newSkill = implode(", ", $_POST['interestText']);    //implode turns array into a string //explode string to an array
                                     $string = str_replace(',', '', $newSkill);
                                     insertInterest($userEmail, $string);
                                }
                            
                            }
                            
                                
            }

    ?>
    
    
    <script>
            //check all checkbox
            function toggle(source) {
              checkboxes = document.getElementsByName('foo');
              for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
              }
            }
       
    </script>
    
        <script>
            $(function(){

                        $('input[type=submitDeleteMessage]').click(function(){

                            $.ajax({
                                type: "POST",
                                url: "inbox.php",
                                data: $("#submitMyTrash").serialized(),
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
