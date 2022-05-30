<?php
include_once 'classLibrarian.php';//connection
session_start();//session start
//call class
 $lib = new Lib();  
   if ($lib->session())  
   {  
      header("location:librarian.php");  
   }  
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {  
        //checking the posted id & password
        $login = $lib->login($_REQUEST['libId'],$_REQUEST['password']);  
        if($login)
        {  
           header("location:librarian.php");  
        }
        else
        {  
           echo "<br><br><h2 style='color:white;text-align:center;'>Login Failed</h2>";  
        }  
   }  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Librarian | Digital Library</title>
        <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
        <link href="../assets/css/material.css" rel="stylesheet">
        <style>
            body
            {
                background-image: url("../assets/img/pic2.jpg");
                color: whitesmoke;
            }

        </style>
    </head>
    <body >
        <!-- 1st section start -->
        <section>
            <div class="container-1">
                <div class="container-row-1">
                        <br>
                            <b style="font-size: 25px;">Librarian Login</b> <span class="caret"></span><!-- form for librarian to login-->
                                <form class="form" role="form" method="POST" accept-charset="UTF-8" >
                                <br>
                                <input style="padding:10px;border-radius: 4px;" type="text" name="libId" placeholder="Librarian ID" required><br><br>
                                <input style="padding:10px;border-radius: 4px;" type="password"  name="password" placeholder="Password" required><br><br>
                                <button type="submit" name="login" id="login" ><b>Login</b></button>
                                </form><br>
    
                </div>
             </div>
        </section>

        <div class="end"><!--bookmark-->
            <br><br><br>
            <span class="fa fa-bookmark"></span>
            <h4 style="color:white">University of Wollongong</h4>
            <p><b>Northfields Ave Wollongong, NSW 2522 Australia<br>
            Phone: 1300 367 869<br>
            International: +61 2 4221 3218<br>
            Switchboard: +61 2 4221 3555</b></p>
            <p>Copyright © 2021 University of Wollongong</p><br>
            <br>
            <p><a href="../index.php"><b>Go Back</b></a></p>
            <br>
        </div>
    </div>
       
</body>
</html>