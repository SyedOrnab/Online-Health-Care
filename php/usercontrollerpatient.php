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
	

		if(empty($name) || empty($email) || empty($address) || empty($phone) || empty($gender) || empty($bloodgroup)){
			header('location: ../views/patienthome.php?error=null_value');
		}else{

			$user = [
				'name'=> $name,
				'email'=> $email,
				'address'=> $address,
				'phone'=> $phone,
				'gender'=> $gender,
				'bloodgroup'=> $bloodgroup
			
			];

			$status = insertpatient($user);

			if($status){
				header('location: ../views/patient.php?success=done');
			}else{
				header('location: ../views/patient.php?error=db_error');
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