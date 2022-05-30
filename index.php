<?php
include_once 'user/classLibrary.php';//connection
session_start();//session start

   $user = new User();  
   if ($user->session())  
   {  
      header("location:user/user.php");  
   }  
  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Digital Library</title>
        <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
        <link href="assets/css/material.css" rel="stylesheet">
        <style>

            body
            {
                background-image: url("assets/img/cover123.jpg");
                color: #333333;
            }

        </style>
    </head>
    <body >
        <!-- navigation -->
        <div class="navigation">
            <br>
               <h2> <b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UOW  |  Digital Library</b></h2>   
                <div class="hi">                         
                    <b>
                    <!--2 hyperlink to uow -->
                    <a style="border: transparent;color: whitesmoke;background-color: rgba(0, 0, 0, 0.5);font-size: 20px;"
                    href="http://www.uow.edu.au/student/sols-help/index.html" target="_blank">SOLS Help</a> 
                    <a style="border: transparent;color: whitesmoke;background-color: rgba(0, 0, 0, 0.5);font-size: 20px;"
                    href="https://www.uow.edu.au/student/central/contact/" target="_blank">&nbsp;&nbsp;Contact Student Central</a> &nbsp;&nbsp;
                    </b>
                </div>
        
        </div>

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {  
          $login = $user->login($_REQUEST['userId'],$_REQUEST['password']);  
          if($login){  
             header("location:user/user.php");  
          }
          else
          {  
             echo "<br><h3 style='color:white;text-align:center;'>Login Failed</h3>";  
          }  
        }  
        ?>
 
        <!-- 1st section start -->
        <section>
            <div class="container">
                <div class="container-row">
                    <br> <!-- form for user to login-->
                    <b style="font-size: 20px;">User Login</b> <span class="caret"></span>
                    <form class="form" role="form" method="POST" accept-charset="UTF-8" >                           
                    <br>
                        <input style="padding:10px;border-radius: 4px;" type="text" name="userId" placeholder="User ID" required>
                                                       
                        <input style="padding:10px;border-radius: 4px;" type="password"  name="password" placeholder="Password" required><br><br>
                                                      
                        <button type="submit" name="login" id="login" ><b>Login  <i class="fa fa-sign-in" aria-hidden="true"></i></b></button>
                    </form><br>
                    <!-- 2 hyperlink for user/lib to register-->
                    <p>Not an user? Click here to register</p>
                    <a href="user/userregistration.php"><b>User Registration</b></a>&nbsp;
                    <a href="librarian/registration.php"><b>Librarian Registration</b></a>
                </div>
            </div>
        </section>

        <!--a bottom copyright -->
        <div class="end">             
            <span class="fa fa-bookmark"></span>      
            <h4 style="color:white">University of Wollongong</h4>
            <p><b>Northfields Ave Wollongong, NSW 2522 Australia<br>
            Phone: 1300 367 869<br>
            International: +61 2 4221 3218<br>
            Switchboard: +61 2 4221 3555</b></p>
            <p>Copyright © 2021 University of Wollongong</p><br>
            <!--hyperlink for lib to login -->
            <p><a href="librarian/liblogin.php"><b>Librarian Login</b></a></p>
            <br>
        </div>
    </div> 
</body>
</html>