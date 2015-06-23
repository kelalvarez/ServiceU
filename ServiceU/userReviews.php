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


    if(isset($_GET['employeeEmail']) && isset($_GET['jobID']))
    {
        $employeeEmail = $_GET['employeeEmail'];
        $jobID = $_GET['jobID'];
        
        $is = isOwner($userEmail, $jobID);
        if($is == 0 ){
            header("location: errorAccess.php");
            exit();
        }
        
        $has = hasApplied($employeeEmail, $jobID);
        if($has == 0 ){
            header("location: errorAccess.php");
            exit();
        }
    }
    else{
        header("location: errorAccess.php");
        exit();
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

    <h3><strong>User Review</strong></h3>
    
    <a href="postComplete.php?jobID=<?php echo $jobID ?>">Go back to Post</a>

</div>    
    
<div class="row">
<div class="col-md-2">
<div class="col-sm-12 col-md-12 text-center">
    <strong><span class="text-center input-lg">
             Sort by
    </span></strong>
                    
    <hr class="small">
    <a href="#viewApplication" data-toggle="modal" data-target="#viewApplication" class="btn btn-sm btn-warning btn-block">
        <Strong>ALL</strong>
    </a>
    
    <a href="#viewApplication" data-toggle="modal" data-target="#viewApplication" class="btn btn-sm btn-warning btn-block">
        <?php for($i = 0; $i < 5 ; $i++){ ?>
        <span class="glyphicon glyphicon-star"></span>
        <?php } ?>
    </a>
    
    <a href="#viewApplication" data-toggle="modal" data-target="#viewApplication" class="btn btn-sm btn-warning btn-block">
        <?php for($i = 0; $i < 4 ; $i++){ ?>
        <span class="glyphicon glyphicon-star"></span>
        <?php } ?>
    </a>
    
    <a href="#viewApplication" data-toggle="modal" data-target="#viewApplication" class="btn btn-sm btn-warning btn-block">
        <?php for($i = 0; $i < 3 ; $i++){ ?>
        <span class="glyphicon glyphicon-star"></span>
        <?php } ?>
    </a>
    
    <a href="#viewApplication" data-toggle="modal" data-target="#viewApplication" class="btn btn-sm btn-warning btn-block">
        <?php for($i = 0; $i < 2 ; $i++){ ?>
        <span class="glyphicon glyphicon-star"></span>
        <?php } ?>
    </a>
    
    <a href="#viewApplication" data-toggle="modal" data-target="#viewApplication" class="btn btn-sm btn-warning btn-block">
        <span class="glyphicon glyphicon-star"></span>
    </a>


             
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

                            <?php echo getFullName($employeeEmail); ?>
                            <br>                                
                    </span>
                    </h1>
                            <?php 
                                drawStars(getRate($employeeEmail));
                            ?>
                            
                            <a href="#newReview" data-toggle="modal" data-target="#newReview" class="btn btn-sm btn-warning">
                                <i class="icon-hand-right"></i>Edit
                            </a>        
                    
                </div>
            </div>
           <div class="row">
                            <span class="input-sm"><strong> </strong></span>
                            <br>
                            <!------ Review Section ------------->    
                            <table class="table table-striped">
                            <?php //nroCommentStars($userEmail, $num) 
                                
                                $nroComments = getNroComments($employeeEmail);
                                if ( $nroComments == 0){
                                    echo "No comments available";
                                }
                                else {
                                $result = getComments($employeeEmail);
                                
                                
                                
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr><td class="col-md-3">';
                            ?>   
                                <div class="row">
                                    <div class="col-xs-4 col-md-6">                            
                            <?php        
                                    echo "Punctuality<br>";    
                                    drawStars($row['punctualityStars']);
                                
                                    echo "<br><br>Performance<br>";    
                                    drawStars($row['performanceStars']);
                            ?>        
                                    </div>
                                    <div class="col-xs-4 col-md-6">  
                                        <br>
                            <?php           
                                    echo "<strong>Overall Rating</strong>";
                                    echo "<br>";
                                    drawStars($row['stars']);
                            ?>
                                    </div>
                                </div>
                            <?php        
                                    echo "</td>";
                                    
                                    echo "<td>";
  
                                    $date = date_create( $row['entryDate']);
                                    echo date_format($date, 'm/d/Y H:i');
                                    
                                    echo "<br>By: ";
                                    echo getFullName($row['senderID']);
                                    
                                    
                                    echo "<br><br>";
                                    echo $row['comment'];
                                    echo "<br><br>";
                                    echo "<strong>Would you recommend this service?</strong>";
                                    echo "<br>";
                                    isRecommended($row['recommend']);
                                    
                                    echo "</td></tr>";
                                }
                            
                            ?>
                            
                            </table>
                            
                            
                                <?php } ?>
                        </div>
                        

                </div>
                <?php include('newReviewModal.php'); ?>
            </div>   

        </div>
    
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

   $('[data-dismiss=modal]').on('click', function (e) {
        var $t = $(this),
            target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];

      $(target)
        .find("input,textarea")
           .val('')
           .end();
   
      $('select option:first-child').attr("selected", "selected");
      $('input[name=puncRadio]').attr('checked',false);
      $('input[name=overRadio]').attr('checked',false);
      $('input[name=recomRadio]').attr('checked',false);
      $('input[name=perfRadio]').attr('checked',false);
      
    });
    </script>
    
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
        
    </script>

    
</body>
</html>
