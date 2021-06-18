<!DOCTYPE html>
<html lang="en">

<head>
	<title>Create User</title>
</head>
<link rel="stylesheet" type="text/css" href="css/developer.css">
<style type="text/css">
	.createuser{
		background-color: #5CDB95;
	}
	.center h1{
		margin-top: 20px;
	}

	.center p{
		margin-top: 20px;

	}
	
</style>
<body class="createuser">
	 <?php include 'header.php'; ?>
	<center class="center">
		<h1 >Create a User</h1>

		<form action="insert.php" method="post" >
			
			<p>
				<label for="firstName">First Name:</label>
				<input type="text" name="first_name" id="firstName">
			</p>


			
			<p>
				<label for="lastName">Email:</label>
				<input type="text" name="last_name" id="lastName">
			</p>


			
			<p>
				<label for="Gender">Balance:</label>
				<input type="text" name="gender" id="Gender">
			</p>

			
			
			<input type="submit" value="Submit">
		</form>
	</center>
</body>

</html>
