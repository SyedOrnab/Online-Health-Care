<!DOCTYPE html>
<html>
<head>
	<title>Plasma Receiver Home</title>
	<link rel="stylesheet" href="../css/plasmareceiverhome.css">
	<link rel="stylesheet" href="../css/plasmareceiverreg.css">
	<script type="text/javascript" src="../js/plasmareceiver.js"></script>
	
	
</head>
<body>
	
	
	<nav class="nav">
		
		<ul class="menu">
			<li class="menu_item"><a href="home.php">Home</a></li>
			<li class="menu_item"><a href="plasmareceiver.php">Plasma Receiver</a></li>
			<li class="menu_item"><a href="covidhome.php">Covid 19</a></li>
			<li class="menu_item"><a href="#">Conversation</a></li>
		</ul>
	</nav>
	
<div class="reg">
	<form action="../php/usercontrollerreceiver.php" method="post">
	
	<lable>Name</lable><br>
	<input type="text" id="name" name="name" placeholder="Enter Your Name" Class="name"><h4 id="namemsg" onkeyup="validatename()"></h4><br><br>
	
	<lable>Email</lable><br>
	<input type="email" id="email" name="email" placeholder="Enter your email Adress" class="name" onkeyup="validateemail()"><h4 id="emailmsg"></h4><br><br>
	
	<lable>Adress</lable><br>
	<input type="text" id="address" name="address" placeholder="Enter Your Address" Class="name"><br><br>

	<lable>phone</lable><br>
	<input type="number" id="phone" name="phone" placeholder="Enter Your Phone Number" Class="name"><br><br>

		<lable>Gender</lable><br>
	<input type="radio" id="male" name="gender" class="ma" value="Male" onclick="validategender()">Male
	<input type="radio" id="female" name="gender" class="ma" value="Female" onclick="validategender()">Female
	<input type="radio" id="others" name="gender" class="ma" value="Others" onclick="validategender()">Others<br><h4 id="gendermsg"></h4><br>

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
	
	
	
	<lable>Plasma Receiving Date</lable><br>
	<input type="date" id="plasmareceiverdate" name="plasmareceiverdate" Class="name" onclick="combo()"> <input type="button" name="" value="Available Time" onclick="validdate()"><br><br>
	
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