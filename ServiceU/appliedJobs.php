<?php

include("DatabaseFunctions.php"); 
include('functions.php');

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
    
    <head>

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

<?php 
    
    $result = getUserApps($userEmail);

    if (!$result) {
    echo "Could not  successfully ";
    }
     
    if (mysqli_num_rows($result) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
    }
    ?>
    
    <form action="site2.php" method="post">
    <?php     
    while ($row = mysqli_fetch_assoc($result)) {
        
        
        echo "<div class=\"panel panel-default\">";
        echo "<div class=\"panel-heading bg-primary \" style=\"font-weight: bold\">";
            //echo "<a href=\"#postInformation\" data-toggle=\"modal\" data-target=\"#postInformation\" data-job-id=\"";
            //echo "<a href=\"services.php?jobID=\"";
            //echo "<button id=\"btnPopModal\">";
            $jobID = $row['jobID'];
            //echo $postID;
            //echo "\">";
            echo "<a href=\"postComplete.php?jobID=";
            echo $jobID;
            echo "\" target=\"_parent\">";
            echo $row["jobTitle"];
            echo "</a>";
            //echo "</button>";
            echo "&nbsp;&nbsp;&nbsp;<span class=\"badge\">";
            echo numApplications($row["jobID"]);
            echo "</span>";
        echo "</div>";
        
        echo "<div class=\"panel-body well-sm\">";

            echo "<div class=\"col-md-4 col-lg-offset-2\">";
                    echo "<span style=\"font-weight: bold; font-size:12px\"> Description: </span><br>";
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    echo "<span style=\"font-size:12px\">";
                    echo $row["jobDescription"];
                    echo "</span>";
            echo "</div>";

        echo "</div>";
        echo "</div>";

    }    
    
?>
    </form>

    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootbox.js"></script>   
    <script src="js/bootbox.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    
    <!-- Custom for project -->
    <script src="js/editProfileactions.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


</body>