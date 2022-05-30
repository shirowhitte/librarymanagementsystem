<?php
include_once '../classResource.php';
include_once 'classLibrarian.php';//connection
include_once '../assets/conn/dbconnect.php';//connection
session_start();
// Get the variables.

$lib= new Lib;
$libId = $_SESSION['libId'];

    if (!$lib->session())
    {  
        header("Location:../index.php");  
    }

if(isset($_POST['logout'])) 
{
  $lib->logout();
  header('Location: liblogin.php'); //exit to home page
  exit;
}

$edit = new Book();
$id = $_GET['id'];


$res=mysqli_query($con,"SELECT * FROM add_book WHERE bookId=".$id);
$bookRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
if (isset($_POST['update'])) {

$id = $_GET['id'];
$bookStatus = $_POST['bookStatus'];
$bookRegularcost = $_POST['bookRegularcost'];
$bookExtentedcost = $_POST['bookExtentedcost'];
//variables

// mysqli_query("UPDATE blogEntry SET content = $udcontent, title = $udtitle WHERE id = $id");
$result=mysqli_query($con,"UPDATE `add_book` SET `bookStatus`='$bookStatus',`bookRegularcost`='$bookRegularcost',`bookExtentedcost`='$bookExtentedcost' WHERE bookId=$id");

if($result)
{ 
	$abc = "Book ID:"." ".$id." ". "has been modified";
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
		
		window.location.href = "viewresource.php";
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
        <title>Edit Resource</title>
        <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
        <link href="../assets/css/material.css" rel="stylesheet">
      
        <style>
           body
           {
                background-image: url("../assets/img/picture4.jpg");
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
              

                <div class = "container-edit">

                <h1 style="text-align: center;color: whitesmoke;"><?php $edit->getBookInfo($id);?></h1>
                <form action="<?php $_PHP_SELF ?>" method="post">
                	<?php $edit->getBookDetails($id);?>
                <br><br>
                 <button style="float: right;width:30%;" type="submit" name="update" id="update" ><b>Update Info</b></button>
                </form>
                <br><br><br><br>
                <br>
                 
                </div>
                <br>
            <h3 style="color:white;text-align:center;"><a href="viewresource.php"><b><i class="fa fa-reply" aria-hidden="true"></i> &nbsp;Previous Page </a></h3><br><br>

   

            </div>
        </section>

        

    
   
</body>
</html>