<!DOCTYPE html>
<html>
<head>
	<title>Transaction-history</title>
	<style type="text/css">
		.table{
			height: 590px;
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

$sql = 'SELECT  
b.Name as sender_name,
c.Name as receiver_name,a.transaction_id,a.amount
FROM transaction as a  

JOIN user_master as b ON a.sender_id=b.Id

JOIN user_master as c ON a.receiver_id=c.Id ';

?>

	<div class="table">
		<div class="row">
		<div class="col-2">
		</div>	
		<div class="col-8"> 
			<div class="view">
			<h1>Transaction History</h1>
			</div>
		<table class="mrgntp20" border="4"  >
			<tr>
				<th>Sender_name</th>
				<th>receiver_name</th>
				<th>Transaction_ID</th>
				<th>Amount</th>
			</tr>
			<?php if ($result = $mysqli -> query($sql)) { 
				
				if($result->num_rows > 0){
			  while ($row = $result -> fetch_row()) {
			    ?>
			    <tr>
			    	
			    	<td> <?php echo $row['0'] ?></td>
			    	<td> <?php echo $row['1'] ?></td>
			    	<td> <?php echo $row['2'] ?></td>
			    	<td> <?php echo $row['3'] ?></td>
			    </tr> 	
			  <?php }
			}
			else{ ?>
				<tr>
					<td colspan="5"> No record found</td>
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