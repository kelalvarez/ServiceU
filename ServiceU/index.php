<!DOCTYPE html> 
<?php //session starts here 
    session_start(); 
    include('DatabaseFunctions.php');//make connection here 
    include("functions.php");
?>



<html lang="en"> <!--Start HTML-->

    <head> <!--Start Head-->

        <meta charset="UTF-8">
        <title>ServiceU Website</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, uer-scalable=no">

        <!--Bootstrap CSS-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

        <!--Customized CSS-->
        <link rel="stylesheet" href="css/mycss.css">

    </head> <!--End Head-->



    <!--BODY-->
    <body> <!--Start Body-->

        <div class="container-fluid" id="mainCon"> <!--Start of full container-->

            <!--Start Carousel Here-->
            <div class="carousel slide" id="myCarousel" data-ride="carousel"> <!--Start of background carousel-->



                <ol class="carousel-indicators">
                    <li data-target ="#myCarousel" data-slide-to = "0" class="active"></li>
                    <li data-target ="#myCarousel" data-slide-to = "1"></li>
                    <li data-target ="#myCarousel" data-slide-to = "2"></li>

                </ol>

                <!--Wrapper for slides-->
                <div class="carousel-inner"> <!--Inner -->

                        <div class="item active">
                            <img src="img/bg4.jpg" alt="img1" class="img-responsive">

                        </div>

                        <div class="item">
                            <img src="img/bg2.jpg" alt="img2" class="img-responsive">

                        </div>

                        <div class="item">
                            <img src="img/bg3.jpg" alt="img3" class="img-responsive">

                        </div>

                </div> <!--End Inner -->


                <!-- uncomment if you want glypcons-->
                 <!-- Carousel nav -->
                <!-- <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"> </a>

                 <a class="carousel-control right" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"> </a>-->

            </div> <!--End of background carousel-->
            <!--End Carousel Here-->
      

              <div class="container" id="loginContainer"> 

                <div class="loginSection" id="OuterloginContainer">
                    <div class="innerLoginSection">

                      <div class="innerLogin-Header">

                        <h3 class="innerLogin-Header-text">Already have an account?</h3>

                      </div>
                    
                      <div class="col-xs-12 col-sm-12">

                          <form role="form" method="POST" class="form-horizontal">

                              <div class="form-group">
                                     <label class="sr-only" for="email">Email address</label>
                                            
                                            <div class="input-group" id="LoginCSS">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>

                                                <input type="email" name="loginEmail" class="form-control" placeholder="Enter email">
                                            
                                            </div>
                              </div>

                              <!--Start Password-->
                                  <div class="form-group">
                                        <label class="sr-only" for="password">Password</label>

                                        <div class="input-group" id="LoginCSS">   
                                             <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                              <input type="password" name="loginPassword" class="form-control" id="exampleInputPassword3" placeholder="Password">
                                         </div>

                                  </div><!--End Password-->

                                  <div class="form-group">

                                        <div class="checkbox" id="LoginCSS">
                                              <label><input type="checkbox">Remember me</label>
                                              <button type="button" class="btn btn-link">Forgot password?</button>
                                        </div>

                                  </div>

                                  <div class="form-group">

                                        <div id="LoginCSS">
                                          <button type="submit" name="login" class="btn btn-primary btn-lg btn-block">Log In</button>
                                                

                                        </div>
                                  </div>

                                  <div class="form-group">

                                        <div id="LoginCSS">
                                          <button type="button" class="btn btn-success btn-lg btn-block" role="button" id="btnsignup">Sign Up!</button>
                                            
                                        </div>
                                  </div>

                          </form>

                      </div>


                
                </div>

              </div>


       </div> <!--Start of full container-->
 </div> 


    <!--registration pop  up start here-->
  <div class="blackout"></div>

      
  <div class="RegisrationSection" id="RegistrationBox">

        <span id="xbox" class="btn btn-default pull-right"><b>Close</b></span>

        <div class="RegistrationBox-Header">
              
                <h3 class="innerLogin-Header-text">Sign Up Now</h3>
              
        </div>
                    
        <div>

              <form role="form" method="POST" class="form-horizontal">

                    <div class="form-group">
                            <label class="sr-only" for="fname">First Name</label>
                                              
                               <div class="input-group" id="Rform">
                                   <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>

                                    <input type="firstName" name="firstName" class="form-control" placeholder="Enter First Name">


                                      <input type="lastName" name="lastName" class="form-control" placeholder="Enter Last Name">
                                                  
                                </div>
                    </div>

                    <div class="form-group">
                            <label class="sr-only" for="password">Password</label>
                                              
                                <div class="input-group" id="Rform">
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>

                                      <input type="password" name="password" class="form-control" placeholder="Password">
                                              
                                </div>
                      </div>

                       <div class="form-group">
                            <label class="sr-only" for="EmailAddress">Password</label>
                                              
                                <div class="input-group" id="Rform">
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>

                                      <input type="email" name="email" class="form-control" placeholder="Email Address">
                                              
                                </div>
                      </div>

                              
                      <div id="RformMSG">
                          <h5><small>By clicking Register, you are indicating that you have read and agree to the <button type="button" class="btn btn-link" id="btnTP">Terms of Service </button> and <button type="button" class="btn btn-link" id="btnTP">Privacy Policy</button>.</small></h5>
                      </div>

                      <div class="text-center" id="btnSignup">

                      <button type="submit" value="submit" name="submit" class="btn btn-primary">Register</button>

                </div>
                        
                    

                  </form>

             </div>
             
   </div>

        






    <!-- LOG in and sign up php code start here -->
    <?php 
        if(isset($_POST['login']))  
        {  
            $user_email ="";
            $user_pass ="";

            if(empty($_POST['loginEmail'])) {
                //$emailErr = "Email is required";
                //error here
                  
            } else {
                $user_email= test_user_input($_POST['loginEmail']); 
            }
            
             if(empty($_POST['loginPassword'])) {
                //$emailErr = "Email is required";
                //error here
                  
            } else {
                $user_pass= test_user_input($_POST['loginPassword']);  
            }
             
         
            if(validateLogin($user_email, $user_pass) == True)  
            {  
                echo "<script>window.open('services.php','_self')</script>";  
          
                $_SESSION['loginEmail']=$user_email;//here session is used and value of $user_email store in $_SESSION.  
          
            }  
            else  
            {  
              echo "<script>alert('Email or password is incorrect!')</script>";  
            }  
        }  


        if(isset($_POST['submit']))  
    { 
        $firstnameErr = $user_emailErr = $lastnameErr = $passwordnameErr = "";

        $user_fname ="";  
        $user_lname =""; 
        $user_password ="";   
        $user_email ="";  
      
      if(empty($_POST['email'])) {
        //$emailErr = "Email is required";
          
      } else {
        $user_email = test_user_input($_POST['email']);
      }
      
      if(empty($_POST['firstName'])) {
        //$firstnameErr = "First Name is required";

      } else {
        $user_fname = test_user_input($_POST['firstName']);
      }

      if(empty($_POST['lastName'])) {
        //$lastnameErr = "Last Name is required";
      } else {
        $user_lname = test_user_input($_POST['lastName']);
      }

      if(empty($_POST['password'])) {
        //$passwordnameErr = "Password is required";
      } else {
        $user_password = test_user_input($_POST['password']);
      }

       if(!empty($user_email) && !empty($user_fname) && !empty($user_lname) && !empty($user_password))
        {
            register($user_email, $user_fname, $user_lname, $user_password);
            echo"<script>window.open('index.php','_self')</script>";  
        }
       else
        {
          echo "<script>alert('Cant Register, Some fields are missing!')</script>"; 
        }
      
    }  




    ?>


        <!--Start online JSS first-->
        <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>

        <!--Bootstrap JSS-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


        <!--Customized JSS-->
        <script src="js/myjs.js"></script>



        <!--  //This is the function that closes the pop-up-->
<script>
        function endBlackout(){
        $(".blackout").css("display", "none");
        $("#RegistrationBox").css("display", "none");
        
        }

    //This is the function that starts the pop-up
    function strtBlackout(){
        $("#RegistrationBox").css("display", "block");
        $(".blackout").css("display", "block");
        }

    //Sets the buttons to trigger the blackout on clicks
    $(document).ready(function(){
        $("#btnsignup").click(strtBlackout); // open if btn is pressed
        $(".blackout").click(endBlackout); // close if click outside of popup
        $("#xbox").click(endBlackout); // close if close btn clicked

        // Automatically trigger the pop-up after 10 seconds
        //setTimeout( strtBlackout, 10000);
    });
</script>


    </body> <!--End Body-->

</html> <!--End HTML-->


<!--
<div class ="headerBox">
            
            <h3>Register on ServiceU</h3> 
            <div class="closeBox">Close</div>
        
        </div> -->