<?php
$ErrorMsgs = array();
$con = @new mysqli("localhost", "root", "", "library");
if ($con -> connect_errno) //if there is no error connect_errno will be 0, oterwise >0
	$ErrorMsgs[] = "The database server is not available. Error: " . $con -> connect_errno . "-" . $con -> connect_error;
?>