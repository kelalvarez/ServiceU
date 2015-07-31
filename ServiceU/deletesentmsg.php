<?php 
    include("DatabaseFunctions.php"); 
    include("functions.php");
?>


<?php
    if(!empty(isset($_GET['dID'])) && !empty(isset($_GET['jID'])))
        {
       
            //PROMPT THE USER IF WANTS TO DELETE OR CANCEL
            /*$message = "This will delete your experience, are you sure?";
            echo "<script type='text/javascript'>
            
                    if(confirm('$message') == true){               
                            
                    }
            
            </script>";*/
        
           $inboxID = $_GET["dID"];
           $jobID = $_GET['jID'];
        
           moveMessageToDeleteByID($inboxID, $jobID);
           echo "<meta http-equiv='refresh' content='0;url=sent.php'>";
        
         
        }


?>