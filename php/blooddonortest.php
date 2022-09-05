<?php
	require_once('../php/sessionheader.php');
	require_once('../service/userservice.php');
	$b = $_POST['date'];
	$abc = array('10','11','12','1','2','3','4','5','6','7','8','9');
	$users=getdonordate($b);
	for ($i=0; $i != count($users); $i++) 
	{
		$a = array_search($users[$i]['time'], $abc);
		$abc[$a]='0';
	} 
	for ($i=0; $i < count($abc); $i++) 
	{ 
		if ($abc[$i]!='0') {
			# code...
			echo $abc[$i].',';
		}
	}		
?>