<?php 
	session_start();
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
		$blooddonationdate 		= $_POST['blooddonationdate'];
		$time 		= $_POST['time'];

		if(empty($name) || empty($email) || empty($address) || empty($phone) || empty($gender) || empty($bloodgroup) || empty($blooddonationdate) || empty($time)){
			header('location: ../views/blooddonor.php?error=null_value');
		}else{

			$user = [
				'name'=> $name,
				'email'=> $email,
				'address'=> $address,
				'phone'=> $phone,
				'gender'=> $gender,
				'bloodgroup'=> $bloodgroup,
				'blooddonationdate'=> $blooddonationdate,
				'time'=>$time
			];

			$status = insertblooddonor($user);

			if($status){
				header('location: ../views/blooddonor.php?success=done');
			}else{
				header('location: ../views/blooddonor.php?error=db_error');
			}
		}
	}

	//update user
	/*if(isset($_POST['edit'])){

		$username 	= $_POST['username'];
		$password 	= $_POST['password'];
		$email 		= $_POST['email'];
		$id 		= $_POST['id'];

		if(empty($username) || empty($password) || empty($email)){
			header('location: ../views/edit.php?id={$id}');
		}else{

			$user = [
				'username'=> $username,
				'password'=> $password,
				'email'=> $email,
				'id'=> $id
			];

			$status = update($user);

			if($status){
				header('location: ../views/all_users.php?success=done');
			}else{
				header('location: ../views/edit.php?id={$id}');
			}
		}
	}*/

?>