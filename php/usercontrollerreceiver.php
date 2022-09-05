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
		$plasmareceiverdate 		= $_POST['plasmareceiverdate'];
		$time 		= $_POST['time'];

		if(empty($name) || empty($email) || empty($address) || empty($phone) || empty($gender) || empty($bloodgroup) || empty($plasmareceiverdate) || empty($time)){
			header('location: ../views/plasmareceiverhome.php?error=null_value');
		}else{

			$user = [
				'name'=> $name,
				'email'=> $email,
				'address'=> $address,
				'phone'=> $phone,
				'gender'=> $gender,
				'bloodgroup'=> $bloodgroup,
				'plasmareceiverdate'=> $plasmareceiverdate,
				'time'=>$time
			];

			$status = insertplasmareceiver($user);

			if($status){
				header('location: ../views/plasmareceiver.php?success=done');
			}else{
				header('location: ../views/plasmareceiverhome.php?error=db_error');
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
		$plasmareceiverdate 		= $_POST['plasmareceiverdate'];
		$time 		= $_POST['time'];
		$id 		= $_POST['id'];

		if(empty($name) || empty($email) || empty($address) || empty($phone) || empty($gender) || empty($bloodgroup) || empty($plasmareceiverdate) || empty($time)){
			header('location: ../views/plasmareceiverhome.php?id={$id}');
		}else{

			$user = [
				'name'=> $name,
				'email'=> $email,
				'address'=> $address,
				'phone'=> $phone,
				'gender'=> $gender,
				'bloodgroup'=> $bloodgroup,
				'plasmareceiverdate'=> $plasmareceiverdate,
				'time'=>$time,
				'id'=> $id
			];

			$status = updateplasmareceiver($user);
			var_dump($status);

			if($status){
				header('location: ../views/plasmareceiver.php?success=done');
			}else{
				header('location: ../views/plasmareceiver.php?error');
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
		$plasmareceiverdate 		= $_POST['plasmareceiverdate'];
		$time 		= $_POST['time'];
		$id 		= $_POST['id'];

		if(empty($name) || empty($email) || empty($address) || empty($phone)){
			header('location: ../views/plasmareceiverhome.php?error=null_value');
		}else{

			$user = [
				'name'=> $name,
				'email'=> $email,
				'address'=> $address,
				'phone'=> $phone,
				'gender'=> $gender,
				'bloodgroup'=> $bloodgroup,
				'plasmareceiverdate'=> $plasmareceiverdate,
				'time'=>$time,
				'id'=>$id
			];

			$status = deleteplasmareceiver($user);

			if($status){
				header('location: ../views/plasmareceiver.php?success=done');
			}else{
				header('location: ../views/plasmareceiverhome.php?error=db_error');
			}
		}
	}

?>