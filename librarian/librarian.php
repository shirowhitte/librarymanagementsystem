<?php
include_once 'classLibrarian.php';//connection
session_start();
//call class
$lib = new Lib;
$libId = $_SESSION['libId'];//get id

    if (!$lib->session())
    {  
        header("Location:../index.php");  
    }
//if click on logout
if(isset($_POST['logout'])) 
{
    $lib->logout();
    header('Location: liblogin.php'); //exit to home page
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Librarian Dashboard</title>
        <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
        <link href="../assets/css/material.css" rel="stylesheet">
        <style>
           body
           {
                background-image: url("../assets/img/picture4.jpg");
                color: #333333;
           }
         
        </style>
            
    </head>
    <body >
        <!-- navigation -->
        <div class="navigation">
            <br>
               <h2 style="color:whitesmoke;text-align: center;"> <b> &nbsp;&nbsp;&nbsp;Welcome, Librarian <?php echo $lib->get_fullname($libId);?> </b></h2>   
                <div class="hi">                         
                    <b>
                        <form method = "POST">
                            <input style="background-color:transparent;color: whitesmoke; border-style:none;" type = "submit" value="Log Out     " name="logout" />
                            &nbsp;
                            <i style="background-color:transparent;color: whitesmoke; border-style:none;" class="fa fa-fw fa-power-off"></i> 
                        </form>
                    </b>
                </div>
        
        </div>

        <!-- 1st section start -->
        <section>
            <div class="container">
            
                <div class = "container-lib2">
                    <h2> MENU <i class="fa fa-caret-down" aria-hidden="true"></i> </h2><br><br><br>
                    <p><a href="insert.php"><b><i class="fa fa-pencil-square-o" aria-hidden="true"></i> &nbsp;INSERT RESOURCES</b></a></p><br><br>
                    <p><a href="viewresource.php"><b><i class="fa fa-th-list" aria-hidden="true"></i> &nbsp;VIEW & EDIT RESOURCES</a></p><br><br>
                 <br><br>
                </div>
             
            </div>
        </section>

        <div class="end" style="background-color: rgba(0, 0, 0, 0.2);padding-top: 20px;">             
            <span class="fa fa-bookmark"></span>      
            <h4 style="color:white">University of Wollongong</h4>
            <p><b>Northfields Ave Wollongong, NSW 2522 Australia<br>
            Phone: 1300 367 869<br>
            International: +61 2 4221 3218<br>
            Switchboard: +61 2 4221 3555</b></p>
            <p>Copyright © 2021 University of Wollongong</p><br>
            <!--hyperlink for lib to login -->
            
            <br>
        </div>



    
   
</body>
</html>