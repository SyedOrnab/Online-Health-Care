<?php
	require_once('../php/sessionheader.php');
	require_once('../service/userservice.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient Management</title>
	<link rel="stylesheet" href="../css/patient.css">
	<script type="text/javascript" src="../js/patientsearch.js"></script>
	

	
	
</head>
<body>
		<nav class="nav">
		
		<ul class="menu">
			<li class="menu_item"><a href="patienthome.php">Home</a></li>
			
			
			<li class="menu_item"><a href="patient.php">Patient List</a></li>
		
			<li class="menu_item"><a href="#">Conversation</a></li>
			
		</ul>
	</nav>

<br><br>

<input type="text" id="name" name="name" onkeyup="load()"><br><br>
<h3>Patient list</h3><br>
<div id="searchdata"></div><br><br>



	<table id="patienttable" border="1">
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Email</td>
			<td>Address</td>
			<td>Phone</td>
			<td>Gender</td>
			<td>Blood Group</td>
		</tr>

		<?php  
			$users = getallpatient();
			for ($i=0; $i != count($users); $i++) {  ?>
		<tr>
			<td><?=$users[$i]['id']?></td>
			<td><?=$users[$i]['name']?></td>
			<td><?=$users[$i]['email']?></td>
			<td><?=$users[$i]['address']?></td>
			<td><?=$users[$i]['phone']?></td>
			<td><?=$users[$i]['gender']?></td>
			<td><?=$users[$i]['bloodgroup']?></td>
			<!--<td>
				<a href="edit.php?id=<?=$users[$i]['id']?>">Edit</a> |
				<a href="delete.php?id=<?=$users[$i]['id']?>">Delete</a> 
			</td>-->
		</tr>

		<?php } ?>
		
	</table>
		
	
	
</body>
</html>