<?php 
	session_start();
	require_once('../service/userservice.php');



	if(isset($_POST['submit'])){

		$name 		= $_POST['name'];
		$username 	= $_POST['username'];
		$email 		= $_POST['email'];
		$password 	= $_POST['password'];
		$address 		= $_POST['address'];
		$phone 		= $_POST['phone'];
		$dateofbirth 		= $_POST['dateofbirth'];
		$gender 	= $_POST['gender'];
		$bloodgroup = $_POST['bloodgroup'];
		$degree = $_POST['degree'];


		if(empty($name) || empty($username) || empty($email) || empty($password) || empty($address) || empty($phone) || empty($dateofbirth) || empty($gender) || empty($bloodgroup) || empty($degree) )
		{
			header('location: ../views/doctorhome.php?error=null_value');
		}
		else
		{
			$user = [
				'name'=> $name,
				'username'=> $username,
				'email'=> $email,
				'password'=> $password,
				'address'=> $address,
				'phone'=> $phone,
				'dateofbirth'=> $dateofbirth,
				'gender'=> $gender,
				'bloodgroup'=> $bloodgroup,
				'degree'=> $degree
			];
			$status = insertdoctorreg($user);
			$status1 = insertdoctor($user);

			if($status && $status1){
				header('location: ../views/doctor.php?success=registration_done');
			}else{
				header('location: ../views/doctorhome.php?error=db_error');
			}
		}
	}



?>