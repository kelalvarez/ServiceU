<!DOCTYPE html>
<?php
    include("DatabaseFunctions.php"); 
    include("functions.php");

    session_start();
    if (!isset($_SESSION["loginEmail"]))
    {
        header("location: index.php");
        exit();
    }
    else{
       $userEmail = $_SESSION["loginEmail"];
    }   

    if(isset($_GET['jobID']))
    {
        $jobID = $_GET['jobID'];
    }
    else{
        header("location: errorAccess.php");
        exit();
    }
    
    if (isset($_POST['confirmApp'])) {
        if(existApp($userEmail, $jobID) == 0){
            submitApp($userEmail, $jobID);
            echo '<script type="text/javascript">';
            echo 'alert("Congratulations, you have applied!")';
            echo '</script>';
        }
        else{
            echo '<script type="text/javascript">';
            echo 'alert("You already have submitted an application")';
            echo '</script>';
        } 
            
    }
    else if(isset($_POST['denyApp'])){
        //do something if cancel app
    }

    if (isset($_POST['updateJob'])) {
        
        $jobTitle = $_POST['jobTitle'];
        $jobDescription = $_POST['jobDescription'];
	$jobPayment = $_POST['jobPayment'];
	$jobCategory = $_POST['jobCategory'];

        updatePost($jobID, $jobTitle, $jobDescription, $jobPayment, $jobCategory);
        
        $numAp = numApplications($jobID);
        if($numAp > 0 ){
            $r = getJobApplicants($jobID);
            while ($rw = mysqli_fetch_assoc($r)) { 
                newNotification( $rw['employeeID'] , "<strong> ". $jobTitle ." </strong> :: The owner of the post, which you applied for, has changed the jobs information. <a href=\"postComplete.php?jobID=" . $jobID . "\" target=\"_parent\">Click here </a> to review the changes" );
            }
        }
        
        echo '<script type="text/javascript">';
        echo "alert(\"Update Done \")";
        echo '</script>';

    }
    
    if (isset($_POST['confirmClosure'])) {
        
        closePost($jobID);
        echo '<script type="text/javascript">';
        echo 'alert("This Job post have been closed")';
        echo '</script>';

    }
    
    if (isset($_POST['confirmOpen'])) {
        
        openPost($jobID);
        echo '<script type="text/javascript">';
        echo 'alert("This Job post have been opened")';
        echo '</script>';

    }
    
    $appSubmit = 0;
    if (isset($_POST['submitApplicant'])) {
        $applicantEmail = $_POST['applicantEmail'];
        applicantSelected($applicantEmail, $jobID);
        $appSubmit = 1;
        $jobT = getJobTitle($jobID);
        newNotification( $applicantEmail , "<strong> ". $jobT ." </strong> :: You have been selected for the job. <a href=\"postComplete.php?jobID=" . $jobID . "\" target=\"_parent\">Click here </a> to review job" );
        closePost($jobID);
    } 
    
    $yes = 0;
    if (isset($_POST['yesApplicant'])) {
        $applicantEmail = $userEmail;
        applicantConfirmed($applicantEmail, $jobID);
        $jobT = getJobTitle($jobID);
        $jobO = getJobOwner($jobID);
        newNotification( $jobO , "<strong> ". $jobT ." </strong> :: The applicant that you selected has confirm his/her application. <a href=\"postComplete.php?jobID=" . $jobID . "\" target=\"_parent\">Click here </a> to review job" ); 
        
        $yes = 1;
        $numAp = numApplications($jobID);
        if($numAp > 0 ){
            $r = getJobApplicants($jobID);
            while ($rw = mysqli_fetch_assoc($r)) { 
                if($rw['employeeID'] != $applicantEmail){
                    newNotification( $rw['employeeID'] , "<strong> <a href=\"postComplete.php?jobID=" . $jobID . "\" target=\"_parent\">". $jobT ."</a> </strong> :: The job has been closed. Thank you for your application." );
                }
            }
        }
    }
    
    $no = 0;
    if (isset($_POST['noApplicant'])) {
        $applicantEmail = $userEmail;
        $jobT = getJobTitle($jobID);
        $jobO = getJobOwner($jobID);
        $no = 1;
        clearApplicant($userEmail, $jobID);
        newNotification( $jobO , "<strong> ". $jobT ." </strong> :: The applicant that you selected has deny the job offer. <a href=\"postComplete.php?jobID=" . $jobID . "\" target=\"_parent\">Click here </a> to review the job" ); 
    }
    
    if (isset($_POST['confirmPayment'])) {
        $employeerEmail = getJobOwner($jobID);
        $employeeEmail = selectedApplicant($jobID);
        $amount = getJobPayment($jobID);
        createPayment($jobID, $employeerEmail, $employeeEmail, $amount);
        submitPayment($jobID);
        echo '<script type="text/javascript">';
        echo 'alert("Payment Agreement accepted")';
        echo '</script>';
    } 
    
    $resubmit =  0;
    $cancelpay = 0;
    if (isset($_POST['resubmitPayment'])) {
        $payID = retrievePayment($jobID);
        resubmitPayment($jobID, $payID);
        $resubmit = 1;
    }
    
    if (isset($_POST['cancelPayment'])) {
        $payID = retrievePayment($jobID);
        cancelPayment($jobID, $payID);
        $cancelpay = 1;
        $appSubmit = 0;
    }

    $employeeComplete = 0;
    $employerComplete = 0;
    if (isset($_POST['completeJobApp'])) {
        completePaymentEmployee($jobID);
        $employeeComplete = 1;
    }    
    
    if (isset($_POST['completeJobOwner'])) {
        completePaymentEmployer($jobID);
        $employerComplete = 1;
        
    }  
    
    if (isset($_POST['submitReview'])) {
        
        $overallStars = $_POST['overRadio'];
        $reviewText = $_POST['reviewText'];
        $recommend = $_POST['recomRadio'];
        
        $employeerEmail = getJobOwner($jobID);
        $employeeEmail = selectedApplicant($jobID);
        
        $senderID = $userEmail;
        
        if($senderID == $employeeEmail){
            $receiverID = $employerEmail;
        }else {
            $receiverID = $employeeEmail;
        }
        
        if($recommend == 1 ){
            $textRecommend = 'yes';
        } else {
            $textRecommend = 'no';
        }
        
        submitNewReview($receiverID, $senderID, $reviewText, $overallStars, $textRecommend, $jobID);

    } 
?>


<html lang="en">

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

<div class="container">
    

<?php 
    $owner = isOwner($userEmail, $jobID);
    $existApplication = existApp($userEmail, $jobID);
    $paymentDone = isPayment($jobID);
    $select = isSelected($jobID);
    $currentSelected = isApplicantSelected($userEmail, $jobID);
    $selectedApplicant = selectedApplicant($jobID);   
    $paymentStatus = isPaymentDone($jobID);
    $paymentClear = isPaymentRejected($jobID);
    $needEmployerVerification = employeeCompletedJob($jobID);
    
    $employeeFinished =  employeeCompletedJob($jobID);
    $employerVerified = verifyJobCompleted($jobID);
    $finished = isJobCompleted($jobID);
    
    $reviewSubmit =  isReviewSubmitted($jobID);
    
    
    if ($appSubmit == 1) { ?> 
            <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> You have selected applicant <?php echo getFullName($applicantEmail); ?> to complete the Job.
        
      </div>
<?php } 
    if($resubmit == 1){ ?>
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Payment Resubmit Confirmed!</strong>
        </div>  
<?php
    }
    if( $employeeComplete == 1) {    
?>
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Job Completed Submission Confirmed! Your alert has been successfully sent</strong>
        </div> 
    <?php }   
 
  if ($employeeFinished == 1 && $employerVerified == 1 && $finished == 1){ ?>
     <div class="alert alert-success">
         <strong>Job Completed!</strong> All payments have been done and this service has been successfully completed. <br>
    </div>
  <?php } elseif ($employeeFinished == 1 && $employerVerified == 1){ ?>
    <div class="alert alert-warning">
         <strong>Payment to Employer Processing!</strong> Allow ServiceU to forward the payment to the employer in 24-72 hours. You will be notified <br>
    </div>      
<?php  

  }elseif ($select == 1 && $owner == 1 && $selectedApplicant != 'na' && $paymentDone == 1 && $paymentStatus == 1 && $paymentClear == 0 ) { 
?>
    <div class="alert alert-warning">
         <strong>Payment ready to be Processed !</strong> Submit your payment through the PayPal button. A notification will be sent to you when ServiceU clear it. <br>
    </div>
<?php 

   } elseif ($select == 1 && $owner == 1 && $selectedApplicant != 'na' && $paymentDone == 1 && $paymentStatus == 1 && $paymentClear == 1 && $employeeFinished == 0 ) { ?>
     <div class="alert alert-success">
         <strong>Payment Cleared and Completed!</strong> Your employee may now be able to complete the requested service. <br>
    </div>
<?php 
   } elseif ($select == 1 && $owner == 1 && $selectedApplicant != 'na' && $paymentDone == 1 && $paymentStatus == 1 && $paymentClear == 1  && $employeeFinished == 1) { ?>
    <div class="alert alert-warning">
         <strong>Job Completed Verification Pending!</strong> Your employee has requested a verification for his/her service. Click on Complete to complete the transaction. <br>
    </div>

<?php }    
   elseif ($select == 1 && $owner == 1 && $selectedApplicant != 'na' && $paymentDone == 1 && $paymentStatus == 1 && $paymentClear == 2 ) { ?>
     <div class="alert alert-danger">
        <strong>Payment Rejected!</strong> Choose one of the following options.         
 
        
        <form id="paymentRejected" class="form-horizontal" action="#" name="payReject" method="POST">
         <button name="resubmitPayment" type="submit">Resubmit</button> or <button name="cancelPayment" type="submit">Cancel Payment</button>
        </form>
        
    </div>    
<?php
   } elseif ($select == 1 && $owner == 1 && $selectedApplicant != 'na' && $paymentDone == 0) { ?>
    
 <div class="alert alert-warning">
        <strong>Payment Pending !</strong> Confirm the terms and conditions to continue to checkout.
    </div>
<?php 
   } elseif ($select == 1 && $owner == 1 ) { ?>

    <div class="alert alert-warning">
        <strong>Confirmation Pending!</strong> You have already selected an applicant for this job
    </div> 
<?php
  }
  else if( $select == 1 && $currentSelected == 1 && $selectedApplicant == 'na'){
?>  
    <div class="alert alert-warning">
        <form id="appConfirm" class="form-horizontal" action="#" name="confirmApp" method="POST">
        <strong>Confirmation Pending!</strong> You have been selected for the job. Do you want to confirm the transaction? <button name="yesApplicant" type="submit"> Yes</button> or <button name="noApplicant" type="submit"> No</button>
        </form>
    </div> 
    
<?php
  }else if( $select == 1 && $currentSelected == 1 && $yes == 1){ ?>
    <div class="alert alert-success fade in">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       <strong>Confirmed!</strong> You have successfully accepted the job.
     </div>    
    <div class="alert alert-warning fade in">
        <strong>Payment Confirmation Pending !</strong> Waiting for ServiceU to clear the payment.
    </div> 
<?php
  }else if( $select == 1 && $currentSelected == 1 && $no == 1){ ?>
    <div class="alert alert-success fade in">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       <strong>Denied!</strong> You have successfully denied the job.
     </div>     
<?php
  }else if( $select == 1 && $currentSelected == 0 && $selectedApplicant == 'na'){ ?>
    <div class="alert alert-warning fade in">
       <strong>Job about to Close</strong> 
     </div>
<?php
  }else if( $select == 1 && $currentSelected == 0 && $userEmail != $selectedApplicant){ ?>
    <div class="alert alert-danger fade in">
       <strong>Job Closed! </strong> This post will no longer receive applications. 
     </div>  
<?php
  }else if( $select == 1 && $userEmail == $selectedApplicant && $paymentClear == 0){ ?>
    <div class="alert alert-warning fade in">
        <strong>Payment Confirmation Pending !</strong> Waiting for ServiceU to clear the payment.
    </div>
<?php
  } else if( $select == 1 && $userEmail == $selectedApplicant && $paymentClear == 1 && $employeeFinished == 0 ){ ?>
    <div class="alert alert-success fade in">
        <strong>Payment Confirmed!</strong> You may now work on the requested service.
    </div>
    <div class="alert alert-warning fade in">
       <strong>Job on Progress! </strong> Click the complete button when finished  
     </div>
<?php
  } else if( $select == 1 && $userEmail == $selectedApplicant && $paymentClear == 1 && $employeeFinished == 1 ){
?>
   <div class="alert alert-warning fade in">
        <strong>Job Completed Verification Pending!</strong> Please wait until the owner verify your work.
    </div>
  <?php } 
  ?>
  
    
<!----------------------- DATA --------------->    
    
<div class="well well-lg" style="margin-top: 10px">   
     <div class="row">
    
    
            <div class="col-md-2">
                                <div class="col-sm-12 col-md-12 text-center">
                                    <strong><span class="text-center input-lg">
                                                <?php
                                                    if($owner != 0 ){
                                                ?>
                                                Owner
                                                <?php } 
                                                    else { ?>
                                                Applicant
                                                <?php } ?>
                                    </span></strong>

                                    <hr class="small">  

                                        <?php
                                                $jobClose = jobIsClose($jobID);
                                                $numApp = numApplications($jobID);
                                                if ($owner != 0){
                                        ?>
                                        <a href="#viewApplication" data-toggle="modal" data-target="#viewApplication" class="btn btn-sm btn-warning btn-block">
                                            View Applications <span class="badge"><?php echo $numApp ?></span></a>

                                        <a href="#editPost" data-toggle="modal" data-target="#editPost" class="btn btn-sm btn-warning btn-block <?php if($jobClose == 1 ||  $selectedApplicant != 'na') { echo "disabled"; }?>">
                                            <i class="icon-hand-right"></i>Edit
                                        </a>

                                        <?php if($jobClose != 1) {?>
                                        <a href="#closePost" data-toggle="modal" data-target="#closePost" class="btn btn-sm btn-warning btn-block <?php if( $selectedApplicant != 'na') { echo "disabled"; }?>">
                                                    <i class="icon-hand-right"></i>Close Job
                                        </a>
                                        <?php  }
                                        else{ ?>
                                        <a href="#openPost" data-toggle="modal" data-target="#openPost" class="btn btn-sm btn-warning btn-block <?php if($select == 1 || $selectedApplicant != 'na') { echo "disabled"; }?>">
                                                    <i class="icon-hand-right"></i>Open Job
                                        </a>
                                        <?php
                                            }
                                        }
                                        else { ?> 
                                            <a href="#confirmApplication" data-toggle="modal" data-target="#confirmApplication" class="btn btn-sm btn-warning btn-block <?php if($existApplication != 0 || $jobClose == 1) { echo "disabled"; }?>">
                                                <i class="icon-hand-right"></i> 
                                            <?php 
                                                if($jobClose == 1){
                                                    echo "Post Closed";
                                                }
                                                else {
                                                    if ($existApplication != 0) 
                                                        {echo "Applied";}
                                                    else 
                                                        {echo "Apply"; }
                                                }
                                            ?>
                                            </a>
                                        <?php } ?>


                                        </span>
                                        <hr class="small"> 
       
                                    <?php
                                    if ( $finished != 1){
                                        if($select == 1 && $userEmail == $selectedApplicant && $paymentClear == 1){
                                        ?>
                                            <form id="completeApplicant" class="form-horizontal" action="#" name="completeApp" method="POST">
                                                <button name="completeJobApp" class="btn btn-success <?php if($employeeFinished == 1 ) { echo "disabled"; }?>" type="submit">Complete</button>
                                            </form>
                                        <?php } ?>

                                        <?php 
                                        if($select == 1 && $owner == 1 && $selectedApplicant != 'na' && $paymentDone == 1 && $paymentStatus == 1 && $paymentClear == 1 &&  $needEmployerVerification == 1 ) { 
                                        ?>
                                            <form id="completeJobOwner" class="form-horizontal" action="#" name="completeApp" method="POST">
                                                <button name="completeJobOwner" class="btn btn-success <?php if($employeeFinished == 1 && $employerVerified == 1 ) { echo "disabled"; }?>" type="submit">Complete</button>
                                            </form>                

                                        <?php }
                                    }elseif ($reviewSubmit == 0) { ?>

                                            <a href="#newReview" data-toggle="modal" data-target="#newReview" class="btn btn-success">
                                                            <i class="icon-hand-right"></i>Leave a Review
                                            </a>      

                                    <?php
                                    }
                                    ?>    
                                        
                                </div>




            </div>
    
    
    <div class="col-md-8">

    <div class="panel panel-info">    

        <div class="panel-heading" style="text-align: center"><h2></span>&nbsp <b> <?php echo $title = getJobTitle($jobID);?> <span class="badge"><?php echo $numApp;?></span> </b></h2></div>
                    <div class="row">
                        
                        <div class="col-xs-6 col-md-12 myHeaderInbox" style="text-align:center; margin-top: 15px">
                            About this job
                              
                        </div>
                        <div class="col-xs-6 col-md-12" style="padding-right: 25px; padding-left: 25px; padding-top: 10px;">
                        
                             <?php
                                    echo $description = getJobDescription($jobID);
                                ?>
                        </div>
                        
                        
                            <div class="col-xs-6 col-md-12">
                                <span style="font-size: 15px;  margin-right: 25px; float: right; margin-top: 15px;">    
                                    <span style="font-weight: bold">
                                        <?php
                                            echo "Payment: ";
                                        ?>
                                    </span>
                                    <?php
                                        echo "$";
                                        echo $payment = getJobPayment($jobID);
                                    ?>
                                </span>        
                            </div>
                    
                  
                            <div class="col-xs-6 col-md-12">
                                    <span style="font-size: 11px; font-style: italic;  margin-right: 25px; float: right; margin-bottom: 10px;">    
                                        <span style="font-weight: bold">
                                        <?php
                                            echo "Category: ";
                                        ?>
                                        </span>
                                        <?php    
                                            echo $category = getJobCategory($jobID);                                            
                                        ?>
                                    </span>
                             </div>
                        
                        
                        
                    
                    </div>
        
        

                 
                    <!-- /.row (nested) -->
                </div>
                
                <?php include ('confirmPaymentModal.php'); ?>
                <?php include ('confirmApplication.php'); ?>
                <?php include('editPost.php'); ?>
                <?php include('closeJobModal.php'); ?>
                
                <?php include('viewAppModal.php'); ?>
                <?php //include('selectApplicantConfirmationModal.php'); ?>
                <?php include('openJobModal.php'); ?>
                <?php include('newReviewModal.php'); ?>
                <!-- /.col-lg-10 -->
                
            </div>
    
         <div class="col-md-2">
             <div class="panel panel-default">
                 
                  <div class="panel-body">
                      
                                   
                      
                        <?php

                        
                             If(!empty(displayMyImage(getJobOwner($jobID))))
                                                echo '<div style="display: block; margin-left: 24px">' . '<img  class="img-circle" height="75" width="75" src="data:image/jpeg;base64,'.base64_encode(displayMyImage(getJobOwner($jobID))).'"alt="User-ImG">' . '&nbsp&nbsp' . '</div>';
                                        
                              else
                                echo '<div style="display: block; margin-left: 24px">' . '<img  class="img-circle" height="75" width="75" class="img-circle" src="img/user-icon.jpg" alt="User-ImG">' . '</div>';





                       ?>
                      
                     <div style="text-align: center;">
                         <?php

        echo '<a href="viewmyprofile.php?userID='.getID(getJobOwner($jobID)).'" style="text-align: left; font-weight: 700; font-size: 17px;">' . getFirstName(getJobOwner($jobID)) . '</a>';  


                        ?>
                    </div>
                      
                  </div>
                 
                 <div class="panel-footer">
    
                      <?php


                                $jobowerEmail = getJobOwner($jobID);

                                 $owerJobID = getID($jobowerEmail);
                                if($owner == 0)               
                                echo '<a class="btn btn-default" href="conversation.php?userID='.$owerJobID.'&'.'j='.$jobID.'" role="button"><span class="glyphicon glyphicon-envelope"></span>&nbsp&nbsp Contact Me</a>'
                                    
                                //echo '<a class="btn btn-light btn-s" href="conversation.php?userID='.$owerJobID.'&'.'j='.$temp.'" role="button"><span class="glyphicon glyphicon-envelope"></span></a>';
                                    
                               
                       ?>
                     
                 
                 
                 </div>
                 <div class="row">
                        <div class="col-sm-10 col-lg-push-4">
                    <?php  if ($select == 1 && $owner == 1 && $selectedApplicant != 'na' && $paymentStatus == 0) { ?>
                    
                        <a href="#confirmPayment" data-toggle="modal" data-target="#confirmPayment">    
                        <button type="button" class="btn btn-success">Read Terms</button>
                        </a>
                    <?php } elseif ($select == 1 && $owner == 1 && $selectedApplicant != 'na' && $paymentStatus == 1){
                        ?>
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="AKKK98HQR4UVU">
                            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                        </form>

                    <?php
                    } ?>
                    </div>  
             </div>
             
             

        </div>
            
             
                    
        </div><!-- /.row -->
        <!-- /.container -->
    </div>  <!-- /.WEll -->

</div>


    <footer style="text-align: center;">

                <ul class="list-inline">
                  <li><a href="about.php">About</a></li>
                  <li><a href="help.php">Help</a></li>
                  <li><a href="#">Directory</a></li>
                  <li><h5 style="color: #aab8c2">&#169 2015 ServiceU, Inc, All rights reserved.</h5></li>
                </ul>
         
    </footer>
    




<!--------- NEED TO BE ADDED TO ALL DOCUMENT FROM HERE -------->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootbox.js"></script>
    <script src="js/bootbox.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


    <!-- Custom for project -->
    <script src="js/editProfileactions.js"></script>
    
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
        
        
        $(document)  
        .on('show.bs.modal', '.modal', function(event) {
          $(this).appendTo($('body'));
        })
        .on('shown.bs.modal', '.modal.in', function(event) {
          setModalsAndBackdropsOrder();
        })
        .on('hidden.bs.modal', '.modal', function(event) {
          setModalsAndBackdropsOrder();
        });

        function setModalsAndBackdropsOrder() {  
          var modalZIndex = 1040;
          $('.modal.in').each(function(index) {
            var $modal = $(this);
            modalZIndex++;
            $modal.css('zIndex', modalZIndex);
            $modal.next('.modal-backdrop.in').addClass('hidden').css('zIndex', modalZIndex - 1);
        });
          $('.modal.in:visible:last').focus().next('.modal-backdrop.in').removeClass('hidden');
        }

            

    $('#confirmApplicant').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var bookId = $(e.relatedTarget).data('book-id');

    //populate the textbox
    $(e.currentTarget).find('input[name="bookId"]').val(bookId);
});

</script>

    
</body>
</html>
