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
                  
                    <img src="img/user-icon.jpg" alt="User-ImG" height="100" width="100" style="float: left;">

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
                                <a href="#"><span class="glyphicon glyphicon-education"> </span> Degree</a>
                                <a href="#editDegree" data-toggle="modal" data-target="#editDegree"  class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                                <?php include('editDegreeModal.php') ?>
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-camera"> </span> Photo</a>
                                <a href="photo.php" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-plus"> </span> Experience</a>
                                <a href="experience.php" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-wrench"> </span> Skills</a>
                                <a href="skills.php" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-cog"> </span> Interest</a>
                                <a href="#editInterest" data-toggle="modal" data-target="#editInterest" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <?php include('editInterestModal.php') ?>
                                
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-thumbs-up"> </span> My Reviews</a>
                                <a href="#" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                        </li>
                        <li>
                                <a href="#"><span class="glyphicon glyphicon-certificate"> </span> Account Settings</a>
                                <a href="#" class="btn btn-light btn-xs" id="editGlyp"><span class="glyphicon glyphicon-pencil"></span></a>
                        </li>
                                               

                      </ul>
                   

                </div>

            </div>


            
             <?php include 'confirmCode.php' ?>  

            <div class="col-md-9">        
               
                <div class="panel panel-info">
                    <div class="panel-heading" style="text-align: center"><h3><span class="glyphicon glyphicon-plus"></span> Experience</h3></div>
                        <div class="panel-body">


                                     <form action="" role="form" method="POST" class="form-horizontal">
                                                                                 
                                                <div>

                                                      <div class="form-group" style="margin-left: -7%;">
                                                        <label for="nameEmployer" class="col-sm-2 control-label">Employer:</label>
                                                        <div class="col-sm-4">
                                                          <input type="nameEmployer" name="nameEmployer" class="form-control" placeholder="Name your past employment?" >
                                                        </div>
                                                      </div>

                                                      <div class="form-group" style="margin-left: -7%;">
                                                        <label for="jobTitle" class="col-sm-2 control-label">Job Title:</label>
                                                        <div class="col-sm-4">
                                                          <input type="lName" name="userjobTitle" class="form-control">
                                                        </div>
                                                      </div>

                                                      <div class="form-group" style="margin-left: -7%;">
                                                        <label for="jobLocation" class="col-sm-2 control-label">Location:</label>
                                                        <div class="col-sm-4">
                                                          <input type="jobLocation" name="jobLocation" class="form-control">
                                                        </div>
                                                      </div>

                                                     <div class="form-group" style="margin-left: -7%;">
                                                        <label for="jobDescription" class="col-sm-2 control-label">Description:</label>
                                                        <div class="col-sm-4">
                                                         <textarea style="resize: none;" name="userjobDescription" aria-labelledby="DescriptionLabel" cols="38" id="jobDescription" maxlength="3000" name="jobDescription" rows="2">                                                              </textarea>
                                                        </div>
                                                      </div>

                                                      
                                                        <label for="countryTitle" class="col-sm-2 control-label" style="margin-left: -6%;">Country:</label>
                                                        <select  style="margin-left: 35px;" aria-labelledby="CountryIdLabel" id="CountryId" name="CountryId"><option value="1">Afghanistan</option>
<option value="2">Albania</option>
<option value="3">Algeria</option>
<option value="243">American Samoa</option>
<option value="4">Andorra</option>
<option value="5">Angola</option>
<option value="176">Anguilla</option>
<option value="177">Antarctica</option>
<option value="175">Antigua and Barbuda</option>
<option value="6">Argentina</option>
<option value="7">Armenia</option>
<option value="179">Aruba</option>
<option value="8">Australia</option>
<option value="9">Austria</option>
<option value="10">Azerbaidjan</option>
<option value="11">Bahamas</option>
<option value="12">Bahrain</option>
<option value="13">Bangladesh</option>
<option value="14">Barbados</option>
<option value="15">Belarus</option>
<option value="16">Belgium</option>
<option value="17">Belize</option>
<option value="18">Benin</option>
<option value="19">Bermuda</option>
<option value="20">Bhutan</option>
<option value="21">Bolivia</option>
<option value="22">Bosnia-Herzegovina</option>
<option value="23">Botswana</option>
<option value="181">Bouvet Island</option>
<option value="24">Brazil</option>
<option value="201">British Indian Ocean Territory</option>
<option value="180">Brunei Darussalam</option>
<option value="25">Bulgaria</option>
<option value="26">Burkina Faso</option>
<option value="27">Burundi</option>
<option value="28">Cambodia</option>
<option value="29">Cameroon</option>
<option value="30">Canada</option>
<option value="31">Cape Verde</option>
<option value="32">Cayman Islands</option>
<option value="33">Central African Republic</option>
<option value="34">Chad</option>
<option value="35">Chile</option>
<option value="36">China</option>
<option value="185">Christmas Island</option>
<option value="182">Cocos (Keeling) Islands</option>
<option value="37">Colombia</option>
<option value="204">Comoros</option>
<option value="38">Congo</option>
<option value="183">Cook Islands</option>
<option value="39">Costa Rica</option>
<option value="40">Croatia</option>
<option value="184">Cuba</option>
<option value="41">Cyprus</option>
<option value="42">Czech Republic</option>
<option value="172">Democratic Republic of Congo</option>
<option value="43">Denmark</option>
<option value="44">Djibouti</option>
<option value="186">Dominica</option>
<option value="187">Dominican Republic</option>
<option value="233">East Timor</option>
<option value="251">East Timor</option>
<option value="45">Ecuador</option>
<option value="46">Egypt</option>
<option value="47">El Salvador</option>
<option value="48">Equatorial Guinea</option>
<option value="49">Eritrea</option>
<option value="50">Estonia</option>
<option value="51">Ethiopia</option>
<option value="189">Falkland Islands</option>
<option value="191">Faroe Islands</option>
<option value="52">Fiji</option>
<option value="53">Finland</option>
<option value="228">Former USSR</option>
<option value="54">France</option>
<option value="55">France (European Territory)</option>
<option value="193">French Guyana</option>
<option value="230">French Southern Territories</option>
<option value="56">Gabon</option>
<option value="57">Gambia</option>
<option value="58">Georgia</option>
<option value="59">Germany</option>
<option value="60">Ghana</option>
<option value="194">Gibraltar</option>
<option value="61">Greece</option>
<option value="195">Greenland</option>
<option value="192">Grenada</option>
<option value="196">Guadeloupe (French)</option>
<option value="245">Guam</option>
<option value="198">Guatemala</option>
<option value="63">Guinea</option>
<option value="64">Guinea Bissau</option>
<option value="65">Guyana</option>
<option value="200">Haiti</option>
<option value="199">Heard and McDonald Islands</option>
<option value="66">Honduras</option>
<option value="67">Hong Kong</option>
<option value="68">Hungary</option>
<option value="69">Iceland</option>
<option value="70">India</option>
<option value="71">Indonesia</option>
<option value="72">Iran</option>
<option value="73">Iraq</option>
<option value="74">Ireland</option>
<option value="75">Israel</option>
<option value="76">Italy</option>
<option value="77">Ivory Coast</option>
<option value="202">Jamaica</option>
<option value="78">Japan</option>
<option value="79">Jordan</option>
<option value="80">Kazakhstan</option>
<option value="81">Kenya</option>
<option value="203">Kiribati</option>
<option value="82">Kuwait</option>
<option value="83">Kyrgyzstan</option>
<option value="84">Laos</option>
<option value="85">Latvia</option>
<option value="86">Lebanon</option>
<option value="87">Lesotho</option>
<option value="88">Liberia</option>
<option value="89">Libya</option>
<option value="90">Liechtenstein</option>
<option value="91">Lithuania</option>
<option value="92">Luxembourg</option>
<option value="208">Macau</option>
<option value="93">Macedonia</option>
<option value="94">Madagascar</option>
<option value="95">Malawi</option>
<option value="96">Malaysia</option>
<option value="97">Maldives</option>
<option value="98">Mali</option>
<option value="99">Malta</option>
<option value="207">Marshall Islands</option>
<option value="210">Martinique (French)</option>
<option value="100">Mauritania</option>
<option value="212">Mauritius</option>
<option value="241">Mayotte</option>
<option value="101">Mexico</option>
<option value="190">Micronesia</option>
<option value="102">Moldavia</option>
<option value="103">Monaco</option>
<option value="104">Mongolia</option>
<option value="246">Montenegro</option>
<option value="211">Montserrat</option>
<option value="105">Morocco</option>
<option value="106">Mozambique</option>
<option value="242">Myanmar, Union of (Burma)</option>
<option value="107">Namibia</option>
<option value="215">Nauru</option>
<option value="108">Nepal</option>
<option value="109">Netherlands</option>
<option value="110">Netherlands Antilles</option>
<option value="216">Neutral Zone</option>
<option value="213">New Caledonia (French)</option>
<option value="111">New Zealand</option>
<option value="112">Nicaragua</option>
<option value="113">Niger</option>
<option value="114">Nigeria</option>
<option value="217">Niue</option>
<option value="214">Norfolk Island</option>
<option value="115">North Korea</option>
<option value="209">Northern Mariana Islands</option>
<option value="116">Norway</option>
<option value="117">Oman</option>
<option value="118">Pakistan</option>
<option value="222">Palau</option>
<option value="249">Palestinian Territory, Occupied</option>
<option value="119">Panama</option>
<option value="219">Papua New Guinea</option>
<option value="120">Paraguay</option>
<option value="121">Peru</option>
<option value="122">Philippines</option>
<option value="221">Pitcairn Island</option>
<option value="123">Poland</option>
<option value="218">Polynesia (French)</option>
<option value="124">Portugal</option>
<option value="248">Puerto Rico</option>
<option value="126">Qatar</option>
<option value="127">Reunion (French)</option>
<option value="128">Romania</option>
<option value="129">Russian Federation</option>
<option value="130">Rwanda</option>
<option value="197">S. Georgia &amp; S. Sandwich Islands</option>
<option value="244">Saint Barthélemy</option>
<option value="224">Saint Helena</option>
<option value="205">Saint Kitts &amp; Nevis Anguilla</option>
<option value="206">Saint Lucia</option>
<option value="247">Saint Martin</option>
<option value="220">Saint Pierre and Miquelon</option>
<option value="131">Saint Tome and Principe</option>
<option value="237">Saint Vincent &amp; Grenadines</option>
<option value="132">Samoa</option>
<option value="227">San Marino</option>
<option value="133">Saudi Arabia</option>
<option value="134">Senegal</option>
<option value="250">Serbia</option>
<option value="135">Seychelles</option>
<option value="136">Sierra Leone</option>
<option value="137">Singapore</option>
<option value="138">Slovakia</option>
<option value="139">Slovenia</option>
<option value="223">Solomon Islands</option>
<option value="140">Somalia</option>
<option value="141">South Africa</option>
<option value="142">South Korea</option>
<option value="143">Spain</option>
<option value="144">Sri Lanka</option>
<option value="145">Sudan</option>
<option value="146">Suriname</option>
<option value="225">Svalbard and Jan Mayen Islands</option>
<option value="147">Swaziland</option>
<option value="148">Sweden</option>
<option value="149">Switzerland</option>
<option value="150">Syria</option>
<option value="151">Tadjikistan</option>
<option value="152">Taiwan</option>
<option value="153">Tanzania</option>
<option value="154">Thailand</option>
<option value="155">Togo</option>
<option value="231">Tokelau</option>
<option value="232">Tonga</option>
<option value="234">Trinidad and Tobago</option>
<option value="156">Tunisia</option>
<option value="157">Turkey</option>
<option value="158">Turkmenistan</option>
<option value="229">Turks and Caicos Islands</option>
<option value="235">Tuvalu</option>
<option value="159">Uganda</option>
<option value="160">UK</option>
<option value="161">Ukraine</option>
<option value="162">United Arab Emirates</option>
<option value="163">Uruguay</option>
<option selected="selected" value="164">US</option>
<option value="236">USA Minor Outlying Islands</option>
<option value="165">Uzbekistan</option>
<option value="239">Vanuatu</option>
<option value="166">Vatican City</option>
<option value="167">Venezuela</option>
<option value="168">Vietnam</option>
<option value="169">Virgin Islands (British)</option>
<option value="238">Virgin Islands (USA)</option>
<option value="240">Wallis and Futuna Islands</option>
<option value="188">Western Sahara</option>
<option value="170">Yemen</option>
<option value="171">Yugoslavia</option>
<option value="173">Zambia</option>
<option value="174">Zimbabwe</option>
</select>
                                                      
                                                        
                                                    <div>
                                                        
                                                        <br>
                                                        <label style="margin-left: -5%;" for="jobTitle" class="col-sm-2 control-label">Time Period:</label>
                                                        
                                                        <br>
                                                        <br>
                                                       
                                                        <div style="margin-left: -2%;">
                                                             <label style="clear: both;" for="startDate" class="col-sm-2 control-label">Start Date</label>
                                                              <select aria-labelledby="StartMonthLabel" id="StartMonth" name="startMonth">
                                                                  <option selected="selected" value="0">Month</option>
                                                                    <option value="1">January</option>
                                                                    <option value="2">February</option>
                                                                    <option value="3">March</option>
                                                                    <option value="4">April</option>
                                                                    <option value="5">May</option>
                                                                    <option value="6">June</option>
                                                                    <option value="7">July</option>
                                                                    <option value="8">August</option>
                                                                    <option value="9">September</option>
                                                                    <option value="10">October</option>
                                                                    <option value="11">November</option>
                                                                    <option value="12">December</option>
                                                            </select>
                                                         
                                                         &nbsp&nbsp
                                                        <select aria-labelledby="StartYearLabel" id="StartYear" name="startYear"><option selected="selected" value="0">Year</option>
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
                                                        
                                                         <br>
                                                         <br>
                                                        
                                                        <label style="clear: both;" for="startDate" class="col-sm-2 control-label">End Date</label>
                                                        <select aria-labelledby="StartMonthLabel" id="StartMonth" name="endMonth">
                                                                  <option selected="selected" value="0">Month</option>
                                                                    <option value="1">January</option>
                                                                    <option value="2">February</option>
                                                                    <option value="3">March</option>
                                                                    <option value="4">April</option>
                                                                    <option value="5">May</option>
                                                                    <option value="6">June</option>
                                                                    <option value="7">July</option>
                                                                    <option value="8">August</option>
                                                                    <option value="9">September</option>
                                                                    <option value="10">October</option>
                                                                    <option value="11">November</option>
                                                                    <option value="12">December</option>
                                                            </select>
                                                        
                                                          &nbsp&nbsp
                                                        <select aria-labelledby="StartYearLabel" id="StartYear" name="endYear"><option selected="selected" value="0">Year</option>
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
                                                
                                                    </div>

                                                      <div class="form-group" style="text-align:center; margin-top: 5%;">

                                                            <div>                                                  
                                                                
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
                                 
                                 
            insertUserExperience($userEmail, $user_employer, $user_jobTitle, $user_location, $user_description, $user_country, $user_startDateMonth, $user_startDateYear, $user_endDateMonth, $user_endDateYear);
              
                                     

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

    <?php
    if(isset($_POST['updateUserInfo']))  
        {  
            $user_fName ="";
            $user_lName ="";

            if(empty($_POST['userInfoFname'])) {
                //$emailErr = "Email is required";
                //error here
                  
            } else {
                $user_fName = test_user_input($_POST['userInfoFname']); 
              
            }
            
            if(empty($_POST['userInfoLname'])) {
                //$emailErr = "Email is required";
                //error here
                  
            } else {
                 $user_lName = test_user_input($_POST['userInfoLname']);  
               
            }
         
          if($user_fName == getFirstName($userEmail) && $user_fName == getLastName($userEmail)){}
          else
          {
            updateUserInformation($userEmail, $user_fName,  $user_lName);

          }
     
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
