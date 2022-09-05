<?php
	require_once('../php/sessionheader.php');
	require_once('../service/userservice.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blood Receiver</title>
	<link rel="stylesheet" href="../css/bloodreceiver.css">
	<link rel="stylesheet" href="../css/bloodreceiverreg.css">
	<script type="text/javascript" src="../js/bloodreceiversearch.js"></script>
	

	
</head>
<body>
		

		<nav class="nav">
		
		<ul class="menu">
			<li class="menu_item"><a href="bloodreceiverhome.php">Home</a></li>
			
			
			
			<li class="menu_item"><a href="bloodreceiver.php">Blood Receiver</a></li>
			<li class="menu_item"><a href="#">Conversation</a></li>
			
		</ul>
	</nav>
	
<br><br>

<input type="text" id="name" name="name" onkeyup="load()">
<h3>Blood Receiver list</h3><br>
<div id="receiversearchdata"></div><br><br>



	<table id="bloodreceivertable" border="1">
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Email</td>
			<td>Address</td>
			<td>Phone</td>
			<td>Gender</td>
			<td>Blood Group</td>
			<td>Bloodreceiver Date</td>
			<td>Time</td>
		</tr>

		<?php  
			$users = getallbloodreceiver();
			for ($i=0; $i != count($users); $i++) {  ?>
		<tr>
			<td><?=$users[$i]['id']?></td>
			<td><?=$users[$i]['name']?></td>
			<td><?=$users[$i]['email']?></td>
			<td><?=$users[$i]['address']?></td>
			<td><?=$users[$i]['phone']?></td>
			<td><?=$users[$i]['gender']?></td>
			<td><?=$users[$i]['bloodgroup']?></td>
			<td><?=$users[$i]['bloodreceiverdate']?></td>
			<td><?=$users[$i]['time']?></td>
			<!--<td>
				<a href="edit.php?id=<?=$users[$i]['id']?>">Edit</a> |
				<a href="delete.php?id=<?=$users[$i]['id']?>">Delete</a> 
			</td>-->
		</tr>

		<?php } ?>
		
	</table>	
		
</body>
</html>