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
    
    if (isset($_GET["page"])) { 
        $page  = $_GET["page"];        
    } else { 
        $page=1;  
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
    

<div class="well text-center" style="margin-top: 10px">

    <h3><strong>Notifications</strong></h3>

</div>    
    
<div class="row">

    <div class="col-md-12">

    <div class="well well-lg">    

                <!---
                <div class="col-lg-10 col-lg-offset-1">-->
 
            <div class="row">
                <table class="table table-striped">
                    <?php 
  
                    $start_from = ($page-1) * 10;
                    $rs_result = getNotifications($userEmail, $start_from);

                    while ($row = mysqli_fetch_assoc($rs_result)) {
                             echo '<tr>';

                            echo "<td>";

                            $date = date_create( $row['alertTime']);
                            echo date_format($date, 'm/d/Y  H:i ');
                            echo " ";
                            echo $row['message'];
                            echo "</td></tr>";
                        }
                    echo "</table>";


                    $nroNotifications = getTotalNotifications($userEmail);
                    $total_pages = ceil($nroNotifications / 10);
?>
                    <div class="col-md-2 col-md-offset-5">
                    <?php
                    for ($i=1; $i<=$total_pages; $i++) {
                        ?>
                        <div class="btn-group" role="group">
                        <?php
                                echo "<a class=\"btn btn-mini\" href='notifications.php?page=".$i."'>".$i."</a> ";
                    } 
 ?>

                        </div>
                    </div>
          
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
        
        $(".flip").on("click", function(e) {        
            var target = $(this).attr("href");
            $(target).slideToggle("fast");
            $(".panel").not(target).hide();

            e.preventDefault();
        });

        
    </script>

    
</body>
</html>
