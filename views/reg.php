<?php

if (isset($_POST['error'])) {
		
		if($_POST['error'] == 'db_error'){
			echo "Something went wrong...please try again";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<link rel="stylesheet" href="../css/reg.css">
	<link rel="stylesheet" href="../css/main.css">
	<script type="text/javascript" src="../js/regcheck.js"></script>
	
</head>
<body>

	<nav class="nav">
		
		<ul class="menu">
			<li class="menu_item"><a href="login.php">login</a></li>
			<li class="menu_item"><a href="reg.php">Registration</a></li>
		
	</nav>
<h1>Registration</h1>

<div class="reg">
	<form id="reg" name="reg" method="post" action="../php/regcheck.php" onsubmit="return validate()">
	
	
	<lable>Name</lable><br>
	<input type="text" id="name" name="name" placeholder="Enter Full Name" Class="name" onkeyup="validatename()"><h4 id="namemsg"></h4><br><br>
	
	<lable>UserName</lable><br>
	<input type="text" id="username" name="username" placeholder="Enter Enique Name" Class="name"  onkeyup="validateusername()"><h4 id="usernamemsg"></h4><br><br>
	
	<lable>Email</lable><br>
	<input type="email" id="email" name="email" placeholder="Enter your email Adress" class="name"  onkeyup="validateemail()"><h4 id="emailmsg"></h4><br><br>
	
	<lable>Password</lable><br>
	<input type="password" id="password" name="password" placeholder="Enter password" class="name" onkeyup="validatepassword()" ><h4 id="passwordmsg"></h4><br><br>
	
	<lable>Conform Password</lable><br>
	<input type="password" id="confirmpassword" name="confirmpassword" placeholder="Re-enter password" class="name" onkeyup="validatepassword()"><h4 id="passwordmsg"></h4><br><br>
	
	<lable>Date Of Birth</lable><br>
	<input type="date" id="dateofbirth" name="dateofbirth" Class="name" onclick="validatedate()"><h4 id="dateofbirthmsg"></h4><br><br>
	
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
	
	<lable>UserType</lable><br>
	<select id="usertype" name="usertype" class="name" required> 
							<option value="Patient">Patient</option>
							<option value="Plasmadonor">Plasma Donor</option>
							<option value="Plasmareceiver">Plasma Receiver</option>
							<option value="Blooddonor">Blood Donor</option>
							<option value="Bloodreceiver">Blood Receiver</option>
						</select><br><br>
						
	<input type="submit" name="submit" class="sub" value="Register">
		
		
	</form>

</div>
	
</body>
</html>