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

        <div class="container-full"> <!--Start of full container-->

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


            <div class="container" id="main"> <!--start of container -->

                <!--Start Navigation Bar Here-->
                <div class="navbar navbar-fixed-top" id="backg"> <!--start of navbar -->
                    <div class="container">

                        <a class="navbar-brand" href="#"><img src="img/logo2.png" alt="The Logo"></a>

                    </div>              

                </div> <!--end of navbar-->
                <!--End Navigation Bar Here-->

            </div> <!--end of container -->



             <!--Start Login Panel Here-->
             <div class="panel panel-default" id="PanelLogin" style="height: 37%">
                    
                    <div class="panel-heading text-center">
                              
                             <h3 class="panel-title">Log in to ServiceU</h3>
                                        
                    </div>

                    <div class="panel-body">
                            <form method="POST">

                                  <!--Start Email Address-->
                                  <div class="form-group">
                                        <label class="sr-only" for="exampleInputEmail3">Email address</label>
                                        
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>

                                            <input type="email" name="loginEmail" class="form-control" id="exampleInputEmail3" placeholder="Enter email">
                                        
                                        </div>
                                  </div> <!--End Email Address-->
                        
                                  <!--Start Password-->
                                  <div class="form-group">
                                        <label class="sr-only" for="exampleInputPassword3">Password</label>

                                        <div class="input-group">   
                                             <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                              <input type="password" name="loginPassword" class="form-control" id="exampleInputPassword3" placeholder="Password">
                                         </div>

                                  </div><!--End Password-->

                                  <div class="checkbox">
                                        <label><input type="checkbox">Remember me</label>
                                        <button type="button" class="btn btn-link">Forgot password?</button>
                                  </div>

                                  
                                  <button type="submit" value="login" name="login" class="btn btn-primary" id="btnlogin">Sign in</button>
                                  
                                  <label id="labelor">Or</label>
                                  
                                  <button type="button" class="btn btn-success" id="btnsignup">Sign Up!</button>
                                
                            </form>

                    </div>

              </div> <!--End Login Panel Here-->

        </div><!--End of full container-->

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



    
<!--registration pop  up start here-->
  <div class="blackout"></div>
    
  <div class="panel panel-default" id="RegistrationBox" style="height: 78%; z-index: 999">
        
            <div class="panel-heading text-center" id="Rhead" style="height: 10%">
                                  
                <h3 class="panel-title pull-left" id="ptRegister"><b>Join ServiceU Today</b></h3>
                <div style="position: fixed; left:30%; right:8%;">
                                <span class="glyphicon glyphicon-remove active" id="xbox"></span>
                                </div>
                                            
            </div>
            
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <div class="form-group" id="Rform">
                    <label for="InputFirstName">First name</label>
                    <input type="text" name="firstName" class="form-control" id="InputFirstname" placeholder="Enter first name">
                   
                </div>

                <div class="form-group" id="Rform">
                    <label for="InputLastName">Last name</label>
                    <input type="lastName" name="lastName" class="form-control" id="InputLastname" placeholder="Enter last name">
                </div>

                 <div class="form-group" id="Rform">
                    <label for="InputPassword">Password</label>
                    <input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Password">
                </div>

                 <div class="form-group" id="Rform">
                    <label for="InputEmailAdress">Email Address</label>
                    <input type="email" name="email" class="form-control" id="InputPassword1" placeholder="Enter Email">
                </div>

                <div id="Rform">
                    <h5><small>By clicking Sign Up, you are indicating that you have read and agree to the <button type="button" class="btn btn-link" id="btnTP">Terms of Service </button> and <button type="button" class="btn btn-link" id="btnTP">Privacy Policy</button>.</small></h5>
                </div>

                <div class="text-center" id="btnSignup">

                    <button type="submit" value="submit" name="submit" class="btn btn-primary">Register</button>

                </div>

            </form> 
              
        

   </div> <!-- registration pop up end here -->




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