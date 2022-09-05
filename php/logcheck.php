<?php
	session_start();
	require_once('../php/sessionheader.php');
	require_once('../service/userservice.php');

	if(isset($_POST['submit'])){

		$username = $_POST['username'];
		$password = $_POST['password'];
		$usertype = $_POST['usertype'];

		if(empty($username) || empty($password) || empty($usertype)){
			header('location: ../views/login.php?error=null_value');
		}else{

			$user = [
				'username'=>$username,
				'password'=>$password,
				'usertype'=>$usertype
			];
			
			$status = validate($user);

			if($status && $user['usertype']=='Admin')
			{
				$_SESSION['username'] = $username;
				setcookie('username',$username, time()+3600, '/');
				header('location: ../views/home.php');
			}
			elseif($status && $user['usertype']=='Doctor')
			{
				$_SESSION['username'] = $username;
				setcookie('username',$username, time()+3600, '/');
				header('location: ../views/doctoruser.php');
			}
			elseif($status && $user['usertype']=='Patient')
			{
				$_SESSION['username'] = $username;
				setcookie('username',$username, time()+3600, '/');
				header('location: ../views/patienthome.php');
			}
			elseif($status && $user['usertype']=='Plasmadonor')
			{
				$_SESSION['username'] = $username;
				setcookie('username',$username, time()+3600, '/');
				header('location: ../views/plasmadonorhome.php');
			}
			elseif($status && $user['usertype']=='Plasmareceiver')
			{
				$_SESSION['username'] = $username;
				setcookie('username',$username, time()+3600, '/');
				header('location: ../views/plasmareceiverhome.php');
			}
			elseif($status && $user['usertype']=='Blooddonor')
			{
				$_SESSION['username'] = $username;
				setcookie('username',$username, time()+3600, '/');
				header('location: ../views/blooddonor.php');
			}
			elseif($status && $user['usertype']=='Bloodreceiver')
			{
				$_SESSION['username'] = $username;
				setcookie('username',$username, time()+3600, '/');
				header('location: ../views/bloodreceiver.php');
			}
			else
			{
				header('location: ../views/login.php?error=invalid_user');
			}
		}
	}



?>