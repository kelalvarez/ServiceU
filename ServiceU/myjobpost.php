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
    <link href="css/dashboardcss.css" rel="stylesheet">
    <link href="css/myjobpostcss.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

</head>

    
<body>

    <?php 
    
            $result = getUserJobs($userEmail);

            if (!$result) {
            echo "Could not  successfully ";
            }
             
            if (mysqli_num_rows($result) == 0) {
              
            echo '<script type="text/javascript">';
            echo 'alert("You have not created any post yet.")';
            echo '</script>';

            }
    ?>

<!-- Navigation Sidebar -->
    <?php include 'navigationbar.php' ?>

<div class="container">
       
     <div class="well text-center">

    

 

    </div>



   
    
            <div class="row">
              <div class="col-md-2">
                    <p>
                        <a class="btn btn-sm btn-warning btn-block" href="myjobpost.php" ><b>My Job Post</b></a>
                    </p>

                    <p>
                        <a class="btn btn-sm btn-warning btn-block" href="myapplications.php" ><b>My Applications</b></a>
                    </p>

              </div>
              <div class="col-md-10">

                     <div class="well">

                               <header>

                                        <h2 class="wellHeader text-center"><b>My Job Post</b></h2>          
                                                                            
                                </header>
                                   

                                <table class="table table-bordered">

                                    <thead>
                                      <tr>
                                        <th>Job Title</th>
                                        <th>Description</th>
                                        <th>Payment</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                      </tr>
                                    </thead>

                                    <tbody>

                                        <?php     
                                                while ($row = mysqli_fetch_assoc($result)) 
                                                {

                                                  echo '<tr>';

                                                    echo '<td>'. "<a href=\"postComplete.php?jobID=" . $row['jobID'] . "\" target=\"_parent\">" . '<b>' . $row['jobTitle'] . '</b>' . "</a>" . "</td>";
                                                   
                                                    echo '<td>' . '<p class="showHide">' . $row['jobDescription'] . '</p>' . '</td>';
                                                 
                                                    echo '</td>';

                                                    echo '<td>' . '$' . $row['payment'] . '</td>';

                                                    echo '<td>' . $row['category'] . '</td>';

                                                    echo '<td>';

                                                      if($row['closeJob'] == 1)
                                                        echo '<span class="label label-success">Open</span>';
                                                      else
                                                        echo '<span class="label label-danger">Closed</span>';

                                                    echo '</td>';

                                                  echo '</tr>';                                              
                                                
                                                }    
                
                                        ?>


                                    </tbody>

  
                                </table>
                               
                               <div style="text-align:center;">
                                 <?php include('newPost.php'); ?>
                                 <a class="btn btn-success" href="#newPost" data-toggle="modal" data-target="#newPost" role="button">Create Job Now!</a>
                               </div>
                     </div>
              </div>



            </div>

 
</div> <!--End of container-->



<footer style="text-align: center;">

                <ul class="list-inline">
                  <li><a href="#">About</a></li>
                  <li><a href="#">Help</a></li>
                  <li><a href="#">Directory</a></li>
                  <li><h5 style="color: #aab8c2">&#169 2015 ServiceU, Inc, All rights reserved.</h5></li>
                </ul>
         
</footer>

</div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootbox.js"></script>
    <script src="js/bootbox.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>

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
    <!--Start online JSS first-->
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <!--Bootstrap JSS-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <!--Customized JSS-->
    <script src="js/myjs.js"></script>
    
    <!--change acive mode in the navbar-->
    <script> 
        $(".nav a").on("click", function(){
           $(".nav").find(".active").removeClass("active");
           $(this).parent().addClass("active");
        });
    </script>


<script>

    jQuery(function(){

        var minimized_elements = $('p.showHide');
        
        minimized_elements.each(function(){    
            var t = $(this).text();        
            if(t.length < 100) return;
            
            $(this).html(
                t.slice(0,100) + '<span> <b>...</b></span><a href="#" class="more" style="color: black;"><b>More</b></a>' + '<span style="display:none;">'+ t.slice(100,t.length)+' <a href="#" class="less" style="color: black;"><b>Less</b></a></span>'
            );
            
        }); 
        
        $('a.more', minimized_elements).click(function(event){
            event.preventDefault();
            $(this).hide().prev().hide();
            $(this).next().show();        
        });
        
        $('a.less', minimized_elements).click(function(event){
            event.preventDefault();
            $(this).parent().hide().prev().show().prev().show();    
        });

    });

</script>

</body>
</html>
