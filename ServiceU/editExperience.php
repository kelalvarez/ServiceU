<!DOCTYPE html>
<html lang="en">
<?php 
    include("DatabaseFunctions.php"); 
    include("functions.php");
?>
<?php 
    session_start();
    if (!isset($_SESSION["loginEmail"]))
     {
        header("location: index.php");
        exit();
    }
    else{
       $userEmail = $_SESSION["loginEmail"];
    }
   ?>
   <?php
    if (isset($_POST['submitDegree'])) {
        $D1P1 = $_POST['degree1Part1'];
        $D1P2 = $_POST['degree1Part2'];

        $degree1 = $D1P1 . " " . $D1P2;
        
        
        editDegree1($userEmail, $degree1);
    }
    
    if (isset($_POST['submitInterest'])) {
        $newInterest = $_POST['interest1'];
        
        insertInterest($userEmail, $newInterest);
    }
    
    if (isset($_POST['changePassword'])) {
	$oldPassword = $_POST['oldpassword'];
	$newPassword = $_POST['newpassword'];
	$confirmedPassword = $_POST['passverify'];
	if (verifyPassword($userEmail, $oldPassword)) {
            if ($newPassword == $confirmedPassword) {
		editPassword($userEmail, $newPassword);
		echo '<script type="text/javascript">';
		echo 'alert("Password Updated")';
		echo '</script>';
            } else {
		echo '<script type="text/javascript">';
		echo 'alert("Passwords do not match, please try again")';
		echo '</script>';
			}
            } else {
		echo '<script type="text/javascript">';
		echo 'alert("Old Password is invalid")';
		echo '</script>';
            }

    }
    
    if (isset($_POST['verifyCode'])) {
        $code = $_POST['verificationCode'];
        
        if (verifyCode($userEmail, $code)) {
            verifyAccount($userEmail);
            echo '<script type="text/javascript">';
            echo 'alert("Account has been verify")';
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Invalid Verification Code")';
            echo '</script>';
	}
    }
    
       
?>
    


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ServiceU</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    
    <!--Customized CSS-->
    <link rel="stylesheet" href="css/mycss.css">
    
    
</head>

    
<body>

<!-- Navigation Sidebar -->
    <?php include 'navigationbar.php' ?>
    
<!-- About -->

    <!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
<div class="container">


     <div class="well well-lg">

        <div class="row">

            <div class="col-md-3"> <!--Profile start here-->

                <div class="profileStart">
                  
                    <?php
                                    if(empty(displayMyImage($userEmail)))
                                       echo '<img id="userImageStyle" alt="msgProfilePic" class="img-circle" src="img/user-icon.jpg">';
                                     else
                                        echo '<img id="userImageStyle" alt="msgProfilePic" class="img-circle" src="data:image/jpeg;base64,'.base64_encode(displayMyImage($userEmail)).'"alt="msgProfilePic">';

                            ?>

                        <div class="profileSet" id="Profile-List">
                            <a href="viewmyprofile.php"><b><?php echo getFullName($userEmail);?></b></a>
                            <br>
                            <a href="viewmyprofile.php">View My Profile</a>
                            <br>
                            <br>
                             <?php
                           
                            
                                            if(checkVerification($userEmail) == 1)
                                                echo '<p>Verified: <span class="glyphicon glyphicon-ok" style="color: green; font-size: 15px;">  </span></p>';
                                            else
                                                echo '<p>Verified: <span class="glyphicon glyphicon-remove" style="color: red; font-size: 15px">  </span></p>';
                             ?>
                        </div>

                </div>

                <div style="clear: both;" class="text-left">
                   
                      <ul id="Profile-List">

                        <li>
                                <a href="#"><span class="glyphicon glyphicon-briefcase"> </span> Contact Information</a>
                                <a href="profile.php" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-education"> </span> Education</a>
                                <a href="degree.php" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-camera"> </span> Photo</a>
                                <a href="photo.php" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-star-empty"> </span> Experience</a>
                                <a href="experience.php" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-wrench"> </span> Skills</a>
                                <a href="skills.php" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-cog"> </span> Interest</a>
                                <a href="interest.php" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                                
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-thumbs-up"> </span> My Reviews</a>
                                <a href="#" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-certificate"> </span> Account Settings</a>
                                <a href="editsettings.php" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                        </li>
                                               

                      </ul>
                   

                </div>

            </div>


            
             <?php include 'confirmCode.php' ?>  

            <div class="col-md-9">        
               
                <div class="panel panel-info">
                    <div class="panel-heading" style="text-align: center"><h3><b><span class="glyphicon glyphicon-star-empty"></span> Experience</b></h3></div>
                        <div class="panel-body">


                                     <form role="form" method="POST" class="form-horizontal">
                                                                                 
                                                <div>
                                        
                                                    

                                                      <div class="form-group">
                                                        <label for="nameEmployer" class="col-sm-5 control-label">Employer:</label>
                                                        <div class="col-sm-4">
                                                          <input type="nameEmployer" name="nameEmployer" class="form-control" value="<?php 

                                                                        
                                                                              if(isset($_GET['expID']))
                                                                                     {
                                                                                            $idExp = $_GET['expID'];
                                                                                            echo getUserEmployer($idExp);
                                                                                     }                                                       
                                                                                                                                     
                                                                                                                                     
                                                          ?>" placeholder="Name your past employment?">
                                                            
                                                        </div>
                                                    </div>

                                                      <div class="form-group">
                                                        <label for="jobTitle" class="col-sm-5 control-label">Job Title:</label>
                                                        <div class="col-sm-4">
                                                          <input type="lName" name="userjobTitle" class="form-control" value="<?php
                                                                                                                              
                                                                                      
                                                                              if(isset($_GET['expID']))
                                                                                     {
                                                                                            $idExp = $_GET['expID'];
                                                                                            echo getUserJobTitle($idExp);
                                                                                     }                                        
                                                                                                                                                                                                                                                
                                                           ?>">
                                                        </div> 
                                                      </div>
                                                    
                                                    

                                                      <div class="form-group">
                                                        <label for="jobLocation" class="col-sm-5 control-label">Location:</label>
                                                        <div class="col-sm-4">
                                                          <input type="jobLocation" name="jobLocation" class="form-control" placeholder="City, State..." value="<?php
                                                                 
                                                                                 if(isset($_GET['expID']))
                                                                                     {
                                                                                            $idExp = $_GET['expID'];
                                                                                            echo getUserJobLocation($idExp);
                                                                                     } 
                                                                 
                                                                 
                                                                  ?>">
                                                        </div>
                                                      </div>

                                                     <div class="form-group">
                                                        <label for="jobDescription" class="col-sm-5 control-label">Description:</label>
                                                        <div class="col-sm-4">
                                                         <textarea style="resize: none;" name="userjobDescription" aria-labelledby="DescriptionLabel" cols="36" id="jobDescription" maxlength="3000" name="jobDescription" rows="5"><?php
                                                                                 if(isset($_GET['expID']))
                                                                                     {
                                                                                            $idExp = $_GET['expID'];
                                                                                            echo getUserJobDescription($idExp);
                                                                                     }   
                                                                  ?></textarea>
                                                        </div>
                                                      </div>
                                                    
                                                    
                                                    

                                                      <div class="form-group">
                                                        <label for="countryTitle" class="col-sm-5 control-label">Country:</label>
                                                        <select style="margin-left: 15px; margin-top: 10px;" aria-labelledby="CountryIdLabel" id="CountryId" name="CountryId">                                                                               <?php
                                                                                 if(isset($_GET['expID']))
                                                                                  {
                                                                                            $idExp = $_GET['expID'];
                                                                                            echo '<option selected="selected">' . getUserJobCountry($idExp) . '</option>';
                                                                                     }
                                                                                 else
                                                                                 {
                                                                                     echo  '<option selected="selected" value="United States" title="United States">United States </option>';
                                                                                 }?>
                                                            
        <option value="Afghanistan" title="Afghanistan">Afghanistan</option>
        <option value="Åland Islands" title="Åland Islands">Åland Islands</option>
        <option value="Albania" title="Albania">Albania</option>
        <option value="Algeria" title="Algeria">Algeria</option>
        <option value="American Samoa" title="American Samoa">American Samoa</option>
        <option value="Andorra" title="Andorra">Andorra</option>
        <option value="Angola" title="Angola">Angola</option>
        <option value="Anguilla" title="Anguilla">Anguilla</option>
        <option value="Antarctica" title="Antarctica">Antarctica</option>
        <option value="Antigua and Barbuda" title="Antigua and Barbuda">Antigua and Barbuda</option>
        <option value="Argentina" title="Argentina">Argentina</option>
        <option value="Armenia" title="Armenia">Armenia</option>
        <option value="Aruba" title="Aruba">Aruba</option>
        <option value="Australia" title="Australia">Australia</option>
        <option value="Austria" title="Austria">Austria</option>
        <option value="Azerbaijan" title="Azerbaijan">Azerbaijan</option>
        <option value="Bahamas" title="Bahamas">Bahamas</option>
        <option value="Bahrain" title="Bahrain">Bahrain</option>
        <option value="Bangladesh" title="Bangladesh">Bangladesh</option>
        <option value="Barbados" title="Barbados">Barbados</option>
        <option value="Belarus" title="Belarus">Belarus</option>
        <option value="Belgium" title="Belgium">Belgium</option>
        <option value="Belize" title="Belize">Belize</option>
        <option value="Benin" title="Benin">Benin</option>
        <option value="Bermuda" title="Bermuda">Bermuda</option>
        <option value="Bhutan" title="Bhutan">Bhutan</option>
        <option value="Bolivia, Plurinational State of" title="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
        <option value="Bonaire, Sint Eustatius and Saba" title="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
        <option value="Bosnia and Herzegovina" title="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
        <option value="Botswana" title="Botswana">Botswana</option>
        <option value="Bouvet Island" title="Bouvet Island">Bouvet Island</option>
        <option value="Brazil" title="Brazil">Brazil</option>
        <option value="British Indian Ocean Territory" title="British Indian Ocean Territory">British Indian Ocean Territory</option>
        <option value="Brunei Darussalam" title="Brunei Darussalam">Brunei Darussalam</option>
        <option value="Bulgaria" title="Bulgaria">Bulgaria</option>
        <option value="Burkina Faso" title="Burkina Faso">Burkina Faso</option>
        <option value="Burundi" title="Burundi">Burundi</option>
        <option value="Cambodia" title="Cambodia">Cambodia</option>
        <option value="Cameroon" title="Cameroon">Cameroon</option>
        <option value="Canada" title="Canada">Canada</option>
        <option value="Cape Verde" title="Cape Verde">Cape Verde</option>
        <option value="Cayman Islands" title="Cayman Islands">Cayman Islands</option>
        <option value="Central African Republic" title="Central African Republic">Central African Republic</option>
        <option value="Chad" title="Chad">Chad</option>
        <option value="Chile" title="Chile">Chile</option>
        <option value="China" title="China">China</option>
        <option value="Christmas Island" title="Christmas Island">Christmas Island</option>
        <option value="Cocos (Keeling) Islands" title="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
        <option value="Colombia" title="Colombia">Colombia</option>
        <option value="Comoros" title="Comoros">Comoros</option>
        <option value="Congo" title="Congo">Congo</option>
        <option value="Congo, the Democratic Republic of the" title="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
        <option value="Cook Islands" title="Cook Islands">Cook Islands</option>
        <option value="Costa Rica" title="Costa Rica">Costa Rica</option>
        <option value="Côte d'Ivoire" title="Côte d'Ivoire">Côte d'Ivoire</option>
        <option value="Croatia" title="Croatia">Croatia</option>
        <option value="Cuba" title="Cuba">Cuba</option>
        <option value="Curaçao" title="Curaçao">Curaçao</option>
        <option value="Cyprus" title="Cyprus">Cyprus</option>
        <option value="Czech Republic" title="Czech Republic">Czech Republic</option>
        <option value="Denmark" title="Denmark">Denmark</option>
        <option value="Djibouti" title="Djibouti">Djibouti</option>
        <option value="Dominica" title="Dominica">Dominica</option>
        <option value="Dominican Republic" title="Dominican Republic">Dominican Republic</option>
        <option value="Ecuador" title="Ecuador">Ecuador</option>
        <option value="Egypt" title="Egypt">Egypt</option>
        <option value="El Salvador" title="El Salvador">El Salvador</option>
        <option value="Equatorial Guinea" title="Equatorial Guinea">Equatorial Guinea</option>
        <option value="Eritrea" title="Eritrea">Eritrea</option>
        <option value="Estonia" title="Estonia">Estonia</option>
        <option value="Ethiopia" title="Ethiopia">Ethiopia</option>
        <option value="Falkland Islands (Malvinas)" title="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
        <option value="Faroe Islands" title="Faroe Islands">Faroe Islands</option>
        <option value="Fiji" title="Fiji">Fiji</option>
        <option value="Finland" title="Finland">Finland</option>
        <option value="France" title="France">France</option>
        <option value="French Guiana" title="French Guiana">French Guiana</option>
        <option value="French Polynesia" title="French Polynesia">French Polynesia</option>
        <option value="French Southern Territories" title="French Southern Territories">French Southern Territories</option>
        <option value="Gabon" title="Gabon">Gabon</option>
        <option value="Gambia" title="Gambia">Gambia</option>
        <option value="Georgia" title="Georgia">Georgia</option>
        <option value="Germany" title="Germany">Germany</option>
        <option value="Ghana" title="Ghana">Ghana</option>
        <option value="Gibraltar" title="Gibraltar">Gibraltar</option>
        <option value="Greece" title="Greece">Greece</option>
        <option value="Greenland" title="Greenland">Greenland</option>
        <option value="Grenada" title="Grenada">Grenada</option>
        <option value="Guadeloupe" title="Guadeloupe">Guadeloupe</option>
        <option value="Guam" title="Guam">Guam</option>
        <option value="Guatemala" title="Guatemala">Guatemala</option>
        <option value="Guernsey" title="Guernsey">Guernsey</option>
        <option value="Guinea" title="Guinea">Guinea</option>
        <option value="Guinea-Bissau" title="Guinea-Bissau">Guinea-Bissau</option>
        <option value="Guyana" title="Guyana">Guyana</option>
        <option value="Haiti" title="Haiti">Haiti</option>
        <option value="Heard Island and McDonald Islands" title="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
        <option value="Holy See (Vatican City State)" title="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
        <option value="Honduras" title="Honduras">Honduras</option>
        <option value="Hong Kong" title="Hong Kong">Hong Kong</option>
        <option value="Hungary" title="Hungary">Hungary</option>
        <option value="Iceland" title="Iceland">Iceland</option>
        <option value="India" title="India">India</option>
        <option value="Indonesia" title="Indonesia">Indonesia</option>
        <option value="Iran, Islamic Republic of" title="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
        <option value="Iraq" title="Iraq">Iraq</option>
        <option value="Ireland" title="Ireland">Ireland</option>
        <option value="Isle of Man" title="Isle of Man">Isle of Man</option>
        <option value="Israel" title="Israel">Israel</option>
        <option value="Italy" title="Italy">Italy</option>
        <option value="Jamaica" title="Jamaica">Jamaica</option>
        <option value="Japan" title="Japan">Japan</option>
        <option value="Jersey" title="Jersey">Jersey</option>
        <option value="Jordan" title="Jordan">Jordan</option>
        <option value="Kazakhstan" title="Kazakhstan">Kazakhstan</option>
        <option value="Kenya" title="Kenya">Kenya</option>
        <option value="Kiribati" title="Kiribati">Kiribati</option>
        <option value="Korea, Democratic People's Republic of" title="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
        <option value="Korea, Republic of" title="Korea, Republic of">Korea, Republic of</option>
        <option value="Kuwait" title="Kuwait">Kuwait</option>
        <option value="Kyrgyzstan" title="Kyrgyzstan">Kyrgyzstan</option>
        <option value="Lao People's Democratic Republic" title="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
        <option value="Latvia" title="Latvia">Latvia</option>
        <option value="Lebanon" title="Lebanon">Lebanon</option>
        <option value="Lesotho" title="Lesotho">Lesotho</option>
        <option value="Liberia" title="Liberia">Liberia</option>
        <option value="Libya" title="Libya">Libya</option>
        <option value="Liechtenstein" title="Liechtenstein">Liechtenstein</option>
        <option value="Lithuania" title="Lithuania">Lithuania</option>
        <option value="Luxembourg" title="Luxembourg">Luxembourg</option>
        <option value="Macao" title="Macao">Macao</option>
        <option value="Macedonia, the former Yugoslav Republic of" title="Macedonia, the former Yugoslav Republic of">Macedonia, the former Yugoslav Republic of</option>
        <option value="Madagascar" title="Madagascar">Madagascar</option>
        <option value="Malawi" title="Malawi">Malawi</option>
        <option value="Malaysia" title="Malaysia">Malaysia</option>
        <option value="Maldives" title="Maldives">Maldives</option>
        <option value="Mali" title="Mali">Mali</option>
        <option value="Malta" title="Malta">Malta</option>
        <option value="Marshall Islands" title="Marshall Islands">Marshall Islands</option>
        <option value="Martinique" title="Martinique">Martinique</option>
        <option value="Mauritania" title="Mauritania">Mauritania</option>
        <option value="Mauritius" title="Mauritius">Mauritius</option>
        <option value="Mayotte" title="Mayotte">Mayotte</option>
        <option value="Mexico" title="Mexico">Mexico</option>
        <option value="Micronesia, Federated States of" title="Micronesia, Federated States of">Micronesia, Federated States of</option>
        <option value="Moldova, Republic of" title="Moldova, Republic of">Moldova, Republic of</option>
        <option value="Monaco" title="Monaco">Monaco</option>
        <option value="Mongolia" title="Mongolia">Mongolia</option>
        <option value="Montenegro" title="Montenegro">Montenegro</option>
        <option value="Montserrat" title="Montserrat">Montserrat</option>
        <option value="Morocco" title="Morocco">Morocco</option>
        <option value="Mozambique" title="Mozambique">Mozambique</option>
        <option value="Myanmar" title="Myanmar">Myanmar</option>
        <option value="Namibia" title="Namibia">Namibia</option>
        <option value="Nauru" title="Nauru">Nauru</option>
        <option value="Nepal" title="Nepal">Nepal</option>
        <option value="Netherlands" title="Netherlands">Netherlands</option>
        <option value="New Caledonia" title="New Caledonia">New Caledonia</option>
        <option value="New Zealand" title="New Zealand">New Zealand</option>
        <option value="Nicaragua" title="Nicaragua">Nicaragua</option>
        <option value="Niger" title="Niger">Niger</option>
        <option value="Nigeria" title="Nigeria">Nigeria</option>
        <option value="Niue" title="Niue">Niue</option>
        <option value="Norfolk Island" title="Norfolk Island">Norfolk Island</option>
        <option value="Northern Mariana Islands" title="Northern Mariana Islands">Northern Mariana Islands</option>
        <option value="Norway" title="Norway">Norway</option>
        <option value="Oman" title="Oman">Oman</option>
        <option value="Pakistan" title="Pakistan">Pakistan</option>
        <option value="Palau" title="Palau">Palau</option>
        <option value="Palestinian Territory, Occupied" title="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
        <option value="Panama" title="Panama">Panama</option>
        <option value="Papua New Guinea" title="Papua New Guinea">Papua New Guinea</option>
        <option value="Paraguay" title="Paraguay">Paraguay</option>
        <option value="Peru" title="Peru">Peru</option>
        <option value="Philippines" title="Philippines">Philippines</option>
        <option value="Pitcairn" title="Pitcairn">Pitcairn</option>
        <option value="Poland" title="Poland">Poland</option>
        <option value="Portugal" title="Portugal">Portugal</option>
        <option value="Puerto Rico" title="Puerto Rico">Puerto Rico</option>
        <option value="Qatar" title="Qatar">Qatar</option>
        <option value="Réunion" title="Réunion">Réunion</option>
        <option value="Romania" title="Romania">Romania</option>
        <option value="Russian Federation" title="Russian Federation">Russian Federation</option>
        <option value="Rwanda" title="Rwanda">Rwanda</option>
        <option value="Saint Barthélemy" title="Saint Barthélemy">Saint Barthélemy</option>
        <option value="Saint Helena, Ascension and Tristan da Cunha" title="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
        <option value="Saint Kitts and Nevis" title="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
        <option value="Saint Lucia" title="Saint Lucia">Saint Lucia</option>
        <option value="Saint Martin (French part)" title="Saint Martin (French part)">Saint Martin (French part)</option>
        <option value="Saint Pierre and Miquelon" title="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
        <option value="Saint Vincent and the Grenadines" title="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
        <option value="Samoa" title="Samoa">Samoa</option>
        <option value="San Marino" title="San Marino">San Marino</option>
        <option value="Sao Tome and Principe" title="Sao Tome and Principe">Sao Tome and Principe</option>
        <option value="Saudi Arabia" title="Saudi Arabia">Saudi Arabia</option>
        <option value="Senegal" title="Senegal">Senegal</option>
        <option value="Serbia" title="Serbia">Serbia</option>
        <option value="Seychelles" title="Seychelles">Seychelles</option>
        <option value="Sierra Leone" title="Sierra Leone">Sierra Leone</option>
        <option value="Singapore" title="Singapore">Singapore</option>
        <option value="Sint Maarten (Dutch part)" title="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
        <option value="Slovakia" title="Slovakia">Slovakia</option>
        <option value="Slovenia" title="Slovenia">Slovenia</option>
        <option value="Solomon Islands" title="Solomon Islands">Solomon Islands</option>
        <option value="Somalia" title="Somalia">Somalia</option>
        <option value="South Africa" title="South Africa">South Africa</option>
        <option value="South Georgia and the South Sandwich Islands" title="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
        <option value="South Sudan" title="South Sudan">South Sudan</option>
        <option value="Spain" title="Spain">Spain</option>
        <option value="Sri Lanka" title="Sri Lanka">Sri Lanka</option>
        <option value="Sudan" title="Sudan">Sudan</option>
        <option value="Suriname" title="Suriname">Suriname</option>
        <option value="Svalbard and Jan Mayen" title="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
        <option value="Swaziland" title="Swaziland">Swaziland</option>
        <option value="Sweden" title="Sweden">Sweden</option>
        <option value="Switzerland" title="Switzerland">Switzerland</option>
        <option value="Syrian Arab Republic" title="Syrian Arab Republic">Syrian Arab Republic</option>
        <option value="Taiwan, Province of China" title="Taiwan, Province of China">Taiwan, Province of China</option>
        <option value="Tajikistan" title="Tajikistan">Tajikistan</option>
        <option value="Tanzania, United Republic of" title="Tanzania, United Republic of">Tanzania, United Republic of</option>
        <option value="Thailand" title="Thailand">Thailand</option>
        <option value="Timor-Leste" title="Timor-Leste">Timor-Leste</option>
        <option value="Togo" title="Togo">Togo</option>
        <option value="Tokelau" title="Tokelau">Tokelau</option>
        <option value="Tonga" title="Tonga">Tonga</option>
        <option value="Trinidad and Tobago" title="Trinidad and Tobago">Trinidad and Tobago</option>
        <option value="Tunisia" title="Tunisia">Tunisia</option>
        <option value="Turkey" title="Turkey">Turkey</option>
        <option value="Turkmenistan" title="Turkmenistan">Turkmenistan</option>
        <option value="Turks and Caicos Islands" title="Turks and Caicos Islands">Turks and Caicos Islands</option>
        <option value="Tuvalu" title="Tuvalu">Tuvalu</option>
        <option value="Uganda" title="Uganda">Uganda</option>
        <option value="Ukraine" title="Ukraine">Ukraine</option>
        <option value="United Arab Emirates" title="United Arab Emirates">United Arab Emirates</option>
        <option value="United Kingdom" title="United Kingdom">United Kingdom</option>
        <option value="United States Minor Outlying Islands" title="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
        <option value="Uruguay" title="Uruguay">Uruguay</option>
        <option value="Uzbekistan" title="Uzbekistan">Uzbekistan</option>
        <option value="Vanuatu" title="Vanuatu">Vanuatu</option>
        <option value="Venezuela, Bolivarian Republic of" title="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>
        <option value="Viet Nam" title="Viet Nam">Viet Nam</option>
        <option value="Virgin Islands, British" title="Virgin Islands, British">Virgin Islands, British</option>
        <option value="Virgin Islands, U.S." title="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
        <option value="Wallis and Futuna" title="Wallis and Futuna">Wallis and Futuna</option>
        <option value="Western Sahara" title="Western Sahara">Western Sahara</option>
        <option value="Yemen" title="Yemen">Yemen</option>
        <option value="Zambia" title="Zambia">Zambia</option>
        <option value="Zimbabwe" title="Zimbabwe">Zimbabwe</option>
    </select>
                                                      </div>
                                                    
                                                    
                                                    
                                                           
                                                      <div class="form-group" style="text-align: center; padding-left: 10%">
                                                              <label>
                                                                <input type="checkbox" value="Yes" onclick="disableMonthYear()" name="userCurrentlyWorkHere" class="chehckIfCheck" <?php
                                                                                                                              
                                                                                      
                                                                              if(isset($_GET['expID']))
                                                                                     {
                                                                                            $idExp = $_GET['expID'];
                                                                                            if(getUserWorkStatus($idExp) == 'Current')
                                                                                               echo 'Checked';
                                                                                       
                                                                                     }                                                          
                                                           ?>>
                                                                    I'm currently working here
                                                              </label>
                                                      </div>
                                                    
                                                    
                                                   
                                                        <div class="form-group">
                                                                <label style="padding-top: 18px;" for="userEDU" class="col-sm-5 control-label">Dates Attended:</label>
                                                                <select style="margin-left: 15px; margin-top: 2px;" aria-labelledby="StartMonthLabel" id="StartMonth" name="startMonth">                                                 
                                                                    <?php
                                                                                 if(isset($_GET['expID']))
                                                                                  {
                                                                                            $idExp = $_GET['expID'];
                                                                                            echo '<option selected="selected">' . getUserStartMonth($idExp) . '</option>';
                                                                                     }
                                                                                 else
                                                                                 {
                                                                                     echo  '<option value="0" title="United States">Month</option>';
                                                                     }?>
        
    <option value="January">January</option>
	<option value="February">February</option>
	<option value="March">March</option>
	<option value="April">April</option>
	<option value="May">May</option>
	<option value="June">June</option>
	<option value="July">July</option>
	<option value="August">August</option>
	<option value="September">September</option>
	<option value="October">October</option>
	<option value="November">November</option>
	<option value="December">December</option>
 </select>
                                                                <select style="margin-left: 30px; margin-top: 2px;" aria-labelledby="StartYearLabel" id="disableIfCurrent" name="startYear">
                                                                     <?php
                                                                                 if(isset($_GET['expID']))
                                                                                  {
                                                                                            $idExp = $_GET['expID'];
                                                                                            echo '<option selected="selected">' . getUserStartYear($idExp) . '</option>';
                                                                                     }
                                                                                 else
                                                                                 {
                                                                                     echo  '<option value="0">Year</option>';
                                                                     }?>
                                                                    
            <option value="2015">2015</option>
            <option value="2014">2014</option>
            <option value="2013">2013</option>
            <option value="2012">2012</option>
            <option value="2011">2011</option>
            <option value="2010">2010</option>
            <option value="2009">2009</option>
            <option value="2008">2008</option>
            <option value="2007">2007</option>
            <option value="2006">2006</option>
            <option value="2005">2005</option>
            <option value="2004">2004</option>
            <option value="2003">2003</option>
            <option value="2002">2002</option>
            <option value="2001">2001</option>
            <option value="2000">2000</option>
            <option value="1999">1999</option>
            <option value="1998">1998</option>
            <option value="1997">1997</option>
            <option value="1996">1996</option>
            <option value="1995">1995</option>
            <option value="1994">1994</option>
            <option value="1993">1993</option>
            <option value="1992">1992</option>
            <option value="1991">1991</option>
            <option value="1990">1990</option>
            <option value="1989">1989</option>
            <option value="1988">1988</option>
            <option value="1987">1987</option>
            <option value="1986">1986</option>
            <option value="1985">1985</option>
            <option value="1984">1984</option>
            <option value="1983">1983</option>
            <option value="1982">1982</option>
            <option value="1981">1981</option>
            <option value="1980">1980</option>
            <option value="1979">1979</option>
            <option value="1978">1978</option>
            <option value="1977">1977</option>
            <option value="1976">1976</option>
            <option value="1975">1975</option>
            <option value="1974">1974</option>
            <option value="1973">1973</option>
            <option value="1972">1972</option>
            <option value="1971">1971</option>
            <option value="1970">1970</option>
            <option value="1969">1969</option>
            <option value="1968">1968</option>
            <option value="1967">1967</option>
            <option value="1966">1966</option>
            <option value="1965">1965</option>
            <option value="1964">1964</option>
            <option value="1963">1963</option>
            <option value="1962">1962</option>
            <option value="1961">1961</option>
            <option value="1960">1960</option>
            <option value="1959">1959</option>
            <option value="1958">1958</option>
            <option value="1957">1957</option>
            <option value="1956">1956</option>
            <option value="1955">1955</option>
            <option value="1954">1954</option>
            <option value="1953">1953</option>
            <option value="1952">1952</option>
            <option value="1951">1951</option>
            <option value="1950">1950</option>
            <option value="1949">1949</option>
            <option value="1948">1948</option>
            <option value="1947">1947</option>
            <option value="1946">1946</option>
            <option value="1945">1945</option>
            <option value="1944">1944</option>
            <option value="1943">1943</option>
            <option value="1942">1942</option>
            <option value="1941">1941</option>
            <option value="1940">1940</option>
            <option value="1939">1939</option>
            <option value="1938">1938</option>
            <option value="1937">1937</option>
            <option value="1936">1936</option>
            <option value="1935">1935</option>
            <option value="1934">1934</option>
            <option value="1933">1933</option>
            <option value="1932">1932</option>
            <option value="1931">1931</option>
            <option value="1930">1930</option>
            <option value="1929">1929</option>
            <option value="1928">1928</option>
            <option value="1927">1927</option>
            <option value="1926">1926</option>
</select>
                                                                  &nbsp&nbsp to
                                                                <br>

                                                                <select style="margin-left: 15px; margin-top: 10px;" aria-labelledby="StartMonthLabel" class="endDateDisable" name="endMonth">
                                                                     <?php
                                                                                 if(isset($_GET['expID']))
                                                                                  {
                                                                                            $idExp = $_GET['expID'];
                                                                                            echo '<option selected="selected">' . getUserEndMonth($idExp) . '</option>';
                                                                                     }
                                                                                 else
                                                                                 {
                                                                                     echo  '<option value="0">Month</option>';
                                                                     }?>
    <option value="January">January</option>
	<option value="February">February</option>
	<option value="March">March</option>
	<option value="April">April</option>
	<option value="May">May</option>
	<option value="June">June</option>
	<option value="July">July</option>
	<option value="August">August</option>
	<option value="September">September</option>
	<option value="October">October</option>
	<option value="November">November</option>
	<option value="December">December</option>
</select>
                                                                <select style="margin-left: 30px; margin-top: 2px;"aria-labelledby="StartYearLabel" class="endDateDisable" name="endYear">
                                                                    
                                                                     <?php
                                                                                 if(isset($_GET['expID']))
                                                                                  {
                                                                                            $idExp = $_GET['expID'];
                                                                                            echo '<option selected="selected">' . getUserEndYear($idExp) . '</option>';
                                                                                     }
                                                                                 else
                                                                                 {
                                                                                     echo  '<option value="0">Year</option>';
                                                                     }?>
        <option value="2015">2015</option>
        <option value="2014">2014</option>
        <option value="2013">2013</option>
        <option value="2012">2012</option>
        <option value="2011">2011</option>
        <option value="2010">2010</option>
        <option value="2009">2009</option>
        <option value="2008">2008</option>
        <option value="2007">2007</option>
        <option value="2006">2006</option>
        <option value="2005">2005</option>
        <option value="2004">2004</option>
        <option value="2003">2003</option>
        <option value="2002">2002</option>
        <option value="2001">2001</option>
        <option value="2000">2000</option>
        <option value="1999">1999</option>
        <option value="1998">1998</option>
        <option value="1997">1997</option>
        <option value="1996">1996</option>
        <option value="1995">1995</option>
        <option value="1994">1994</option>
        <option value="1993">1993</option>
        <option value="1992">1992</option>
        <option value="1991">1991</option>
        <option value="1990">1990</option>
        <option value="1989">1989</option>
        <option value="1988">1988</option>
        <option value="1987">1987</option>
        <option value="1986">1986</option>
        <option value="1985">1985</option>
        <option value="1984">1984</option>
        <option value="1983">1983</option>
        <option value="1982">1982</option>
        <option value="1981">1981</option>
        <option value="1980">1980</option>
        <option value="1979">1979</option>
        <option value="1978">1978</option>
        <option value="1977">1977</option>
        <option value="1976">1976</option>
        <option value="1975">1975</option>
        <option value="1974">1974</option>
        <option value="1973">1973</option>
        <option value="1972">1972</option>
        <option value="1971">1971</option>
        <option value="1970">1970</option>
        <option value="1969">1969</option>
        <option value="1968">1968</option>
        <option value="1967">1967</option>
        <option value="1966">1966</option>
        <option value="1965">1965</option>
        <option value="1964">1964</option>
        <option value="1963">1963</option>
        <option value="1962">1962</option>
        <option value="1961">1961</option>
        <option value="1960">1960</option>
        <option value="1959">1959</option>
        <option value="1958">1958</option>
        <option value="1957">1957</option>
        <option value="1956">1956</option>
        <option value="1955">1955</option>
        <option value="1954">1954</option>
        <option value="1953">1953</option>
        <option value="1952">1952</option>
        <option value="1951">1951</option>
        <option value="1950">1950</option>
        <option value="1949">1949</option>
        <option value="1948">1948</option>
        <option value="1947">1947</option>
        <option value="1946">1946</option>
        <option value="1945">1945</option>
        <option value="1944">1944</option>
        <option value="1943">1943</option>
        <option value="1942">1942</option>
        <option value="1941">1941</option>
        <option value="1940">1940</option>
        <option value="1939">1939</option>
        <option value="1938">1938</option>
        <option value="1937">1937</option>
        <option value="1936">1936</option>
        <option value="1935">1935</option>
        <option value="1934">1934</option>
        <option value="1933">1933</option>
        <option value="1932">1932</option>
        <option value="1931">1931</option>
        <option value="1930">1930</option>
        <option value="1929">1929</option>
        <option value="1928">1928</option>
        <option value="1927">1927</option>
        <option value="1926">1926</option>
</select>
                                                            
                                                        </div>
                                                   
                                                    

                                                      <div class="form-group" style="text-align:center; margin-top: 5%;">

                                                            <div style="border-top-style: solid; border-width: 1px; border-top-color: #bce8f1; padding-top: 10px;">                                                  
                                                                
                                                                <button type="submit" value="submit" name="submitExperience" class="btn btn-info">Update Change</button>
                                                                
                                                                

                                                            </div>

                                                      </div>
                                                    

                                        </form>
                                    </div>
                         </div>
                    </div>


                
                
            
                </div>         

            </div>
                    
     </div>    
</div>
        <!-- /.container -->

    <footer style="text-align: center;">

                <ul class="list-inline">
                  <li><a href="about.php">About</a></li>
                  <li><a href="help.php">Help</a></li>
                  <li><a href="#">Directory</a></li>
                  <li><h5 style="color: #aab8c2">&#169 2015 ServiceU, Inc, All rights reserved.</h5></li>
                </ul>
         
    </footer>
    
 
    
    
    <?php
            if(isset($_POST['submitExperience']))  
            { 
                //$firstnameErr = $user_emailErr = $lastnameErr = $passwordnameErr = "";

                $user_employer ="";  
                $user_jobTitle =""; 
                $user_location ="";   
                $user_description ="";
                $user_country ="";
                $user_currentlyWorkHere ="";
                $user_startDateMonth ="";
                $user_startDateYear ="";
                $user_endDateMonth ="";
                $user_endDateYear ="";
                

              if(empty($_POST['nameEmployer'])) {
                //$emailErr = "Email is required";

              } else {
                $user_employer = test_user_input($_POST['nameEmployer']);
              }

              if(empty($_POST['userjobTitle'])) {
                //$firstnameErr = "First Name is required";

              } else {
                $user_jobTitle = test_user_input($_POST['userjobTitle']);
              }

              if(empty($_POST['jobLocation'])) {
                //$lastnameErr = "Last Name is required";
              } else {
                $user_location = test_user_input($_POST['jobLocation']);
              }

              if(empty($_POST['userjobDescription'])) {
                //$passwordnameErr = "Password is required";
              } else {
                $user_description = test_user_input($_POST['userjobDescription']);
              }
                                 
              if(empty($_POST['CountryId'])) {
                //$passwordnameErr = "Password is required";
              } else {
                $user_country = test_user_input($_POST['CountryId']);
              }
                                 
              if(isset($_POST['userCurrentlyWorkHere'])) {
                $user_currentlyWorkHere = "Current"; //test_user_input($_POST['Current']);
              } else {
                //Date is applied
              }
                                                           
              if(empty($_POST['startMonth'])) {
                //$passwordnameErr = "Password is required";
              } else {
                $user_startDateMonth = test_user_input($_POST['startMonth']);
              }
                                 
              if(empty($_POST['startYear'])) {
                //$passwordnameErr = "Password is required";
              } else {
                $user_startDateYear = test_user_input($_POST['startYear']);
              }
                                 
              if(empty($_POST['endMonth'])) {
                //$passwordnameErr = "Password is required";
              } else {
                $user_endDateMonth = test_user_input($_POST['endMonth']);
              }
                                 
              if(empty($_POST['endYear'])) {
                //$passwordnameErr = "Password is required";
              } else {
                $user_endDateYear = test_user_input($_POST['endYear']);
              }
                  
                
              //Update or Add to the database
              if(!empty(isset($_GET['expID']))){
                  
                        $tempID = $_GET['expID'];
                  
                        updateUserExperience($tempID, $user_employer, $user_jobTitle, $user_location, $user_description, $user_country, $user_currentlyWorkHere,                                                 $user_startDateMonth, $user_startDateYear, $user_endDateMonth, $user_endDateYear);
                  
                    /*if(updateUserExperience == True)  
                        {  
                            echo "<script>window.open('experience.php','_self')</script>";
                        }*/
                  

              }else{             
                        insertUserExperience($userEmail, $user_employer, $user_jobTitle, $user_location, $user_description, $user_country, $user_currentlyWorkHere,                                                 $user_startDateMonth, $user_startDateYear, $user_endDateMonth, $user_endDateYear);
                  
                  /*if(insertUserExperience == True)  
                        {  
                            echo "<script>window.open('experience.php','_self')</script>";
                        }*/
                    
                  
                        
              }
                                 
               /*if(!empty($user_email) && !empty($user_fname) && !empty($user_lname) && !empty($user_password))
                {
                    register($user_email, $user_fname, $user_lname, $user_password);
                    echo"<script>window.open('index.php','_self')</script>";  
                }
               else
                {
                  echo "<script>alert('Cant Register, Some fields are missing!')</script>"; 
                }*/

            }  

    ?>
    
    
    

    <script>
      function Show_Div(Div_id) {
            if (false == $(Div_id).is(':visible')) {
                $(Div_id).show(0);

            }
        }
    </script>
    
        

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

   $('[data-dismiss=modal]').on('click', function (e) {
        var $t = $(this),
            target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];

      $(target)
        .find("input,textarea")
           .val('')
           .end();
   
      $('select option:first-child').attr("selected", "selected");
    
    });
    </script>
    
    <!-- Custom for project -->
    <script src="js/editProfileactions.js"></script>

    <script type="text/javascript">
    <?php 
        if(!checkVerification($userEmail))
        {
    ?>
            $('#confirmCode').modal('show');
    <?php 
        }
    ?>
    </script>

    
      <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootbox.js"></script>
    <script src="js/bootbox.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script> 
    
    <!--Start online JSS first-->
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <!--Bootstrap JSS-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <!--Customized JSS-->
    <script src="js/myjs.js"></script>
    <!--change active mode in the navbar-->
    <script> 
        $(".nav a").on("click", function(){
           $(".nav").find(".active").removeClass("active");
           $(this).parent().addClass("active");
        });
    </script>

    <!--list group script-->
    <script>
          $('.list-group-item').on('click',function(e){
        var previous = $(this).closest(".list-group").children(".active");
        previous.removeClass('active'); // previous list-item
        $(e.target).addClass('active'); // activated list-item
      });
    </script>
    
    
    

    
</body>
</html>
