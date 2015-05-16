<?php

include("DatabaseFunctions.php"); 
include('functions.php');

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
    <?php 
    echo "<script>";

    echo " function autoRefresh()";
    echo "{";
    echo "	window.location = window.location.href;";
    echo "}";

    echo "setInterval('autoRefresh()', 10000); ";
    echo "</script>";
    ?>
    
</head>

    
<body>

<?php 

    $result = getJob();

    if (!$result) {
    echo "Could not successfully ";
    }
     
    if (mysqli_num_rows($result) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
    }

    while ($row = mysqli_fetch_assoc($result)) {
        
        
        echo "<div class=\"panel panel-default\">";
        echo "<div class=\"panel-heading bg-primary \" style=\"font-weight: bold\">";
            echo $row["jobTitle"];
            echo "&nbsp;&nbsp;&nbsp;<span class=\"badge\">";
            echo numApplications($row["jobID"]);
            echo "</span>";
        echo "</div>";
        echo "<div class=\"panel-body well-sm\">";

            echo "<div class=\"col-md-4 col-lg-offset-2\">";
                    echo "<span style=\"font-weight: bold\"> Description: </span> ";
                    echo $row["jobDescription"];
            
            echo "</div>";
            echo "<div class=\"col-md-4 \"> ";
                echo "<span style=\"font-weight: bold\"> Payment: </span> $";
                echo $row["payment"];
            echo "</div>";
            
            echo "<div class=\"col-md-4 small\"> ";
            echo "<span style=\"font-weight: bold\"> Category: </span> ";
            echo "<span style=\"font-style: italic;\">";
            echo $row["category"];
            echo "</span></div>";

        echo "</div>";
        echo "</div>";

    }    
    
?>


</body>
