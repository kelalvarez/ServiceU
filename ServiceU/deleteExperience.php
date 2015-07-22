<?php 
    include("DatabaseFunctions.php"); 
    include("functions.php");
?>


<?php
    if(isset($_GET['expID']))
        {
        
            //PROMPT THE USER IF WANTS TO DELETE OR CANCEL
            /*$message = "This will delete your experience, are you sure?";
            echo "<script type='text/javascript'>
            
                    if(confirm('$message') == true){               
                            
                    }
            
            </script>";*/
        
            $deleteID = $_GET["expID"];       
            deleteUserExperience($deleteID);
            echo "<meta http-equiv='refresh' content='0;url=experience.php'>";
        
         
        }


?>