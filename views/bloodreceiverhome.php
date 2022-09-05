<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blood Receiver Home</title>
	<link rel="stylesheet" href="../css/bloodreceiverhome.css">
	<link rel="stylesheet" href="../css/bloodreceiverreg.css">
	<script type="text/javascript" src="../js/bloodreceiver.js"></script>
	
</head>
<body>
	
	
	<nav class="nav">
		
		<ul class="menu">
			<li class="menu_item"><a href="home.php">Home</a></li>
			<li class="menu_item"><a href="bloodreceiver.php">Blood Receiver</a></li>
			<li class="menu_item"><a href="#">Conversation</a></li>
		</ul>
	</nav>

	<div class="reg">
		<form action="../php/usercontrollerblood.php" method="post">

	
	
	
	
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
	
	
	
	
	<lable>Blood Receive Date</lable><br>
	<input type="date" id="bloodreceiverdate" name="bloodreceiverdate" Class="name" onclick="combo()"> <input type="button" name="" value="Available Time" onclick="validdate()"><br><br>
	
	<lable>Available Time</lable><br>
	<select id="time" name="time" class="name" required>
		

	</select><br><br>

	<input type="submit" name="submit" class="sub" value="Register">
		
		
	</form>

</div>
</div>
<?php
	require_once('../service/userservice.php');
	$result=countblood();
	if(count($result)>0)
	{
	$data="<table border=1>
		<tr>
			<td>Blood Group </td>
			<td>Total Number</td>
		</tr>";
 		$n=0;
		while (count($result)>$n) 
		{
			$data .="<tr>
					<td>{$result[$n]['bloodgroup']}</td>
					<td>{$result[$n]['totalblood']}</td>
			
			</tr>";
			$n=$n+1;
		}
		$data .= "</table>";

		echo $data;
	}
?>
	
</body>
</html>