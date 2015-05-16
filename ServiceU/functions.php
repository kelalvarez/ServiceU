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

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


?>