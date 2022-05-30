<?php
include_once 'classLibrarian.php';//connection
include_once '../classResource.php';//connection
session_start();

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

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Insert resources</title>
        <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
        <link href="../assets/css/material.css" rel="stylesheet">
        <style>
           body
           {
                background-image: url("../assets/img/picture4.jpg");
                color: #333333;
           }

           input
           {
            padding-left: 15px;
            width: 30%;
           }

           select
           {
            width: 30%;
              height: 37px;
              padding: 10px
              font-size: 13px;
              color: #666666;
              border-radius: 30px;
              border: none;
              padding-left: 15px;
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
                            <input style="width:65px;background-color:transparent;color: whitesmoke; border-style:none;" type= "submit" value="Log Out     " name="logout" />
                           
                            <i style="background-color:transparent;color: whitesmoke; border-style:none;" class="fa fa-fw fa-power-off"></i> 
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </form>
                    </b>
                </div>
        
        </div>

        <!-- 1st section start -->
        <section>
            <div class="container">
                <div class="container-lib-insert">
                    <b style="font-size: 25px;">Insert New Resources</b> <br><br><!--form for librarian to register  -->
                    <form action="insert.php" role="form" method="POST" accept-charset="UTF-8" >
                    <br>
                     <label><b>Type </b></label>&nbsp; 
                    <select name="type" >
                        <option value="Book">Book</option>
                        <option value="Textbook">Textbook</option>
                        <option value="Workbook">Workbook</option>
                    </select><br><br>

                    <label><b>Book ID </b></label>&nbsp; 
                    <input type ="text" placeholder="Enter Book ID" name="bookId" required=""><br><br>

                    <label><b>ISBN-13</b></label> &nbsp; &nbsp; 
                    <input type ="text" placeholder="Enter 13-DIGIT ISBN" name="ISBN" required=""><br><br>

                    <label><b>Book Title</b></label> &nbsp; 
                    <input type ="text" placeholder="Enter Tittle" name="bookTitle" required=""><br><br>

                    <label><b>Author</b></label> &nbsp; 
                    <input type="text" placeholder="Enter Author" name="bookAuthor" required><br><br><br>
                   
                    <div class="container-lib-insert-1">
                    <label><b>Publisher</b></label> &nbsp; 
                    <input type="text" placeholder="Enter Publisher" name="bookPublisher" required><br><br>

                    <label><b>Status </b></label>&nbsp; 
                    <select name="bookStatus" >
                        <option value="Available">Available</option>
                        <option value="Borrowed">Borrowed</option>
                        <option value="Extended">Extended</option>
    
                    </select><br><br>

                    <label><b>Regular Cost per Day</b></label> &nbsp; 
                    <input type="text" placeholder="eg: $5" name="bookRegularcost" required><br><br>
                    <label><b>Extended Cost per Day</b></label> &nbsp; 
                    <input type="text" placeholder="eg: $3.90" name="bookExtendedcost" required><br><br><br>

                    <button style="width:80%;" type="submit" name="insertbook" id="insertbook" ><b>Insert Resource</b></button>
                    <br>
                </div>

                                      
            </div>
           
        <?php
               $book = new Book();  
               if ($_SERVER["REQUEST_METHOD"] == "POST")
               {  
                  $insert = $book->insert($_REQUEST['bookId'],$_REQUEST['ISBN'],$_REQUEST['bookTitle'],$_REQUEST['bookAuthor'],$_REQUEST['bookPublisher'],$_REQUEST['bookStatus'],$_REQUEST['bookRegularcost'],$_REQUEST['bookExtendedcost'],$_REQUEST['type']);  
                    if($insert)
                    {  
                        echo "<br><h3 style='background-color:whitesmoke;color:#1fae51;text-align:center;'>Book added successfully</h3>";  
                    }
                    else
                    {  
                        echo "<br><h3 style='background-color:whitesmoke;color:#D72503;text-align:center;'>Not Successful</h3>";  
                    }  
                }  
               ?>

    </form>
     <br>
            <h3 style="color:white;text-align:center;"><a href="librarian.php"><b><i class="fa fa-home" aria-hidden="true"></i> &nbsp;Back To Menu</a></h3><br><br>


                    

                                       

                       
        
                </div>

             
            </div>
        </section>

    
   
</body>
</html>