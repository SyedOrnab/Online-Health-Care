<?php 
	session_start();
	require_once('../service/userservice.php');



	if(isset($_POST['submit'])){

		$id			= $_POST['id'];
		$name 		= $_POST['name'];
		$email 		= $_POST['email'];
		$address 	= $_POST['address'];
		$phone 		= $_POST['phone'];
		$gender 	= $_POST['gender'];
		$bloodgroup = $_POST['bloodgroup'];
		$plasmadonationdate 	= $_POST['plasmadonationdate'];

		if(empty($id) || empty($name) || empty($email) || empty($address) || empty($phone) || empty($gender) || empty($bloodgroup) || empty($plasmadonationdate))
		{
			header('location: ../views/plasmadonor.php?error=null_value');
		}
		else
		{
			$user = [
				'id'=> $id,
				'name'=> $name,
				'email'=> $email,
				'address'=> $address,
				'phone'=> $phone,
				'gender'=> $gender,
				'bloodgroup'=> $bloodgroup,
				'plasmadonationdate'=> $plasmadonationdate
			];
			$status = insertplasmadonor($user);
			if($status)
			{
				header('location: ../views/plasmadonor.php?success=registration_done');
			}
			else
			{
				header('location: ../views/plasmadonor.php?error=db_error');
			}
		}
	}



?>