<?php
	$uid = $_POST['id'];


$mysqli = new mysqli("localhost","root","","bank");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$sql = 'SELECT Id,Name FROM user_master where Id Not in('.$uid.')';
if($result = $mysqli -> query($sql)) {	
	//print_r($result);
	while ($row = $result -> fetch_row()) {
		//print_r($row); die;
	?>	
		<option value="<?php echo $row['0'] ?>"> <?php echo $row['1'] ?> </option>			  					
	<?php 	} 
}