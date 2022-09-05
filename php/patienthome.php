<<?php 
require_once('../service/userservice.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Patient Management</title>
	<link rel="stylesheet" href="../css/patienthome.css">
	<link rel="stylesheet" href="../css/patientreg.css">
	<script type="text/javascript" src="../js/doctorsearch.js"></script>
	

	
	
</head>
<body>

		<nav class="nav">
		
		<ul class="menu">
			<li class="menu_item"><a href="patienthome.php">Home</a></li>
			
			
			<li class="menu_item"><a href="patient.php">Patient List</a></li>
		
			<li class="menu_item"><a href="#">Conversation</a></li>
			<li class="menu_item"><a href="main.php">Logout</a></li>
		</ul>
	</nav>

<div class="reg">
	<form action="../php/usercontrollerpatient.php" method="post">
	
	<lable>Name</lable><br>
	<input type="text" id="name" name="name" placeholder="Enter Your Name" Class="name"><h4 id="namemsg"></h4><br><br>
	
	<lable>Email</lable><br>
	<input type="email" id="email" name="email" placeholder="Enter your email Adress" class="name"><h4 id="emailmsg"></h4><br><br>
	
	<lable>Adress</lable><br>
	<input type="text" id="address" name="address" placeholder="Enter Your Address" Class="name"><br><br>

	<lable>phone</lable><br>
	<input type="number" id="phone" name="phone" placeholder="Enter Your Phone Number" Class="name"><br><br>

		<lable>Gender</lable><br>
	<input type="radio" id="male" name="gender" class="ma" value="Male">Male
	<input type="radio" id="female" name="gender" class="ma" value="Female">Female
	<input type="radio" id="others" name="gender" class="ma" value="Others">Others<br><h4 id="gendermsg"></h4><br>

		<lable>Blood Group</lable><br>
	<select id="bloodgroup" name="bloodgroup" class="name" required>
							<option value="A+">A+</option>
							<option value="A-">A-</option>
							<option value="B+">B+</option>
							<option value="B-">B-</option>
							<option value="O+">O+</option>
							<option value="O-">O-</option>
							<option value="AB+">AB+</option>
							<option value="AB-">AB-</option>
						</select><br><br>
	
	
	
		

	<input type="submit" name="submit" class="sub" value="Register">
		
		
	</form>

</div>

<br><br>

<input type="text" name="">
<input type="button" name="" value="Search"><br><br>
<h3>Doctor list</h3><br>

	<table border="1">
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Email</td>
			<td>Address</td>
			<td>Phone</td>
			<td>Gender</td>
			<td>Degree</td>
			<td>Date</td>
			<td>Button</td>
		
		</tr>

		<?php  
			$users = getdoctor();
			for ($i=0; $i != count($users); $i++) {  ?>
		<tr >
			<td><?=$users[$i]['id']?></td>
			<td><?=$users[$i]['name']?></td>
			<td><?=$users[$i]['email']?></td>
			<td><?=$users[$i]['address']?></td>
			<td><?=$users[$i]['phone']?></td>
			<td><?=$users[$i]['gender']?></td>
			<td><?=$users[$i]['degree']?></td>
			<td><input type="date" name="date" id=<?='"date'.$users[$i]['id'].'"'?>></td>
			<td><input type="button" name="button"  value="Appoint" onclick=<?='"load('.$users[$i]['id'].')"'?> id=<?='"'.$users[$i]['id'].'"'?>></td>
		</tr>

		<?php } ?>

		
		
	</table>
	
	
	
</body>
</html>