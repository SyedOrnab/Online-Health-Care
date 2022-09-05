<?php 
	session_start();
	require_once('../service/userservice.php');



	if(isset($_POST['submit'])){

		$name 		= $_POST['name'];
		$username 	= $_POST['username'];
		$email 		= $_POST['email'];
		$password 	= $_POST['password'];
		$dateofbirth 		= $_POST['dateofbirth'];
		$gender 	= $_POST['gender'];
		$bloodgroup = $_POST['bloodgroup'];
		$usertype 	= $_POST['usertype'];

		if(empty($name) || empty($username) || empty($email) || empty($password) || empty($dateofbirth) || empty($gender) || empty($bloodgroup) || empty($usertype))
		{
			header('location: ../views/reg.php?error=null_value');
		}
		else
		{

			//name
			if (isset($_GET['name'])) {
				$a=$_GET['name'];
				
				if (strlen($a)>0) {
					# code...
					if (str_word_count($a)>1) {
						# code....
						//$a=range(a, z)
						//$a=range(A, Z)
						if(($a[0]>='a' && $a[0]<='z') || ($a[0]>='A' && $a[0]<='Z')){
							$b=strlen($a);
							while ($b<0) {
								# code...
								if ($a[$b]<'a' && $a[$b]!='' && $a[$b]!='.' && $a[$b]!='-') {
									# code...
									echo "invalid";
									break;
								}
								elseif ($a[$b]>'Z') {
									# code...
									if ($a[$b]<'a') {
										# code...
										echo "Invalid";
										break;
									}
									elseif ($a[$b]<'a') {
										# code...
										echo "Invalid";
										break;
									}
								}
								$b=$b-1;

							}
						}
						else{ echo "Please input a valid name";}
					}
					else{ echo "Please input a valid name";}
				}
				else{ echo "Please input a valid name";}

			}
			//email

			if (isset($_GET['email'])) {
				$a=$_GET['email'];
				if ($a=="") {
					echo "Eamil cannot be empty";
				}
				else {
					echo $a;
				}
			}

			//gender
			if (isset($_GET['gender'])) {
				$a=$_GET['gender'];
				echo $a;
			}
			if(isset($_GET['submit']) && !isset($_GET['gender']))
				{
					echo "select a gender";
				}

			//Blood group

			if (isset($_GET['bd'])) {
				$a=$_GET['bd'];
				echo $a;
			}
			else
			{
				
				if(isset($_GET['submit']))
				{
					echo "select a option ";
				}
			}



			$user = [
				'name'=> $name,
				'username'=> $username,
				'email'=> $email,
				'password'=> $password,
				'dateofbirth'=> $dateofbirth,
				'gender'=> $gender,
				'bloodgroup'=> $bloodgroup,
				'usertype'=> $usertype
			];
			$status = insert($user);
			if($status){
				header('location: ../views/login.php?success=registration_done');
			}else{
				header('location: ../views/reg.php?error=db_error');
			}
		}
	}



?>