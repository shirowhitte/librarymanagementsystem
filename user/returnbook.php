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
  header('Location: ../index.php'); //exit to home page
  exit;
}

$borrow = new Book();
$id = $_GET['id'];


$res=mysqli_query($con,"SELECT * FROM add_book WHERE bookId=".$id);
$bookRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
if (isset($_POST['update'])) {
$id = $_GET['id'];
$bookStatus= "Available";

$result=mysqli_query($con,"UPDATE `add_book` SET `bookStatus`='$bookStatus',`borrower`=NULL,`borrowDate`=NULL,`returnDate`=NULL,`extendDate`=NULL WHERE bookId=$id");
$res=mysqli_query($con,"INSERT INTO `history`(`userId`, `bookId`) VALUES ($userId,$id)");
if($result)
{ 
    $abc = "Book ID:"." ".$id." ". "has been returned! Thank You for choosing us :)";
    ?>
    <script type="text/javascript">

        var test="<?php echo $abc; ?>";
    </script>
    <?php
    echo '<script language="javascript">';
     echo 'alert(test)';
     echo '</script>';
    ?>
    <script>
        
        window.location.href = "user.php";
    </script>
    <?php
    
}
else
{
    echo "Error editing record"; // display error message if not delete
}


?>
<?php

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Borrow Resource</title>
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

                <h1 style="text-align: center;color: whitesmoke;">Return Resources</h1><br>
                <form action="<?php $_PHP_SELF ?>" method="post">
               
                    <?php $borrow->returnBook($id);?>

                <br>
                 <button style="float: right;width:30%;" type="submit" name="update" id="update" ><b>Return Now</b></button>
             </form>
             <br><br><br><br>
                <br>
                 
                </div>
                <br><br>
            <h3 style="color:white;text-align:center;"><a href="user.php"><b><i class="fa fa-home" aria-hidden="true"></i> &nbsp;Back To Menu </a></h3><br><br>

   

            </div>
        </section>


        

    
   
</body>
</html>