<?php
	require_once('../php/sessionheader.php');
	require_once('../service/userservice.php');

	
	$date=$_POST['date'];
	$id=$_POST['id'];
	$result = appointdoctor($id,$date);

?>