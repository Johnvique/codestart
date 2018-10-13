<!DOCTYPE html>
<html>
<head>
	<title>dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style type="text/css">
		
	</style>
</head>
<body>
	<?php
	session_start();
	if (isset($_SESSION['uname'])) {
		$myname=$_SESSION['uname'];
		$myemail=$_SESSION['mail'];
	}
	else{
	header("Location:index.html");
	}
	?>

	<div class="jumbotron">
		<h2>Welcome <?php echo $myname?></h2>

		<?php
		include 'conn.php';
		?>

		<div class="container">
			<a href="logout.php" class="btn btn-md btn-danger">LOG OUT</a>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Username</th>
						<th>Email</th>
						<th>DOB</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$query="SELECT * FROM `mytable1`";
					$execute_query=mysqli_query($connect,$query) or die(mysqli_error($connect));
					while ($result=mysqli_fetch_Array($execute_query)) {
						?>
					
					<tr>
					<td><?php echo $result['username'] ?></td>
					<td><?php echo $result['email'] ?></td>
					<td><?php echo $result['dob'] ?></td>
					<?php
				}

					?>
				</tr>
			</tbody>
		</table>
	</div>


</body>
</html>