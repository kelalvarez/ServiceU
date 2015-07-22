<!DOCTYPE html>
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
        selectApplicant($applicantEmail, $jobID);
        $appSubmit = 1;
        $jobT = getJobTitle($jobID);
         newNotification( $applicantEmail , "<strong> ". $jobT ." </strong> :: You have been selected for the job. <a href=\"postComplete.php?jobID=" . $jobID . "\" target=\"_parent\">Click here </a> to review job" );

    } 
    
    $yes = 0;
    if (isset($_POST['yesApplicant'])) {
        $applicantEmail = $userEmail;
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

</head>

    
<body>

    <!-- Navigation Sidebar -->
    <?php include 'navigationbar.php' ?>

<div class="container">
    

<div class="well text-center">

    <h3><strong>Job Information</strong></h3>

</div>    
<?php 
    $owner = isOwner($userEmail, $jobID);
    $existApplication = existApp($userEmail, $jobID);


    if ($appSubmit == 1) { ?> 
            <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> You have selected applicant <?php echo getFullName($applicantEmail); ?> to complete the Job.
        
      </div>
<?php } ?>

<?php 
  $select = isSelected($jobID);
  $currentSelected = isApplicantSelected($userEmail, $jobID);
  if ($select == 1 && $owner == 1 && $no != 1 & $yes != 1) {
?>
    <div class="alert alert-warning">
        <strong>Confirmation Pending!</strong> You have already selected an applicant for this job
    </div>
    
<?php
  }
  else if( $select == 1 && $currentSelected == 1 && $no != 1 && $yes != 1){
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
<?php
  }else if( $select == 1 && $currentSelected == 1 && $no == 1){ ?>
    <div class="alert alert-success fade in">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       <strong>Denied!</strong> You have successfully denied the job.
     </div>     
<?php
  }else if( $select == 1 && $currentSelected == 0){ ?>
    <div class="alert alert-danger fade in">
       <strong>Job Closed!</strong>
     </div>     
<?php
  }else if( $select == 1 && $currentSelected == 1){ ?>
    <div class="alert alert-success fade in">
       <strong>Job Accepted!</strong>
     </div>     
<?php
  }
?>
    
  
    
<!----------------------- DATA --------------->    
    
    
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

        <a href="#editPost" data-toggle="modal" data-target="#editPost" class="btn btn-sm btn-warning btn-block <?php if($jobClose == 1) { echo "disabled"; }?>">
            <i class="icon-hand-right"></i>Edit
        </a>

        <?php if($jobClose != 1) {?>
        <a href="#closePost" data-toggle="modal" data-target="#closePost" class="btn btn-sm btn-warning btn-block">
                    <i class="icon-hand-right"></i>Close Job
        </a>
        <?php  }
        else{ ?>
        <a href="#openPost" data-toggle="modal" data-target="#openPost" class="btn btn-sm btn-warning btn-block <?php if($select == 1) { echo "disabled"; }?>">
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
</div>
                
                  
                  

    </div>
    <div class="col-md-10">

    <div class="well well-lg">    

                <!---
                <div class="col-lg-10 col-lg-offset-1">-->
 
                        <div class="row">
                            <div class="col-sm-10 col-lg-push-4">
                                <h1><span style="font-weight: bold">
                                    <?php 
                                        echo $title = getJobTitle($jobID);
                                    ?>
                                </span>

                                <span class="badge">
                                    <?php
                                        echo $numApp;
                                    ?>
                                </span>
                                </h1>

                            </div>
                        </div>
                    <br>
                        <div class="row">
                            <span class="input-sm"><strong>Description</strong></span>
                            <br>
                                <?php
                                    echo $description = getJobDescription($jobID);
                                ?>
                        </div>
                    <br>
                        <div class="row">
                            <div class="col-md-4 col-lg-push-7">
                                <span style=" font-size: 15px;">    
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
                        </div>
                        <div class="row">
                                    <div class="col-md-4 col-lg-push-7">
                                    <span style="font-size: 11px; font-style: italic ;">    
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
                
              
                <?php include ('confirmApplication.php'); ?>
                <?php include('editPost.php'); ?>
                <?php include('closeJobModal.php'); ?>
                
                <?php include('viewAppModal.php'); ?>
                <?php include('selectApplicantConfirmationModal.php'); ?>
                <?php include('openJobModal.php'); ?>
                <!-- /.col-lg-10 -->
                
            </div>
            <!-- /.row -->
             
                    
        </div>
        <!-- /.container -->
        

</div>







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
