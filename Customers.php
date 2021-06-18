<!DOCTYPE html>
<html>
<head>
	<title>Customers</title>
	<style type="text/css">
		.table{
			height: 591px;
			width: 100%;
			background-color: #5CDB95;
		}
		
	</style>
</head>
<body>
	 <?php include 'header.php'; ?>

	 <?php
	 

$mysqli = new mysqli("localhost","root","","bank");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$sql = 'SELECT * FROM user_master';

?>

	<div class="table">
		<div class="row">
		<div class="col-2">
		</div>	
		<div class="col-8"> 
			<div class="view">
			<h1>View All Customers</h1>
			</div>
		<table class="mrgntp20" border="4"  >
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Balance</th>
			</tr>
			<?php if ($result = $mysqli -> query($sql)) {
			  while ($row = $result -> fetch_row()) {
			    ?>
			    <tr>
			    	<td> <?php echo $row['0'] ?></td>
			    	<td> <?php echo $row['1'] ?></td>
			    	<td> <?php echo $row['2'] ?></td>
			    	<td> <?php echo $row['3'] ?></td>
			    </tr> 	
			  <?php }
			  $result -> free_result();
			}

$mysqli -> close(); 
	  ?>		
		</table>
		</div>
		<div class="col-2">
		</div>
		</div>
		
	</div>

</body>
</html>