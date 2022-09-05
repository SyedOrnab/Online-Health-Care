<?php 
	//session_start();
	require_once('../php/sessionheader.php');
	require_once('../service/userservice.php');


	//add user
	if(isset($_POST['submit'])){
		$name 	= $_POST['name'];
		$email 		= $_POST['email'];
		$address 		= $_POST['address'];
		$phone 		= $_POST['phone'];
		$gender 		= $_POST['gender'];
		$bloodgroup 		= $_POST['bloodgroup'];
		$plasmadonationdate 		= $_POST['plasmadonationdate'];
		$time 		= $_POST['time'];

		if(empty($name) || empty($email) || empty($address) || empty($phone) || empty($gender) || empty($bloodgroup) || empty($plasmadonationdate) || empty($time)){
			header('location: ../views/plasmadonor.php?error=null_value');
		}else{

			$user = [
				'name'=> $name,
				'email'=> $email,
				'address'=> $address,
				'phone'=> $phone,
				'gender'=> $gender,
				'bloodgroup'=> $bloodgroup,
				'plasmadonationdate'=> $plasmadonationdate,
				'time'=>$time
			];

			$status = insertplasmadonor($user);

			if($status){
				header('location: ../views/plasmadonor.php?success=done');
			}else{
				header('location: ../views/plasmadonor.php?error=db_error');
			}
		}
	}

	//update user
	if(isset($_POST['edit'])){

		$name 	= $_POST['name'];
		$email 		= $_POST['email'];
		$address 		= $_POST['address'];
		$phone 		= $_POST['phone'];
		$gender 		= $_POST['gender'];
		$bloodgroup 		= $_POST['bloodgroup'];
		$plasmadonationdate 		= $_POST['plasmadonationdate'];
		$time 		= $_POST['time'];
		$id 		= $_POST['id'];

		if(empty($name) || empty($email) || empty($address) || empty($phone) || empty($gender) || empty($bloodgroup) || empty($plasmadonationdate) || empty($time)){
			header('location: ../views/plasmadonorhome.php?error=null_value');
		}else{

			$user = [
				'name'=> $name,
				'email'=> $email,
				'address'=> $address,
				'phone'=> $phone,
				'gender'=> $gender,
				'bloodgroup'=> $bloodgroup,
				'plasmadonationdate'=> $plasmadonationdate,
				'time'=>$time,
				'id'=>$id
			];

			$status = updateplasmadonor($user);

			if($status){
				header('location: ../views/plasmadonor.php?success=done');
			}else{
				header('location: ../views/plasmadonorhome.php?error=db_error');
			}
		}
	}

	//delete
	if(isset($_POST['delete'])){

		$name 	= $_POST['name'];
		$email 		= $_POST['email'];
		$address 		= $_POST['address'];
		$phone 		= $_POST['phone'];
		$gender 		= $_POST['gender'];
		$bloodgroup 		= $_POST['bloodgroup'];
		$plasmadonationdate 		= $_POST['plasmadonationdate'];
		$time 		= $_POST['time'];
		$id 		= $_POST['id'];

		if(empty($name) || empty($email) || empty($address) || empty($phone)){
			header('location: ../views/plasmadonorhome.php?error=null_value');
		}else{

			$user = [
				'name'=> $name,
				'email'=> $email,
				'address'=> $address,
				'phone'=> $phone,
				'gender'=> $gender,
				'bloodgroup'=> $bloodgroup,
				'plasmadonationdate'=> $plasmadonationdate,
				'time'=>$time,
				'id'=>$id
			];

			$status = deleteplasmadonor($user);

			if($status){
				header('location: ../views/plasmadonor.php?success=done');
			}else{
				header('location: ../views/plasmadonorhome.php?error=db_error');
			}
		}
	}

?>