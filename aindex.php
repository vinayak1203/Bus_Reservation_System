<?php

session_start();

?>


<!DOCTYPE html>
<html>
<head>
	<title>ADMINindex</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>



<?php

	$adminuserid = $_SESSION['adminuserid'];

	echo "<br>";

	echo "<p class='larger' >hello ADMIN : ".$adminuserid."</p>";

	?>

	<br>

	<form action="adminlogout.inc.php" method="post">
		<button type="submit" class="btn1234" name="logoutasubmit">LOGOUT</button>
	</form>
	<br>
	<h3> SELECT </h3>
	<br>
	
	<div class="container">

		
	
		<div class="container">
  			<div class="row">
    			<div class="col">

					<form action="addbus.php" method="post">
						<button type="submit" class="btn123" name="toaddbuspage">ADD BUS</button>
					</form>
				</div>
				<div class="col">

					<form action="addroute.php" method="post">
						<button type="submit" class="btn123" name="toaddroute">ADD ROUTE</button>
					</form>

				</div>
				<div class="col">
					<form action="adddriver.php" method="post">
						<button type="submit" class="btn123" name="toadddriver">ADD DRIVER</button>
					</form>
				</div>
			</div>


				<!-- <div class="col">
					<form action="viewallroute.php" method="post">
						<button type="submit" class="btn123" name="toviewallroute">VIEW ALL ROUTE</button>
					</form>
				</div> -->


			<div class="row">

				<div class="col-2"></div>
				<div class="col-8">
					<form action="viewallroute.php" method="post">
						<button type="submit" class="btn123" name="toviewallroute">VIEW ALL ROUTE AND DELETE ROUTE</button>
					</form>
				</div>	
				<div class="col-2"></div>

			</div>
			<div class="row">

				<div class="col-2"></div>
				<div class="col-8">
					<form action="viewalldriver.php" method="post">
						<button type="submit" class="btn123" name="toviewalldriver">VIEW ALL DRIVER AND DELETE DRIVER</button>
					</form>
				</div>	
				<div class="col-2"></div>

			</div>
			<div class="row">

				<div class="col-2"></div>
				<div class="col-8">
					<form action="viewallbus.php" method="post">
						<button type="submit" class="btn123" name="toviewallbus">VIEW ALL BUSES AND DELETE BUS</button>
					</form>
				</div>	
				<div class="col-2"></div>

			</div>
			<div class="row">

				<div class="col-2"></div>
				<div class="col-8">
					<form action="viewallbooking.php" method="post">
						<button type="submit" class="btn123" name="toviewallbooking">VIEW ALL BOOKING AND DELETE BOOKING</button>
					</form>
				</div>	
				<div class="col-2"></div>

			</div>
			
		</div>



	</div>
	<br>




<style>
	.btn123{
		width: 100%;
		margin: 0.5rem 0;
	}
	.btn1234{
    margin: 0;
    padding: 0.75rem 1.5rem;
    background: #d7e3fc;
    border: 1px solid black;
    border-radius: 7px;
	}
	.col{
		margin: 0.5rem;
	}
	body{
		margin-left: 21px;
	}
</style>

</body>
</html>