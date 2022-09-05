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
		$covidtestingdate 		= $_POST['covidtestingdate'];
		$time 		= $_POST['time'];

		if(empty($name) || empty($email) || empty($address) || empty($phone) || empty($gender) || empty($bloodgroup) || empty($covidtestingdate) || empty($time)){
			header('location: ../views/covidhome.php?error=null_value');
		}else{

			$user = [
				'name'=> $name,
				'email'=> $email,
				'address'=> $address,
				'phone'=> $phone,
				'gender'=> $gender,
				'bloodgroup'=> $bloodgroup,
				'covidtestingdate'=> $covidtestingdate,
				'time'=>$time
			];

			$status = insertcovidtesting($user);

			if($status){
				header('location: ../views/covid.php?success=done');
			}else{
				header('location: ../views/covid.php?error=db_error');
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
		$covidtestingdate 		= $_POST['covidtestingdate'];
		$time 		= $_POST['time'];
		$id 		= $_POST['id'];

		if(empty($name) || empty($email) || empty($address) || empty($phone) || empty($gender) || empty($bloodgroup) || empty($covidtestingdate) || empty($time)){
			header('location: ../views/editcovid.php?id={$id}');
		}else{

			$user = [
				'name'=> $name,
				'email'=> $email,
				'address'=> $address,
				'phone'=> $phone,
				'gender'=> $gender,
				'bloodgroup'=> $bloodgroup,
				'covidtestingdate'=> $covidtestingdate,
				'time'=>$time,
				'id'=> $id
			];

			$status = updatecovid($user);

			if($status){
				header('location: ../views/covid.php?success=done');
			}else{
				header('location: ../views/editcovid.php?error');
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
		$covidtestingdate 		= $_POST['covidtestingdate'];
		$time 		= $_POST['time'];
		$id 		= $_POST['id'];

		if(empty($name) || empty($email) || empty($address) || empty($phone)){
			header('location: ../views/editcovid.php?id={$id}');
		}else{

			$user = [
				'name'=> $name,
				'email'=> $email,
				'address'=> $address,
				'phone'=> $phone,
				'gender'=> $gender,
				'bloodgroup'=> $bloodgroup,
				'covidtestingdate'=> $covidtestingdate,
				'time'=>$time,
				'id'=> $id
			];

			$status = deletecovid($user);

			if($status){
				header('location: ../views/covid.php?success=done');
			}else{
				header('location: ../views/editcovid.php?error');
			}
		}
	}
?>