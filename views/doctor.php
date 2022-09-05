<?php
	require_once('../php/sessionheader.php');
	require_once('../service/userservice.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctor Management</title>
	<link rel="stylesheet" href="../css/doctor.css">
	<script type="text/javascript" src="../js/doctorsearch.js"></script>
	
	
</head>
<body>

	<nav class="nav">
		
		<ul class="menu">
			<li class="menu_item"><a href="doctorhome.php">Home</a></li>
			
			
			<li class="menu_item"><a href="doctor.php">Doctor List</a></li>
	
			<li class="menu_item"><a href="#">Conversation</a></li>
		</ul>
	</nav>


<br><br>

<input type="text" id="name" name="name" onkeyup="load()"><br><br>
<h3>Doctor list</h3><br>
<div id="searchdata"></div><br><br>

	<table id="doctortable" border="1">
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Email</td>
			<td>Address</td>
			<td>Phone</td>
			<td>Gender</td>
			<td>Blood Group</td>
			<td>Degree</td>
		
		</tr>

		<?php  
			$users = getdoctor();
			for ($i=0; $i != count($users); $i++) {  ?>
		<tr>
			<td><?=$users[$i]['id']?></td>
			<td><?=$users[$i]['name']?></td>
			<td><?=$users[$i]['email']?></td>
			<td><?=$users[$i]['address']?></td>
			<td><?=$users[$i]['phone']?></td>
			<td><?=$users[$i]['gender']?></td>
			<td><?=$users[$i]['bloodgroup']?></td>
			<td><?=$users[$i]['degree']?></td>
		
			<!--<td>
				<a href="edit.php?id=<?=$users[$i]['id']?>">Edit</a> |
				<a href="deletedoctor.php?id=<?=$users[$i]['id']?>">Delete</a> 
			</td>-->
		</tr>

		<?php } ?>
		
	</table>
	
</body>
</html>