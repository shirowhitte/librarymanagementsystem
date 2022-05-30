<?php
//librarian registration
include_once 'classLibrarian.php';//connection

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Librarian Registration</title>
        <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
        <link href="../assets/css/material.css" rel="stylesheet">
        <style>
            input
            {
              text-align: center;
            }

            body
            {
                background-image: url("../assets/img/picture1.jpg");
            }
        </style>
    </head>
    <body>
        <!-- 1st section start -->
        <section>
            <div class="container-row-2">
                <b style="font-size: 25px;">Librarian Registration</b> <br><!--form for librarian to register  -->
                    <form action="registration.php" role="form" method="POST" accept-charset="UTF-8" >
                    <br>

                    <label><b>Librarian ID </b></label> <br>
                    <input type ="text" placeholder="Enter User ID" name="libId" required=""><br><br>

                    <label><b>First Name </b></label> <br>
                    <input type ="text" placeholder="Enter First Name" name="libFirstName" required=""><br><br>

                    <label><b>Last Name </b></label> <br>
                    <input type ="text" placeholder="Enter Last Name" name="libLastName" required=""><br><br>

                    <label><b>Contact No </b></label> <br>
                    <input type="text" placeholder="Contact Number" name="libPhone" required><br><br>
                    <label><b>Email </b></label> <br>
                    <input type="email" placeholder="Enter Email" name="libEmail" required><br><br>

                    <label><b>Password </b></label> <br>
                    <input type="password" placeholder="Enter Password" name="password" id="password" required><br><br>

                    <label><b>Repeat Password </b></label> <br>
                    <input type="password" placeholder="Re-enter Password" name="pwdr" id="p2" required>
                                                           
                    <br><br>
                    <button type="submit" name="signup" id="signup" ><b>Sign Up</b></button>
                    
                <?php
                    //call class
                    $lib = new Lib();  
                    if ($_SERVER["REQUEST_METHOD"] == "POST")
                    {  
                        //call function
                          $register = $lib->register($_REQUEST['libId'],$_REQUEST['password'],$_REQUEST['libFirstName'],$_REQUEST['libLastName'],$_REQUEST['libPhone'],$_REQUEST['libEmail']);  
                          if($register)
                          {  
                            //display msg
                             echo "<br><br><h3 style='background-color:whitesmoke;color:#1fae51;text-align:center;'>Registration Successful!</h3>";  
                          }
                          else
                          {  

                            //display error
                             echo "<h3 style='background-color:whitesmoke;color:#D72503;text-align:center;'>Registration Not Successful</h3>";  
                          }  
                    }  
                ?>
                                      
            </div>  
        </form>
        <div class="ending">
            <p><a href="../index.php"><b>Go Back</b></a></p><!--a go back hyperlink  -->
        </div>
    </section>   
    </div>
    
   
</body>
</html>