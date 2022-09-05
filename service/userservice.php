<?php
	require_once('../database/dataaccess.php');
	//session_start();

	function getplasmadonorid($id){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from plasmadonorreg where id={$id}";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getplasmareceiverid($id){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from plasmareceiverreg where id={$id}";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
	function getcovidid($id){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from covidreg where id={$id}";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getdoctorid(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}
		$username=$_SESSION['username'] ;
		$sql = "select * from doctorreg where username='{$username}'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row['id'];
	}



	function getcovidtestingdate($date){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "SELECT * FROM `covidreg` WHERE covidtestingdate='{$date}'";

		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function getreceiverdate($date){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "SELECT * FROM `plasmareceiverreg` WHERE plasmareceiverdate='{$date}'";

		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function getalldate($date){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "SELECT * FROM `plasmadonorreg` WHERE plasmadonationdate='{$date}'";

		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	
	function getallplasmadonor(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from plasmadonorreg";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function getallplasmareceiver(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from plasmareceiverreg";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function getcovidtesting(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from covidreg";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
		}

	function getallpatient(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from patientreg";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function getdoctor(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from doctorreg inner join registration on doctorreg.username=registration.username";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
		}


		function getpatient($date,$id){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from patientreg inner join appoint on patientreg.username=appoint.username where appointdate='{$date}' and doctorid={$id}";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
		}


	function validate($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from registration where username='{$user['username']}' and password='{$user['password']}' and usertype='{$user['usertype']}'";
		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);

		if(count($user) > 0 ){
			return true;
		}else{
			return false;
		}
	}

	function insert($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "insert into registration values('{$user['name']}','{$user['username']}','{$user['email']}','{$user['password']}','{$user['dateofbirth']}','{$user['gender']}','{$user['bloodgroup']}','{$user['usertype']}' )";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

	//doctoradd
	function insertdoctorreg($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "insert into registration values('{$user['name']}','{$user['username']}','{$user['email']}','{$user['password']}','{$user['dateofbirth']}','{$user['gender']}','{$user['bloodgroup']}','Doctor' )";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

	//update
	function updateplasmadonor($user){
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}

		$sql = "update plasmadonorreg set name='{$user['name']}', email='{$user['email']}', address='{$user['address']}', phone='{$user['phone']}', gender='{$user['gender']}', bloodgroup='{$user['bloodgroup']}', plasmadonationdate='{$user['plasmadonationdate']}', time='{$user['time']}' where id={$user['id']}";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function updateplasmareceiver($user){
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}

		$sql = "update plasmareceiverreg set name='{$user['name']}', email='{$user['email']}', address='{$user['address']}', phone='{$user['phone']}', gender='{$user['gender']}', bloodgroup='{$user['bloodgroup']}', plasmareceiverdate='{$user['plasmareceiverdate']}', time='{$user['time']}' where id={$user['id']}";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function updatecovid($user){
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}

		$sql = "update covidreg set name='{$user['name']}', email='{$user['email']}', address='{$user['address']}', phone='{$user['phone']}', gender='{$user['gender']}', bloodgroup='{$user['bloodgroup']}', covidtestingdate='{$user['covidtestingdate']}', time='{$user['time']}' where id={$user['id']}";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}


	///delete
	function deleteplasmadonor($user)
	{
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}

		$sql = "DELETE FROM plasmadonorreg WHERE id={$user['id']}";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function deleteplasmareceiver($user)
	{
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}

		$sql = "DELETE FROM plasmareceiverreg WHERE id={$user['id']}";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function deletecovid($user)
	{
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}

		$sql = "DELETE FROM covidreg WHERE id={$user['id']}";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}


	function checkusername($username)
	{
		$conn = dbConnection();
		$sql = "select * from registration where username='{$username}'";
		if(mysqli_query($conn, $sql)){
			$result=mysqli_query($conn, $sql);
			$user = mysqli_fetch_assoc($result);
			if(empty($user)){
			return false;
			}
			else
			{
				return true;
			}
		}
		else
		{
			return false;
		}

	}

	//plasmadonor
	function insertplasmadonor($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "insert into plasmadonorreg values('','{$user['name']}','{$user['email']}','{$user['address']}','{$user['phone']}','{$user['gender']}','{$user['bloodgroup']}','{$user['plasmadonationdate']}','{$user['time']}')";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

		function insertplasmareceiver($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "insert into plasmareceiverreg values('','{$user['name']}','{$user['email']}','{$user['address']}','{$user['phone']}','{$user['gender']}','{$user['bloodgroup']}','{$user['plasmareceiverdate']}','{$user['time']}')";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}


	function insertcovidtesting($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "insert into covidreg values('','{$user['name']}','{$user['email']}','{$user['address']}','{$user['phone']}','{$user['gender']}','{$user['bloodgroup']}','{$user['covidtestingdate']}','{$user['time']}')";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}


		function insertpatient($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}
		$username=$_SESSION['username'];
		$sql = "insert into patientreg values('','{$user['name']}','{$user['email']}','{$user['address']}','{$user['phone']}','{$user['gender']}','{$user['bloodgroup']}','{$username}')";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}


		function insertdoctor($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "insert into doctorreg values('','{$user['address']}','{$user['phone']}','{$user['degree']}','{$user['username']}')";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

	//search
	function searchdatab($name){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from plasmareceiverreg where name like '%{$name}%'";
		$users = [];
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function searchdatapatient($name){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from patientreg where name like '%{$name}%'";
		$users = [];
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function searchdatacovid($name){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from covidreg where name like '%{$name}%'";
		$users = [];
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}


	
	function searchdataplasmadonor($name){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from plasmadonorreg where name like '%{$name}%'";
		$users = [];
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}



	function searchdatadoctor($name){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from doctorreg inner join registration on doctorreg.username=registration.username where name like '%{$name}%'";
		$users = [];
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}



	//count
	function countblood(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "SELECT COUNT(bloodgroup) as 'totalblood',bloodgroup FROM plasmadonorreg GROUP BY bloodgroup";
		$users = [];
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}
	//appoint
	function appointdoctor($id,$date)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}
		$username=$_SESSION['username'] ;
		$sql1="select count(*) as 'total' from appoint where doctorid='{$id}' and appointdate='{$date}'";
		$result1=mysqli_query($conn,$sql1);
		$row1 = mysqli_fetch_assoc($result1);
		$parse1=(int)($row1['total']);
			if ($parse1<=2)
			{
				$sql2="select * from registration where username='{$username}'";
				//return $sql2;
				$result2=mysqli_query($conn,$sql2);
				$row2 = mysqli_fetch_assoc($result2);
				$sql = "insert into appoint values('{$id}','{$username}','{$date}')";
					if(mysqli_query($conn, $sql))
					{
						return "Appointment Sucessful";
					}
					else
					{
						return false;
					}
				/*if($row2['username']!==$username)
				{
					
				}*/	
			}
			else
			{
				return "Select another date";
			}
			
	}


	//count patient
	function countpatient($id,$date)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}
		$sql="select count(*) as 'total' from appoint where doctorid='{$id}' and appointdate='{$date}'";
		$result1=mysqli_query($conn,$sql);
		$row1 = mysqli_fetch_assoc($result1);
		return $row1['total'];
	}



	//blood



    function getbloodreceiverdate($date){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "SELECT * FROM `bloodreceiverreg` WHERE bloodreceiverdate='{$date}'";

		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}


	function getallblooddonor(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from blooddonorreg";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}



	function getallbloodreceiver(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from bloodreceiverreg";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	//blooddonor
	function insertblooddonor($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "insert into blooddonorreg values('','{$user['name']}','{$user['email']}','{$user['address']}','{$user['phone']}','{$user['gender']}','{$user['bloodgroup']}','{$user['blooddonationdate']}','{$user['time']}')";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function insertbloodreceiver($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "insert into bloodreceiverreg values('','{$user['name']}','{$user['email']}','{$user['address']}','{$user['phone']}','{$user['gender']}','{$user['bloodgroup']}','{$user['bloodreceiverdate']}','{$user['time']}')";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function receiversearchdata($name){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from bloodreceiverreg where name like '%{$name}%'";
		$users = [];
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function donorsearchdata($name){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from blooddonorreg where name like '%{$name}%'";
		$users = [];
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

?>