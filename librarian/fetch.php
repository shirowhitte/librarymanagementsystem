<?php
include_once '../assets/conn/dbconnect.php';//connection
session_start();
$output = '';
$table = "add_book";
if(isset($_POST["query"]))
{
	$sea = mysqli_real_escape_string($con, $_POST["query"]);
	$search = preg_replace('/\s+/',' ', $sea);
    $query = "select * from add_book where concat_ws(' ',ISBN,bookTitle,bookAuthor,bookStatus) rlike '$search' AND bookStatus='Available' order by type ";


}
else
{
	$query = "SELECT * FROM $table  order by type , bookStatus ";
}
$qRes = @$con->query("SHOW TABLES LIKE '$table");
echo $qRes;
if(mysqli_num_rows($qRes) > 0)
{
	echo "<table width='100%' border='1'>\n";
                    echo "<tr><th>Type</th><th>Book ID</th><th>ISBN</th><th>Title</th>" .
                    "<th>Author</th><th>Publisher</th><th>Status</th><th>Regular Cost($)</th><th>Extended Cost($)</th><th>Edit</th><th>Remove</th></tr>\n"; 
                        while($bookrow = $qRes->fetch_array())
                        {

                             if ($bookrow['bookStatus']=='Available') {
                                $avail="primary";
                                
                                } 
                                else if($bookrow['bookStatus']=='Borrowed') {
                                $avail="borrow";
                               
                                }
                                else if($bookrow['bookStatus']=='Extended') {
                                $avail="extend";
                               
                                }
                                else
                                {
                                    $avail = "na";
                                }

                            echo "<tr><td>{$bookrow['type']}</td><td>{$bookrow['bookId']}</td>";
                            echo "<td>{$bookrow['ISBN']}</td>";
                            echo "<td>{$bookrow['bookTitle']}</td>";
                            echo "<td>{$bookrow['bookAuthor']}</td>";
                            echo "<td>{$bookrow['bookPublisher']}</td>";
                            echo "<td> <span class='label-".$avail."'>". $bookrow['bookStatus'] ."</span></td>";
                            echo "<td>{$bookrow['bookRegularcost']}</td>";
                            echo "<td>{$bookrow['bookExtentedcost']}</td>";
                            ?>
                            <td><a href="editbook.php?id=<?php echo $bookrow['bookId']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    </td>
                            <td><a href="deletebook.php?id=<?php echo $bookrow['bookId']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                            </tr>
                                    <?php
                        }
                    echo "</table>\n";
                
}
else
{
	echo "<table width='100%' border='1'>\n";
                    echo "<tr><th>Type</th><th>Book ID</th><th>ISBN</th><th>Title</th>" .
                    "<th>Author</th><th>Publisher</th><th>Status</th><th>Regular Cost($)</th><th>Extended Cost($)</th><th>Borrow</th></tr>\n"; 
                     
                            echo "<tr rowspan='2'><td colspan='10'>NO RESULT FOUND</td>";
                            ?>
                            
                            </tr>
                                    <?php
                       
                    echo "</table>\n";
}
?>