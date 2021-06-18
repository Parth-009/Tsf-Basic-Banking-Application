<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
	<center>
		<?php

		
		$conn = mysqli_connect("localhost", "root", "", "bank");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		 $sql = "SELECT id, firstname, lastname FROM customer2"; 
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
  			// output data of each row
  		while($row = $result->fetch_roe()) {
    	echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  		}
		}	
 		else 
 		{
  		echo "0 results";
		}
$conn->close();
?>
	</center>
</body>

</html>