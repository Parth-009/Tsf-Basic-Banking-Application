
<!DOCTYPE html>
<html>
<head>
	<title>money transfer</title>
	<link rel="stylesheet" type="text/css" href="css/developer.css">


</head>

<body>
	<?php

	function generate_string($input, $strength = 16) {

    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}   


	if ($_POST) {
		$permitted_chars = '0123456789';
		 $sender_id=$_POST['sender_id']; 
		$amount=$_POST['payamount'];
		$receiver_id=$_POST['receiver_id'];
		$transaction_id=  generate_string($permitted_chars, 10);

		
	 $mysqli = new mysqli("localhost","root","","bank");

	if ($mysqli -> connect_errno) {
  		echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  		exit();
		}

	$fetch_bal1 = "select Balance from user_master where id=".$sender_id;
	
	$fetchbal1 = 0;


	if($result1 = $mysqli -> query($fetch_bal1)) {	
	//print_r($result);
	while ($row1 = $result1 -> fetch_row()) {
		$fetchbal1 = $row1['0'];
	}
}


	$fetch_bal2 = "select Balance from user_master where id=".$receiver_id;
	
	$fetchbal2 = 0;

	if($result2 = $mysqli -> query($fetch_bal2)) {	
	//print_r($result);
	while ($row2 = $result2 -> fetch_row()) {
		$fetchbal2 = $row2['0'];
	}
}

	if($fetchbal1 >= $amount){
		
	
	 $sql="INSERT INTO transaction(sender_id,receiver_id,amount,transaction_id) VALUES($sender_id,$receiver_id,$amount,$transaction_id)";
	$mysqli -> query($sql); 


	$fetch_bal2 = "select user_master from user where id=".$receiver_id;			

	$balance1 = $fetchbal1 - $amount;

	$balance2 = $fetchbal2 + $amount;	

	$sql1 = "UPDATE user_master SET Balance=".$balance1." WHERE id=".$sender_id;
	$mysqli -> query($sql1);

	$sql2 = "UPDATE user_master  SET Balance=".$balance2." WHERE id=".$receiver_id;
	$mysqli -> query($sql2);
		
		?>
		<script type="text/javascript">
			alert("Transaction has been successfully completed ");
			window.location.replace("Customers.php");   
		</script>	
		<?php	

	}
	else{
		 ?>
		<script type="text/javascript">
			alert("Insufficient balance");
			window.location.replace("home.php");
			//return false;
		</script>	
		<?php
	}



	}


	?>
	<?php include 'header.php'; ?>

	<?php
	$mysqli = new mysqli("localhost","root","","bank");
	$sql='SELECT Id,Name from user_master'
		?>
	<div class="form">

	<div class="row">
		<div class="col-2">
		</div>
		<div class="col-8">
		<h1>Money Transfer</h1>
		<div class="transfer">
			<form method="POST" action="">
  				<label for="sname">Sender Name:</label>

  				<select id="sender_id" name="sender_id" onchange="senderdata(this.value)">
  						<option value="">Select Sender</option>  
  						<?php if($result = $mysqli -> query($sql)) {
			  					while ($row = $result -> fetch_row()) {
							?>	
							    <option value="<?php echo $row['0'] ?>"> <?php echo $row['1'] ?> </option>			  					
			  				<?php 	} 
			  				} ?>   			
      			</select>
      			

  				
  					<br>
  				<label for="pay">Pay amount:</label>
  				<input type="number" id="payamount" name="payamount"><br>
  				<label for="sname">receiver Name:</label>
  				<select id="receiver_id" name="receiver_id" >
  						<option value="">Select Receiver </option>  
  						   			
      			</select>

  				
  				<br>
  				<div class="button">
  				<input type="submit" value="Pay amount">
  				</div>
  				<?php 
			  
$mysqli -> close(); 
	  ?>	
			</form>
		</div>
		</div>		
		<div class="col-2">
			
		</div>
	</div>
	</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
	
	function senderdata(id){
		

		$.ajax({type:'post',data:{id:id},url: "receiver_data.php", success: function(result){
    		$("#receiver_id").html(result);
  		}});
	}

</script>

</body>
</html>