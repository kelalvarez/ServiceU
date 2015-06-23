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

function drawStars($numStars){
    if($numStars > 5){
        echo "Not Specified";
    }
    else {
        $totalStars = 5;
        $blankStars = $totalStars - $numStars;
        
        for($i = 0; $i < $numStars; $i++){
            echo '<span class="glyphicon glyphicon-star"></span>';
        }
        for($j = 0; $j < $blankStars ; $j++){
            echo '<span class="glyphicon glyphicon-star-empty"></span>';
        }   
    }    
}

function isRecommended($answer){
    if($answer == "yes"){
        echo ' <span class="glyphicon glyphicon-thumbs-up"></span> <strong><span style="color: green;">Yes</span></strong>';
    }
    else if ($answer == "no"){
        echo ' <span class="glyphicon glyphicon-thumbs-up"></span> <strong><span style="color: red;">No</span></strong>';
    }
    else{
        echo "Not specified";
    }
           
        
    
}

?>