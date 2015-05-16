<?php

function stripInterest($interest){
        
    if (stripos($interest, ",") !== false) {
        $r = " ";
        $multipleInterests = explode(',', $interest);
        foreach ( $multipleInterests as $i ) {
            $r = $r . $i . "<br/> ";
        }
        return $r;
            
    }    
    else
        return $interest;
    
}

function test_user_input($data) {
              
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}




?>