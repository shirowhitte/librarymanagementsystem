<?php
include_once '../assets/conn/dbconnect.php';
// Get the variables.
$id = $_GET['id'];

$delete = mysqli_query($con,"DELETE FROM add_book WHERE bookId=$id");

if($delete)
{ 
	$abc = "Book id:"." ".$id." ". "has been deleted";
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
    echo "Error deleting record"; // display error message if not delete
}



?>

