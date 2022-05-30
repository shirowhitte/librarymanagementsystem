<?php
include_once '../classResource.php';
include_once 'classLibrary.php';//connection
include_once '../assets/conn/dbconnect.php';//connection
session_start();
// Get the variables.

$user= new User;
$userId = $_SESSION['userId'];

    if (!$user->session())
    {  
        header("Location:../index.php");  
    }

if(isset($_POST['logout'])) 
{
  $user->logout();
  header('Location: liblogin.php'); //exit to home page
  exit;
}

$borrow = new Book();
$id = $_GET['id'];


$res=mysqli_query($con,"SELECT * FROM add_book WHERE bookId=".$id);
$bookRow=mysqli_fetch_array($res,MYSQLI_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Payment Gateway</title>
        <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
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
                width: 65%;
                height: 400px;
                margin-left: auto;
                margin-right: auto;
                padding: 40PX;
                border:  transparent;
                background-color: whitesmoke;
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

                <div class = "container-edit">

                <h1 style="text-align: center;color: whitesmoke;">Payment Details</h1>

                	<?php 
                    $date1 = strtotime($bookRow['borrowDate']);
                    $date2 = strtotime($bookRow['returnDate']);
                    $diff = (($date2-$date1)/60)/60/24;
                    $cost = $bookRow['bookRegularcost']* $diff;
                    echo "<br>"; echo "<br>";    echo "<br>"; 
                    echo "<h2 style='color:white;text-align:center;'>"."Length of Borrowing:". " ".$diff   ." ". "day(s)</h2>";
                    echo "<h2 style='color:white;text-align:center;'>"."Borrowing Fee: $". " ".$cost   ."</h2>";
                        echo "<br>"; echo "<br>";    echo "<br>"; echo "<br>";    echo "<br>"; echo "<br>";
                    echo "<h2 style='color:white;text-align:center;'>"."Please return the book by ". " ".$bookRow['returnDate'] ." to avoid extra charges</h2>";
                    ?>
                    <br><br><br>
                    <h3 style="color:white;text-align:center;"><a href="userviewresource.php"><b>Proceed to payment <i class="fa fa-credit-card" aria-hidden="true"></i></a></h3><br><br>
                <br><br><br><br><br><br><br>
                 
                </div>
                <br><br>
            <h3 style="color:white;text-align:center;"><a href="user.php"><b><i class="fa fa-home" aria-hidden="true"></i> &nbsp;Back to Menu </a></h3><br><br>
            </div>
        </section>


        

    
   
</body>
</html>