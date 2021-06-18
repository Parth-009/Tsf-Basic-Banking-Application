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
		
		// Taking all 5 values from the form data(input)
		$first_name = $_REQUEST['first_name'];
		$last_name = $_REQUEST['last_name'];
		$gender = $_REQUEST['gender'];
		
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO user_master(Name,Email,Balance) VALUES ('$first_name',
			'$last_name','$gender')";
		


		if(mysqli_query($conn, $sql)){
		?>
		<script type="text/javascript">
			alert("User Create successfully");
			window.location.replace("home.php");
		</script>
		<?php

		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
		?>
	</center>
</body>

</html>
