<?php 
require_once('../service/userservice.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Blood Receiver</title>
	<link rel="stylesheet" href="../css/doctoruser.css">
	<script type="text/javascript" src="../js/doctoruser.js"></script>

	

	
	
</head>
<body>
		<nav class="nav">
		
		<ul class="menu">
			<li class="menu_item"><a href="doctoruser.php">Home</a></li>
			<li class="menu_item"><a href="#">Conversation</a></li>
			<li class="menu_item"><a href="main.php">Logout</a></li>
			
		</ul>
	</nav>
<br><br>




	<input type="date" name="date" id="date">
	<input type="button" name="button" id="button" value="Show" onclick="loadbyid()">
	<div id="searchdata"></div>
	
	
		
</body>
</html>