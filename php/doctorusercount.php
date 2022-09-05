<?php
	require_once('../php/sessionheader.php');
	require_once('../service/userservice.php');

	
	$date=$_POST['date'];
	$id=getdoctorid();
	$result = countpatient($id,$date);
	?>
<br><br>
	<table border="1">
		<tr>
			<td>Date</td>
			<td>Total Patient</td>
		</tr>
		<tr>
			<td><?php echo $date; ?></td>
			<td><?php echo $result; ?></td>
		</tr>
	</table>
<br><br>
<h3>Patient Information</h3>
	<table border="1">
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Email</td>
			<td>Address</td>
			<td>Phone</td>
			<td>Gender</td>
			<td>Bloodgroup</td>
			<td>username</td>
			<td>Doctorid</td>
			<td>Appointdate</td>
		
		</tr>
  
			<?php $users = getpatient($date,$id);
			for ($i=0; $i != count($users); $i++) {  ?>
		<tr >
			<td><?=$users[$i]['id']?></td>
			<td><?=$users[$i]['name']?></td>
			<td><?=$users[$i]['email']?></td>
			<td><?=$users[$i]['address']?></td>
			<td><?=$users[$i]['phone']?></td>
			<td><?=$users[$i]['gender']?></td>
			<td><?=$users[$i]['bloodgroup']?></td>
			<td><?=$users[$i]['username']?></td>
			<td><?=$users[$i]['doctorid']?></td>
			<td><?=$users[$i]['appointdate']?></td>
		</tr>

		<?php } ?>

		
		
	</table>
	<?php
	
	?>
