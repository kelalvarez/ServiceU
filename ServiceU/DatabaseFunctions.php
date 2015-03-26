<?php

// Change it if necessary for your localhost
$con=mysqli_connect("localhost","root","","serviceU");

function register($email, $password, $firstName, $lastName)
{
    global $con;
        
    mysqli_query($con,
                "INSERT INTO userTable (email, firstName, lastName, password) "
                . "values('$email', '$firstName', '$lastName', '$password');"
                );
    return TRUE;    
}


function emailAvailable($email) {
    global $con;

    $result = mysqli_query($con,
		"SELECT email 
		 FROM userTable
		 WHERE email = '$email'"
    );

    if (mysqli_num_rows($result) > 0)
	return FALSE;
    else
    	return TRUE;
}

function validateLogin($email, $password) {
    global $con;

    $query = "SELECT * FROM userTable
		WHERE email = '$email'
		AND password = '$password'";

    $result = mysqli_query($con, $query);
        
    if (mysqli_num_rows($result) > 0)
	return TRUE;
    else
	return FALSE;
}

function getEmail($userID){
    global $con;

    $query = "SELECT email FROM userTable
        	WHERE userID = '$userID'";

    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
        
    return $row['email'];
}

function getFirstName($userID){
    global $con;

    $query = "SELECT firstName FROM userTable
              WHERE userID = '$userID'";

    $result = mysqli_query($con, $query);        
    $row = mysqli_fetch_assoc($result);
        
    return $row['firstName'];        
}

function getLastName($userID){
    global $con;

    $query = "SELECT lastName FROM userTable
              WHERE userID = '$userID'";

    $result = mysqli_query($con, $query);        
    $row = mysqli_fetch_assoc($result);
        
    return $row['lastName'];
}

function getFullName($userID){
    global $con;

    $query = "SELECT firstName, lastName FROM userTable
              WHERE userID = '$userID'";

    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
        
    return $row['firstName'] . " " . $row['lastName'];    
}

function checkVerification($userID){
    global $con;
        
    $query = "SELECT verify FROM userTable 
              WHERE userID = '$userID'";
        
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
        
    if($row['verify'] == 1)
        return TRUE;
    else
        return FALSE;
}

function getDegree($userID){
    global $con;

    $query = "SELECT degree FROM userTable
              WHERE userID = '$userID'";

    $result = mysqli_query($con, $query);        
    $row = mysqli_fetch_assoc($result);
        
    return $row['degree'];    
}

function getInterests($userID){
    global $con;

    $query = "SELECT interest FROM userTable
              WHERE userID = '$userID'";

    $result = mysqli_query($con, $query);        
    $row = mysqli_fetch_assoc($result);
        
    $interest = $row['interest'];
        
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

    function editDegree($userID, $newDegree){
    global $con;
    
    $query = "UPDATE userTable SET degree = '$newDegree' WHERE userID = '$userID'";
    
    $result = mysqli_query($con, $query);
    
    if($result == 1)
        return TRUE;
    else
        return FALSE;

}




