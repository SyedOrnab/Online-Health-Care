<?php

	require_once('../php/sessionheader.php');
	require_once('../service/userservice.php');

	if (isset($_GET['id'])) {
		$user = getplasmadonorid($_GET['id']);	
	}else{
		header('location: plasmadonor.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Plasma Donor Home</title>
	<link rel="stylesheet" href="../css/plasmadonorhome.css">
	<link rel="stylesheet" href="../css/plasmadonorreg.css">
	<script type="text/javascript" src="../js/plasmadonor.js"></script>
	
</head>
<body>
	
	
	<nav class="nav">
		
		<ul class="menu">
			<li class="menu_item"><a href="home.php">Home</a></li>
			
			<li class="menu_item"><a href="plasmadonor.php">Plasma Donor</a></li>
			<li class="menu_item"><a href="#">Conversation</a></li>
			
		</ul>
	</nav>


<div class="reg">
	<form action="../php/usercontroller.php" method="post">
	
	<lable>Name</lable><br>
	<input type="text" id="name" name="name" placeholder="Enter Your Name" Class="name" value="<?=$user['name']?>"><h4 id="namemsg"></h4><br><br>
	
	<lable>Email</lable><br>
	<input type="email" id="email" name="email" placeholder="Enter your email Adress" class="name" value="<?=$user['email']?>"><h4 id="emailmsg"></h4><br><br>
	
	<lable>Adress</lable><br>
	<input type="text" id="address" name="address" placeholder="Enter Your Address" Class="name" value="<?=$user['address']?>"><br><br>

	<lable>phone</lable><br>
	<input type="number" id="phone" name="phone" placeholder="Enter Your Phone Number" Class="name" value="<?=$user['phone']?>"><br><br>

		<lable>Gender</lable><br>
	<input type="radio" id="male" name="gender" class="ma" value="Male">Male
	<input type="radio" id="female" name="gender" class="ma" value="Female">Female
	<input type="radio" id="others" name="gender" class="ma" value="Others">Others<br><h4 id="gendermsg"></h4><br>

		<lable>Blood Group</lable><br>
	<select id="bloodgroup" name="bloodgroup" class="name" value="<?=$user['bloodgroup']?>">
							<option value="A+">A+</option>
							<option value="A-">A-</option>
							<option value="B+">B+</option>
							<option value="B-">B-</option>
							<option value="O+">O+</option>
							<option value="O-">O-</option>
							<option value="AB+">AB+</option>
							<option value="AB-">AB-</option>
						</select><br><br>
	
	
	
	<lable>Plasma Donation Date</lable><br>
	<input type="date" id="plasmadonationdate" name="plasmadonationdate" Class="name" value="<?=$user['plasmadonationdate']?>" onclick="combo()"> <input type="button" name="" value="Available Time" onclick="validdate()"><br><br>
	
	<lable>Available Time</lable><br>
	<select id="time" name="time" class="name" value="<?=$user['time']?>">
		

	</select><br><br>
	<input type="hidden" name="id" value="<?=$user['id']?>">
	<input type="submit" name="delete" class="sub" value="Delete">
		
		
	</form>

</div>
	
	
</body>
</html>