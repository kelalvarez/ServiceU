<?php

// Change it if necessary for your localhost
$con=mysqli_connect("localhost","root","","serviceu");

function register($email, $firstName, $lastName, $password)
{
    global $con;
        
    mysqli_query($con,
                "INSERT INTO userTable (email, firstName, lastName, password) "
                . "values('$email', '$firstName', '$lastName', '$password');"
                );
    
    mysqli_query($con,
                "INSERT INTO degreeTable (emailID) "
                . "values('$email');"
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

function getFirstName($userEmail){
    global $con;

    $query = "SELECT firstName FROM userTable
              WHERE email = '$userEmail'";

    $result = mysqli_query($con, $query);        
    $row = mysqli_fetch_assoc($result);
        
    return $row['firstName'];        
}

function getLastName($userEmail){
    global $con;

    $query = "SELECT lastName FROM userTable
              WHERE email = '$userEmail'";

    $result = mysqli_query($con, $query);        
    $row = mysqli_fetch_assoc($result);
        
    return $row['lastName'];
}

function getFullName($userEmail){
    global $con;

    $query = "SELECT firstName, lastName FROM userTable
              WHERE email = '$userEmail'";

    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
        
    return $row['firstName'] . " " . $row['lastName'];    
}

function checkVerification($userEmail){
    global $con;
        
    $query = "SELECT verify FROM userTable 
              WHERE email = '$userEmail'";
        
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
        
    if($row['verify'] == 1)
        return TRUE;
    else
        return FALSE;
}

function verifyPassword($userEmail, $potentialPassword)
{
    global $con;
	
    $result = mysqli_query($con,"SELECT password from userTable WHERE email='$userEmail'");
    $row = mysqli_fetch_assoc($result);
    if ($row['password'] == $potentialPassword){
	return true;
    }
    else {
	return false;
    }
}

function editPassword($userEmail, $newPassword)
{
    global $con;

    $result = mysqli_query($con, "UPDATE userTable SET password='$newPassword' WHERE email='$userEmail';");
    return $result;
    
    
}

function getDegree($userEmail){
    global $con;

    $query = "SELECT degree FROM userTable
              WHERE email = '$userEmail'";

    $result = mysqli_query($con, $query);        
    $row = mysqli_fetch_assoc($result);
    
    $nrDegree = $row['degree'];
    
    if( $nrDegree == 0)
    {
        return "Not defined";
    }
    else{
        
        $query2 = "SELECT degree1, degree2, degree3, degree4 FROM degreetable
              WHERE emailID = '$userEmail'";

        $result2 = mysqli_query($con, $query2);        
        $row2 = mysqli_fetch_assoc($result2);
        
        $res = $row2['degree1'];
        return $res;
    }
    
}

function getInterests($userEmail){
    global $con;

    $query = "SELECT interest FROM userTable
              WHERE email = '$userEmail'";

    $result = mysqli_query($con, $query);        
    $row = mysqli_fetch_assoc($result);
        
    $interest = $row['interest'];
        
    return $interest;
}

 function editDegree1($userEmail, $newDegree){
    global $con;
    
    $query = "UPDATE degreeTable SET degree1 = '$newDegree' WHERE emailID = '$userEmail'";
    
    $result = mysqli_query($con, $query);
    
    
    
    if($result == 1){
        $query1 = "UPDATE userTable SET degree = 1 WHERE email = '$userEmail'";
        $result1 = mysqli_query($con, $query1);
        return TRUE;
    }
    else
        return FALSE;

}

 function editDegree2($userEmail, $newDegree){
    global $con;
    
    $query = "UPDATE degreeTable SET degree2 = '$newDegree' WHERE emailID = '$userEmail'";
    
    $result = mysqli_query($con, $query);
    
    if($result == 1)
        return TRUE;
    else
        return FALSE;

}

 function editDegree3($userEmail, $newDegree){
    global $con;
    
    $query = "UPDATE degreeTable SET degree3 = '$newDegree' WHERE emailID = '$userEmail'";
    
    $result = mysqli_query($con, $query);
    
    if($result == 1)
        return TRUE;
    else
        return FALSE;

}

 function editDegree4($userEmail, $newDegree){
    global $con;
    
    $query = "UPDATE degreeTable SET degree4 = '$newDegree' WHERE emailID = '$userEmail'";
    
    $result = mysqli_query($con, $query);
    
    if($result == 1)
        return TRUE;
    else
        return FALSE;

}

function insertInterest($userEmail, $newInterest)
{
    global $con;
    
    $interests = getInterests($userEmail);
    
    if($interests == "na"){
        $query = "UPDATE userTable SET interest = '$newInterest' WHERE email = '$userEmail'";
    }
    else{
        $interests = $interests . ", " . $newInterest;
        $query = "UPDATE userTable SET interest = '$interests' WHERE email = '$userEmail'";
    }
        
    $result = mysqli_query($con, $query);
    
    if($result == 1)
        return TRUE;
    else
        return FALSE;
}

function numberofJobs()
{
    global $con;
    
     mysqli_query($con, "SELECT COUNT(*) FROM jobTable");
    
    return TRUE;       
}

function numApplications($jobID){
    global $con;
    
    $query = "SELECT totalApp FROM jobTable
              WHERE jobID = '$jobID'";

    $result = mysqli_query($con, $query);        
    $row = mysqli_fetch_assoc($result);
        
    $total = $row['totalApp'];
        
    return $total;
}

function getJob()
{
    global $con;

    $query = "SELECT * FROM jobTable";
    $result = mysqli_query($con, $query);        
    
    return $result;
}

