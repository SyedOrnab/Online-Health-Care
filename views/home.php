  
<?php
	require_once('../php/sessionheader.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="../css/home.css">	
</head>
<body>
	<nav class="nav">
		
		<ul class="menu">
			<li class="menu_item"><a href="#">Home</a></li>
			<li class="menu_item"><a href="#">Service</a>
			<ul class="submenu">
				<li class="submenu_item"><a href="doctorhome.php">Doctor</a></li>
				<li class="submenu_item"><a href="patienthome.php">Patient</a></li>
				<li class="submenu_item"><a href="plasmadonorhome.php">Plasma Donor</a></li>
				<li class="submenu_item"><a href="plasmareceiverhome.php">Plasma Receiver</a></li>
				<li class="submenu_item"><a href="blooddonorhome.php">Blood Donor</a></li>
				<li class="submenu_item"><a href="bloodreceiverhome.php">Blood Receiver</a></li>
			
			</ul>
			
			</li>
			<li class="menu_item"><a href="main.php">Logout</a></li>
		</ul>
		
	</nav>
	
	<h1 class="h1">Welcome <br> <?=$_SESSION['username']?></h1> 

</body>
</html>