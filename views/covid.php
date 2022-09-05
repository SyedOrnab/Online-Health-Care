<?php
	require_once('../php/sessionheader.php');
	require_once('../service/userservice.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Plasma Donor</title>
	<link rel="stylesheet" href="../css/covid.css">

	<script type="text/javascript" src="../js/covid.js"></script>
</head>
<body>
	<nav class="nav">
		
		<ul class="menu">
		<li class="menu_item"><a href="plasmareceiverhome.php">Home</a></li>
		    <li class="menu_item"><a href="covidhome.php">Covid 19</a></li>
			<li class="menu_item"><a href="covid.php">Apply Patient</a></li>
			<li class="menu_item"><a href="#">Conversation</a></li>
		</ul>
	</nav>

<br><br>

<input type="text" id="name" name="name" onkeyup="load()"><br><br>
<h3>Apply Patient list</h3><br>
<div id="searchdata"></div><br><br>



	<table id="covidtable" border="1">
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Email</td>
			<td>Address</td>
			<td>Phone</td>
			<td>Gender</td>
			<td>Blood Group</td>
			<td>Covidtesting Date</td>
			<td>Time</td>
		</tr>

		<?php  
			$users = getcovidtesting();
			for ($i=0; $i != count($users); $i++) {  ?>
		<tr>
			<td><?=$users[$i]['id']?></td>
			<td><?=$users[$i]['name']?></td>
			<td><?=$users[$i]['email']?></td>
			<td><?=$users[$i]['address']?></td>
			<td><?=$users[$i]['phone']?></td>
			<td><?=$users[$i]['gender']?></td>
			<td><?=$users[$i]['bloodgroup']?></td>
			<td><?=$users[$i]['covidtestingdate']?></td>
			<td><?=$users[$i]['time']?></td>
			<td>
				<a href="editcovid.php?id=<?=$users[$i]['id']?>">Edit</a> |
				<a href="deletecovid.php?id=<?=$users[$i]['id']?>">Delete</a> 
			</td>
		</tr>

		<?php } ?>
		
	</table>
		
</body>
</html>