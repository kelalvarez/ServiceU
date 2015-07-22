<?php 
    include("DatabaseFunctions.php"); 
    include("functions.php");
?>


<?php
    if(isset($_GET['eduID']))
        {
        
            //PROMPT THE USER IF WANTS TO DELETE OR CANCEL
            /*$message = "This will delete your experience, are you sure?";
            echo "<script type='text/javascript'>
            
                    if(confirm('$message') == true){               
                            
                    }
            
            </script>";*/
        
            $deleteID = $_GET["eduID"];       
            deleteUserEducation($deleteID);
            echo "<meta http-equiv='refresh' content='0;url=degree.php'>";
        
         
        }


?>