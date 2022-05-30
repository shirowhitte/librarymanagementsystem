<?php
include_once 'classLibrary.php';//connection
include_once '../assets/conn/dbconnect.php';//connection
session_start();

$user= new User;
$userId = $_SESSION['userId'];

    if (!$user->session())
    {  
        header("Location:../index.php");  
    }


if(isset($_POST['logout'])) 
{
  $user->logout();
  header('Location: ../index.php'); //exit to home page
  exit;
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>View Resource</title>
        <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../assets/css/material.css" rel="stylesheet">
      
        <style>
           body
           {
                background-image: url("../assets/img/picture5.jpg");
                color: #333333;
           }
            table
            {
                text-align: center;
                width: 90%%;
                margin-left: auto;
                margin-right: auto;
                padding: 50PX;
                margin-top: 30px;
                border:  transparent;
                border-collapse: collapse;
                background-color: whitesmoke;

            }

           tr, td, th
           {
            height: 40px;
            width: 400px;
            padding: 10px;
            text-align: center;
            
           }

            tr:first-child
            {  
                height: 10px;padding: 10px;border-bottom: 1px solid #555;margin-bottom: 0;
            }
        </style>
    </head>
    <body >
        <!-- navigation -->
        <div class="navigation">
            <br>
               <h2 style="color:whitesmoke;text-align: center;"> <b> &nbsp;&nbsp;&nbsp;Welcome, <?php echo $user->get_fullname($userId);?> </b></h2>   
                <div class="hi">                         
                    <b>
                        <form method = "POST">
                            <input style="background-color:transparent;color: whitesmoke; border-style:none;" type = "submit" value="Log Out       " name="logout" />
                            &nbsp;
                            <i style="background-color:transparent;color: whitesmoke; border-style:none;" class="fa fa-fw fa-power-off"></i> 
                        </form>
                    </b>
                </div>
        
        </div>

        <!-- 1st section start -->
        <section>
            <div class="container">
              

                <div class = "container-lib-view">

               <br><BR>
                
                <input style="float:right;padding-left: 20px;width:500px;" type="text" name="search_text" id="search_text" placeholder="Search by Resource Details" class="form-control" /><br><br> 

                <div id="result"></div>

                </div>
                <br>
            <h3 style="color:white;text-align:center;"><a href="user.php"><b><i class="fa fa-home" aria-hidden="true"></i> &nbsp;Back To Menu</a></h3><br><br>
             
            </div>
        </section>
        <script>
        $(document).ready(function(){
            load_data();
            function load_data(query)
            {
                $.ajax({
                    url:"fetch.php",
                    method:"post",
                    data:{query:query},
                    success:function(data)
                    {
                        $('#result').html(data);
                    }
                });
            }
            
            $('#search_text').keyup(function(){
                var search = $(this).val();
                if(search != '')
                {
                    load_data(search);
                }
                else
                {
                    load_data();            
                }
            });
        });
        </script>



        

    
   
</body>
</html>