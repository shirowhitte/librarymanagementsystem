<?php
include_once 'classLibrary.php';//connection
include_once '../assets/conn/dbconnect.php';//connection
session_start();

$user = new User;
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
        <title>History</title>
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
                background-color: whitesmoke;
                height: 50%;
                border: transparent;
                text-align: center;
                
            }
            tr,th,td
            {
                padding: 10px;
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
              
                    <h3 style="color:black;text-align: center;">Borrowing History</h3>
                    <?php
                   
                    $sql = "SELECT * FROM add_book WHERE bookId IN(SELECT bookId FROM history WHERE userId=$userId)";
                    $qRes = @$con->query($sql);
                    $borrowrow=mysqli_num_rows($qRes);
                    if ($qRes === FALSE)
                    echo "<p>Unable to execute the query. " . "Error code " . $con->errno . ": " . $con->error . "</p>\n";
                else
                {
                    echo "<table width='100%' border='1'>\n";
                    echo "<tr><th>Status</th><th>Resource ID</th><th>Title</th>" .
                    "<th>Author</th><th>Publisher</th></tr>\n"; 
                        while($borrowrow = $qRes->fetch_array())
                        {
                              if ($borrowrow['bookStatus']=='Available') {
                                $avail="primary";
                                
                                } 
                                else if($borrowrow['bookStatus']=='Borrowed') {
                                $avail="borrow";
                               
                                }
                                else if($borrowrow['bookStatus']=='Extended') {
                                $avail="extend";
                               
                                }
                                else
                                {
                                    $avail = "na";
                                }

                            echo "<tr><td><span class='label-".$avail."'>".$borrowrow['bookStatus']  ."</span></td>";
                            echo "<td>{$borrowrow['bookId']}</td>";
                            echo "<td>{$borrowrow['bookTitle']}</td>";
                            echo "<td>{$borrowrow['bookAuthor']}</td>";
                            echo "<td>{$borrowrow['bookPublisher']}</td>";
                            ?>
                        
                         
                            </tr>
                                    <?php
                        }
                    echo "</table>\n";
                }
?>




                              
              
                <br><br><BR><BR>
             <h3 style="color:white;text-align:center;bottom: 0;"><a style="bottom: 0;"href="user.php"><b><i class="fa fa-reply" aria-hidden="true"></i> &nbsp;Previous Page </a></h3>
            </div>
        </section>

        

       
    </div>
    
   
</body>
</html>