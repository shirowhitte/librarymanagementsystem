<?php
//user registrarion
include_once 'classLibrary.php';//connection

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Registration</title>
        <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
        <link href="../assets/css/material.css" rel="stylesheet">
        <style>
            input
            {
              text-align: center;
            }
        
            body
            {
                background-image: url("../assets/img/picture.jpg");
            }

        </style>
    </head>
    <body>

        <!-- 1st section start -->
        <section>
            <div class="container-row-2">
                <b style="font-size: 25px;">User Registration</b> <!--Form for user to register-->
                    <form action="userregistration.php" role="form" method="POST" accept-charset="UTF-8" >
                    <br>
                    <label><b>User ID </b></label> <br>
                    <input type ="text" placeholder="Enter User ID" name="userId" required=""><br><br>

                    <label><b>First Name </b></label> <br>
                    <input type ="text" placeholder="Enter First Name" name="userFirstName" required=""><br><br>

                    <label><b>Last Name </b></label> <br>
                    <input type ="text" placeholder="Enter Last Name" name="userLastName" required=""><br><br>
    
                    <label><b>Contact No </b></label> <br>
                    <input type="text" placeholder="Contact Number" name="userPhone" required><br><br>
                    <label><b>Email </b></label>  <br>
                    <input type="email" placeholder="Enter Email" name="userEmail" required><br><br>

                    <label><b>Password </b></label> <br>
                    <input type="password" placeholder="Enter Password" name="password" id="password" required><br><br>

                    <label><b>Repeat Password </b></label> <br>
                    <input type="password" placeholder="Re-enter Password" name="pwdr" id="p2" required>
                                                   
                    <br><br><br>
                                                
                    <button type="submit" name="signup" id="signup" ><b>Sign Up</b></button><br>
            <?php
               $user = new User();  
               if ($_SERVER["REQUEST_METHOD"] == "POST")
               {  
                  $register = $user->register($_REQUEST['userId'],$_REQUEST['password'],$_REQUEST['userFirstName'],$_REQUEST['userLastName'],$_REQUEST['userPhone'],$_REQUEST['userEmail']);  
                    if($register)
                    {  
                        echo "<br><h3 style='background-color:whitesmoke;color:#1fae51;text-align:center;'>Registration Successful!</h3>";  
                    }
                    else
                    {  
                        echo "<br><h3 style='background-color:whitesmoke;color:#D72503;text-align:center;'>Registration Not Successful</h3>";  
                    }  
                }  
               ?>

                </form>
                </div> 
            </section><!-- end of 1st section -->

        <div class="ending">
               <p><a href="../index.php"><b>Go Back</b></a></p><!--a go back hyperlink-->
        </div>       
    </div>
   
</body>
</html>