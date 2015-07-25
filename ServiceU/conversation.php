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
           

            if(!empty($_GET['userID']))
               $sendMessageTo =  $_GET['userID']; //userID is retrieve from jobtable
            
                //sender
               $idToSenderAndReciever = getEmailByID($sendMessageTo);

                //update number of message
               updateMyNumberofMessages($userEmail, $idToSenderAndReciever);
               
    ?>  
    
    
<!-- Navigation Sidebar -->
    <?php include 'navigationbar.php' ?>
    
<!-- About -->

    <!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
<div class="container">


     <div class="well well-lg">

        <div class="row">

            <div class="col-md-2"> <!--Profile start here-->


                <div style="clear: both;" class="text-left">
                   
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
            <div class="col-md-10">
               
             
                <div style="padding-bottom: 30px;">
                    
                     <?php
           
                                

                                    if(empty(displayMyImage($idToSenderAndReciever)))
                                         echo '<img id="userImageStyle" alt="msgProfilePic" class="img-circle" src="img/user-icon.jpg">';
                                     else
                                         echo '<img id="userImageStyle" alt="msgProfilePic" class="img-circle" src="data:image/jpeg;base64,'.base64_encode(displayMyImage($idToSenderAndReciever)).'"alt="msgProfilePic">';

                                        
                    ?>
                          
                
                </div>
                
                &nbsp&nbsp
                <div class="panel panel-info">
                    <!--Later make the FIrst name link to the person profile-->
                    <div class="panel-heading" style="font-weight: 600;">&nbsp&nbsp SEND A MESSAGE TO 
                        <?php  echo '<a href="viewmyprofile.php?userID='.getID($idToSenderAndReciever).'" style="text-align: left; font-weight: 700; font-size: 17px;">' . getFirstNameByID($_GET['userID']) . '</a>'  
                       
                        ?>
                    
                    </div>
                        
                    
                        <div class="panel-body">
                            
                            <div class="dasa" style="margin-left: 13%; width: 75%"> 
                          
                                 <form role="form" method="POST" class="form-horizontal">
                            
                                
                                            <!--count be stripped table-->
                                            <table class="table">
                         
                                                <?php
                                                            //load History       
                                                    if(!empty(checkIfThereisHistory($userEmail, $idToSenderAndReciever))){
                                                                    $history = loadHistory($userEmail, $idToSenderAndReciever);

                                                            while($row = mysqli_fetch_assoc($history)){
                                                                      
                                                                
                                                                    echo '<tr>';
                        
                                                                            echo '<td>' . '<div style="font-weight: 600; text-align: center; color: #31708f">' . getFirstName($row['senderEmail']) . '</div>' . '<div>' . $row['senderMessage'] . '</div>' . '</td>'; 
                                                                     
                                                                    echo '</tr>';
                                                            }
                                                      }//no history
                                                  
                                                ?>
                                            </table>
                                            

                                        <div style="">
                                        <textarea class="" style="resize: none;" cols="105" id="messageBody" name="sendMessageToRecipient" rows="7" maxlength="1200"></textarea>
                                     </div>
                                     
                                     
                                
                                    <div class="row">
                                        <div class="col-xs-4" style="padding-left: 15px;">
                                            <button type="submit"  name="sendMessage" class="btn btn-default"><span class="glyphicon glyphicon-send"></span>&nbsp&nbsp Send</button>
                                            
                                        </div>  
                                        
                                         <div class="col-xs-4" style="">
                                             
                                                
                                        </div>
                                    
                                        <div class="col-xs-4" style="">
                                            <!--get number of chars
                                             <span class="char-count"><em>0</em> / 1200 Chars Max</span>-->
                                             <span class="char-count">1200 Chars Max</span>
                                        </div>
                                    </div>
                             </div>    
                                     
                                </form>
                                        


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


     <script>

            var inputs = document.getElementsByTagName("input");
                for(var i = 0; i < inputs.length; i++)
                    if(inputs[i].type == "checkbox")
                        inputs[i].checked = true;
    </script>
    
     
    <?php
            if(isset($_POST['sendMessage']))  
            { 
                        
                 $recipient_message ="";
                        
                 if(empty($_POST['sendMessageToRecipient'])){
                    //$passwordnameErr = "Password is required";
                  }else {
                    $recipient_message = test_user_input($_POST['sendMessageToRecipient']);
                  }

                        //send message if description is not empty
                        if(!empty($recipient_message)){
                            $newMessage = 'Yes';
                            sendMyMessage($userEmail, $recipient_message, $idToSenderAndReciever, $newMessage);
                            
                        }
                            
            }
    ?>
    

    
    
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
