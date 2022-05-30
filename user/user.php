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
        <title>User Dashboard</title>
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
                <div class="container-user">
                    <h3 style="color:whitesmoke;text-align: center;">Currently Borrowing by <?php echo $user->get_fullname($userId);?></h3>
                    <?php
                    $table = "add_book";
                    $sql = "SELECT * FROM $table WHERE bookStatus='Borrowed' and borrower=".$userId;
                    $qRes = @$con->query($sql);
                    $borrowrow=mysqli_num_rows($qRes);
                    if ($qRes === FALSE)
                    echo "<p>Unable to execute the query. " . "Error code " . $con->errno . ": " . $con->error . "</p>\n";
                else
                {
                    echo "<table width='100%' border='1'>\n";
                    echo "<tr><th>Status</th><th>ID</th><th>Title</th>" .
                    "<th>Return Date</th><th>Return</th><th>Extend</th></tr>\n"; 
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
                            echo "<td>{$borrowrow['returnDate']}</td>";
                            ?>
                            <td><a href="returnbook.php?id=<?php echo $borrowrow['bookId']; ?>"><i class="fa fa-repeat" aria-hidden="true"></i></a>
                                    </td>
                            <td><a href="extendbook.php?id=<?php echo $borrowrow['bookId']; ?>"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a>
                                    </td>
                            </tr>
                                    <?php
                        }
                    echo "</table>\n";
                }
?>




                              
                </div>
                <br>
                <div class="container-user">
                    <h3 style="color:whitesmoke;text-align: center;">Resources Extended by <?php echo $user->get_fullname($userId);?></h3>
                    <?php
                    $table = "add_book";
                    $sql = "SELECT * FROM $table WHERE bookStatus='Extended' and borrower=".$userId;
                    $qRes = @$con->query($sql);
                    $borrowrow=mysqli_num_rows($qRes);
                    if ($qRes === FALSE)
                    echo "<p>Unable to execute the query. " . "Error code " . $con->errno . ": " . $con->error . "</p>\n";
                else
                {
                    echo "<table width='100%' border='1'>\n";
                    echo "<tr><th>Status</th><th>Resource ID</th><th>Title</th>" .
                    "<th>Return Date</th><th>Return</th></tr>\n"; 
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
                            echo "<td>{$borrowrow['extendDate']}</td>";
                            ?>
                            <td><a href="returnbook.php?id=<?php echo $borrowrow['bookId']; ?>"><i class="fa fa-repeat" aria-hidden="true"></i></a>
                                    </td>
                         
                            </tr>
                                    <?php
                        }
                    echo "</table>\n";
                }
?>




                              
                </div>


                <div class = "container-user2">
                    <br>
                    <h2> MENU <i class="fa fa-caret-down" aria-hidden="true"></i></h2><br>
                    <p><a href="userviewresource.php"><b><i class="fa fa-th-list" aria-hidden="true"></i> &nbsp;VIEW ALL RESOURCES</a></p><br><br>
                    <p><a href="history.php"><b><i class="fa fa-history" aria-hidden="true"></i> &nbsp;VIEW HISTORY</a></p><br><br>

                         
                    
                </div>
             
            </div>
        </section>

        

       
    </div>
    
   
</body>
</html>