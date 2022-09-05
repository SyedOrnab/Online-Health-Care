<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="../css/login.css">
	<link rel="stylesheet" href="../css/main.css">

</head>
<body>


<nav class="nav">
		
		<ul class="menu">
			<li class="menu_item"><a href="login.php">login</a></li>
			<li class="menu_item"><a href="reg.php">Registration</a></li>
		
	</nav>
	<h1>Login</h1>

<div class="login">
<form id="login" method= "post" action="../php/logcheck.php">
	<lable>UserName</lable><br>
	<input type="text" id="username" name="username" placeholder="Enter Username" class="name"><br><br>
	
	<lable>Password</lable><br>
	<input type="password" id="password" name="password" placeholder="Enter password" class="name"><br><br>

	<lable>UserType</lable><br>
	<select id="usertype" name="usertype" class="name" required> 
							<option value="Admin">Admin</option>
							<option value="Doctor">Doctor</option>
							<option value="Patient">Patient</option>
							<option value="Plasmadonor">Plasma Donor</option>
							<option value="Plasmareceiver">Plasma Receiver</option>
							<option value="Blooddonor">Blood Donor</option>
							<option value="Bloodreceiver">Blood Receiver</option>
						</select><br><br>
	
	<button type="submit" name="submit" id="submit">Login </button>
	
	
	
</form>
	
	
</div>
	
</body>
</html>