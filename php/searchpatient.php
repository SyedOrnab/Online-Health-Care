<?php
	require_once('../php/sessionheader.php');
	require_once('../service/userservice.php');

	
	$name=$_POST['name'];
	$result = searchdatapatient($name);
	if(count($result)>0)
	{
	$data="<table border=1>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Email</td>
			<td>Address</td>
			<td>Phone</td>
			<td>Gender</td>
			<td>Blood Group</td>
		</tr>";
 		$n=0;
		while (count($result)>$n) 
		{
			$data .="<tr>
					<td>{$result[$n]['id']}</td>
					<td>{$result[$n]['name']}</td>
					<td>{$result[$n]['email']}</td>
					<td>{$result[$n]['address']}</td>
					<td>{$result[$n]['phone']}</td>
					<td>{$result[$n]['gender']}</td>
					<td>{$result[$n]['bloodgroup']}</td>
			
			</tr>";
			$n=$n+1;
		}
		$data .= "</table>";

		echo $data;
	}

		?>