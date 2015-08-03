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

    $admin = isadmin($userEmail);
    if($admin != 1){
        header("location: index.php");
    }
    
    $chooseClear = 0; 
    $chooseDeny = 0;
    if (isset($_POST['clearPay'])) {
        $chooseClear = 1;
        $jID = $_POST['jobID'];
        $pID = $_POST['paymentID'];
        clearPayment($jID, $pID);
        
        $jobT = getJobTitle($jID);
        $jobO = getJobOwner($jID);
        
        
        
        newNotification( $jobO , "<strong> ". $jobT ." </strong> :: The Payment has been cleared. "
                . "Your applicant has been notified to provide you with the agreed service. "
                . "<a href=\"postComplete.php?jobID=" . $jID . "\" target=\"_parent\">Click here </a> to review the job" ); 
        
        
   
    }
    
    if (isset($_POST['denyPay'])) {
        $chooseDeny = 1;
        $jID = $_POST['jobID'];
        $pID = $_POST['paymentID'];
        

        
        denyPayment($jID, $pID);
        
        $jobT = getJobTitle($jID);
        $jobO = getJobOwner($jID);
        
        newNotification( $jobO , "<strong> ". $jobT ." </strong> :: Your payment has been denied re-submitted again or cancel it. <a href=\"postComplete.php?jobID=" . $jID . "\" target=\"_parent\">Click here </a> to review the job <br>"
                . "If there is a problem, use the contact us page to contact with ServiceU" ); 
   
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
            <?php include('clearPaymentModal.php'); ?> 

<?php if($chooseClear == 1){ ?>
    <div class="alert alert-success fade in">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <strong>Clear Payment Done!</strong> The payment has been successfully cleared.
    </div>    
<?php }elseif ($chooseDeny == 1) {
?>
    <div class="alert alert-success fade in">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <strong>Deny Payment Done!</strong> The payment has been successfully denied.
    </div> 
<?php
    }
?>
    
    
     <div class="well well-lg">

        <div class="row">

            <div class="col-md-1"> <!--Profile start here-->


                <div style="clear: both;" class="">
                   
                      <ul id="Profile-List">

                        <li>
                            <a href="payment.php"><span class="glyphicon glyphicon-option-horizontal"></span>Clearance</a>
                          
                        </li>
                        <li>
                            <a href="paymentcompletes.php"><span class="glyphicon glyphicon-ok"></span>Completed</a>
                        
                        </li>
                    </li>
                        
                                               

                      </ul>
                   

                </div>

            </div>



            
            <!--style="max-width:500px" will reduce the width of the container-->
            <div class="col-md-11">        
               
                <div class="panel panel-info">
                    <div class="panel-heading" style="text-align: center"><h3><span class="glyphicon glyphicon-piggy-bank"></span>&nbsp <b>Payment Clearance List</b></h3></div>
                        <div class="panel-body">
                            
           
                            
                            <div class="panel panel-default">
                              <!-- Default panel contents -->
                              <div class="panel-heading">
                                  
                                <div class="row">
                                    
                                  <div class="col-xs-5 col-md-2 text-center">Owner Name</div>
                                  <div class="col-xs-5 col-md-2 text-center">Owner Email</div>
                                  <div class="col-xs-5 col-md-3 text-center">Job Title</div>
                                  <div class="col-xs-5 col-md-1 text-center">Amount</div>
                                  <div class="col-xs-5 col-md-1 text-center">Status</div>
                                  <div class="col-xs-5 col-md-2 text-center">Action</div>
                                  
                                    
                                </div>

                              </div>
                                    
                              <div class="panel-body">
<?php     
$result = getPayments();


        while ($row = mysqli_fetch_assoc($result)) { 
        ?>
        <div class="row">
        <form id="paymentForm" class="form-horizontal" action="#" name="paymentF" method="POST">

        <div class="col-xs-5 col-md-2">
        <?php
            $jobID = $row['jobID'];
            $isClear = isPaymentClear($jobID, $row['paymentID']);
            $paymentID = $row['paymentID'];
            
            $ID = getID($row['employeerEmail']);
            echo "<a href=\"viewmyprofile.php?userID=" . $ID . "\" target=\"_parent\">";
            echo getFullName($row['employeerEmail'] );
            echo "</a>"
        ?>
        </div>
            
        <div class="col-xs-5 col-md-2 ">
        <?php
            echo $row['employeerEmail'];
        ?>
        </div>    
        <div class="col-xs-5 col-md-3 ">
        <?php
            
            echo "<a href=\"postComplete.php?jobID=" . $row['jobID'] . "\" target=\"_parent\">";
            echo getJobTitle($row['jobID']);
            echo "</a>"
            
        ?>
        </div>
            
        <div class="col-xs-5 col-md-1 text-center">
            <?php
            echo getJobPayment($row['jobID']);
            
            ?>
        </div>        
        <div class="col-xs-5 col-md-1 text-center">
        <?php
            $clearStatus = $row['clearstatus'];
            
            if($clearStatus == 0){ ?>
            <span class="label label-warning">Open</span>
        <?php    
            } elseif($clearStatus == 1){ 
        ?>
            <span class="label label-default">Closed</span>
        <?php
            } elseif($clearStatus == 2){
        ?>
            <span class="label label-danger">Denied</span>
        <?php 
            }
        ?>
        </div>
        <input type="hidden" class="form-control" value="<?php echo $row['jobID'];?>" name="jobID">
        <input type="hidden" class="form-control" value="<?php echo $row['paymentID'];?>" name="paymentID"> 
        <div class="col-xs-5 col-md-2 text-center">
            <?php if($isClear == 0){ ?>
           <button name="clearPay" type="submit"  class="btn btn-xs btn-success"><i class="icon-hand-right"></i>Clear</button>
           &nbsp;
            <button name="denyPay" type="submit"  class="btn btn-xs btn-danger"><i class="icon-hand-right"></i>Deny</button>
            <?php } else{ ?>
            None
            <?php } ?>
        </div>
        </form>
        </div>
                                  <br>
        <?php
            }
        ?>                          
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
                    
        
                            moveMessageToTrash($userEmail);
                    
                                    
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
