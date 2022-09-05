<?php 
	session_start();
	//require_once('../php/session_header.php');
	require_once('../service/userService.php');


	//add user
	if(isset($_POST['username'])){

		$status=checkusername($_POST['username']);
		if($status)
		{
			echo "Username already taken";
		}		
	}

?>