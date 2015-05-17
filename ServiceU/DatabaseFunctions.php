<?php

// Change it if necessary for your localhost
$con=mysqli_connect("localhost","root","","serviceu");

function register($email, $firstName, $lastName, $password)
{
    global $con;
    $code = generateRandomString();
    
    mysqli_query($con,
                "INSERT INTO userTable (email, firstName, lastName, password, verificationCode) "
                . "values('$email', '$firstName', '$lastName', '$password', '$code');"
                );
    
    mysqli_query($con,
                "INSERT INTO degreeTable (emailID) "
                . "values('$email');"
                );
    sendVerificationCode($email, $code);
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

function sendVerificationCode($email, $code){
    require('phpMailer/PHPMailerAutoload.php');

    $mail = new PHPMailer(); 
    $mail->SMTPDebug = 2;
    $mail->IsSMTP(); // send via SMTP
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 2525;
    $mail->SMTPAuth = true; // turn on SMTP authentication

    $mail->Username = "serviceuconfirmation@gmail.com"; // SMTP username
    $mail->Password = "alvarez12"; // SMTP password

    $webmaster_email = "serviceuconfirmation@gmail.com"; //Reply to this email ID
    $email="misha.neko@gmail.com"; // Recipients email ID
    $name=""; // Recipient's name
    $mail->From = $webmaster_email;
    $mail->AddAddress($email,$name);
    $mail->SetFrom('serviceuconfirmation@gmail.com', 'ServiceU Team');
    $mail->WordWrap = 50; // set word wrap

    $mail->IsHTML(true); // send as HTML
    $mail->Subject = "Verification Code";
    $mail->Body = "Welcome to ServiceU,
        <br>
        Here's your verification code: " . $code .  
        "<br>
        <br>Sincerely,
        <br>The ServiceU Team
        <br>"; //HTML Body
    if(!$mail->Send())
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else
    {
        echo "Message has been sent";
    }
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

function verifyCode($userEmail, $code)
{
    global $con;
        
    $query = "SELECT verificationCode FROM userTable 
              WHERE email = '$userEmail'";
        
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
        
    if($row['verificationCode'] == $code)
        return TRUE;
    else
        return FALSE;
}

function verifyAccount($email)
{
    global $con;
    mysqli_query($con,
                "UPDATE userTable SET verify=1 WHERE email ='$email';");
    
    return TRUE;
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
    
    $query1 = "SELECT degree FROM userTable
              WHERE email = '$userEmail'";

    $result1 = mysqli_query($con, $query1);        
    $row1 = mysqli_fetch_assoc($result1);
    
    $nrDegree = $row1['degree'];
    
    if( $nrDegree == 0)
    {
        $query = "INSERT INTO degreeTable (emailID, degree1) "
                . "values('$userEmail','$newDegree')";
    }
    else{
        $query = "UPDATE degreeTable SET degree1 = '$newDegree' WHERE emailID = '$userEmail'";
    }
    
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

function getJob()
{
    global $con;

    $query = "SELECT * FROM jobTable";
    $result = mysqli_query($con, $query);        
    
    return $result;
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

function getJobPost($postID)
{
    global $con;

    $query = "SELECT * FROM jobTable WHERE='$postID'";
    $result = mysqli_query($con, $query);        
    
    return $result;
} 

function getJobDescription($jobID){
    global $con;

    $query = "SELECT jobDescription FROM jobTable
              WHERE jobID = '$jobID'";

    $result = mysqli_query($con, $query);        
    $row = mysqli_fetch_assoc($result);
        
    $jobDescription = $row['jobDescription'];
        
    return $jobDescription;
}

function getJobTitle($jobID){
    global $con;

    $query = "SELECT jobTitle FROM jobTable
              WHERE jobID = '$jobID'";

    $result = mysqli_query($con, $query);        
    $row = mysqli_fetch_assoc($result);
        
    $jobTitle = $row['jobTitle'];
        
    return $jobTitle;
}

function getJobOwner($jobID){
    global $con;

    $query = "SELECT employeerID FROM jobTable
              WHERE jobID = '$jobID'";

    $result = mysqli_query($con, $query);        
    $row = mysqli_fetch_assoc($result);
        
    $employeerID= $row['employeerID'];
        
    return $employeerID;
}

function getJobPayment($jobID){
    global $con;

    $query = "SELECT payment FROM jobTable
              WHERE jobID = '$jobID'";

    $result = mysqli_query($con, $query);        
    $row = mysqli_fetch_assoc($result);
        
    $payment = $row['payment'];
        
    return $payment;
}

function getJobCategory($jobID){
    global $con;

    $query = "SELECT category FROM jobTable
              WHERE jobID = '$jobID'";

    $result = mysqli_query($con, $query);        
    $row = mysqli_fetch_assoc($result);
        
    $jobCategory = $row['category'];
        
    return $jobCategory;
}

function existApp($emailApp, $jobID){
    global $con;
    
    $query = "SELECT COUNT(*) as total FROM appTable"
            . " WHERE jobID='$jobID' AND employeeID='$emailApp'";
    
    $result = mysqli_query($con, $query);        
    $row = mysqli_fetch_assoc($result);
    
    return $row['total'];

    
}

function submitApp($email, $jobID){
    global $con;
    
    $num = numApplications($jobID) + 1;
    
    newTotalApp($jobID, $num);
    
    mysqli_query($con,
                "INSERT INTO appTable (jobID, employeeID, orderApp)"
                . "values('$jobID', '$email', '$num');"
                );
    
    return TRUE;
    
}

function newTotalApp($jobID, $num){
    global $con;
    
    $query = "UPDATE jobTable SET totalApp = '$num' WHERE jobID = '$jobID'";
    mysqli_query($con, $query);
    
    return TRUE;
}

function isOwner($email, $jobID){
    global $con;
    
    $query = "SELECT COUNT(*) as total FROM jobTable"
            . " WHERE employeerID = '$email' AND jobID = '$jobID'";
    $result = mysqli_query($con, $query);        
    $row = mysqli_fetch_assoc($result);
    
    return $row['total'];
}

function createPost($email, $jobTitle, $jobDescription, $jobPayment, $jobCategory){
    global $con;

    mysqli_query($con,
                "INSERT INTO jobTable (employeerID,jobTitle, jobDescription, payment, category)"
                . "values('$email', '$jobTitle', '$jobDescription', '$jobPayment', '$jobCategory');"
                );
    
    return TRUE;
    
}

function updatePost($jobID, $jobTitle, $jobDescription, $jobPayment, $jobCategory){
    global $con;
    
    $query = "UPDATE jobTable SET jobTitle ='$jobTitle', jobDescription='$jobDescription', "
            . " payment='$jobPayment', category='$jobCategory' WHERE jobID = '$jobID'";
    mysqli_query($con, $query);
    
    return TRUE;
    
    
}

function getUserJobs($email)
{
    global $con;

    $query = "SELECT * FROM jobTable WHERE employeerID='$email'";
    $result = mysqli_query($con, $query);        
    
    return $result;
}

function getUserApps($email)
{
    global $con;

    $query = "SELECT * FROM jobTable WHERE jobID IN ( SELECT jobID from appTable WHERE employeeID='$email')";
    $result = mysqli_query($con, $query);        
    
    return $result;
}