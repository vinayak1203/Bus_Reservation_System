<?

session_start();

?>


<!DOCTYPE html>
<html>

<head>
	<title>Cindex</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>



	<?php


	echo '<div id="main" class="container">';
	echo '<div class="row  justify-content-center phpclass" >';
	echo '<p class="larger">LOGIN</p>' . "<br><br><br><br><br>";
	?>
	</div>
	<div class="row formclass">
		<form action="login.inc.php" method="post">
			<br>
			<label> User ID : </label>
			<input type="text" class="bordernone" name="cuseridp" placeholder="USERID">
			<br>
			<label>User Password : </label>
			<input type="password" class="bordernone" name="cpassp" placeholder="PASSWORD">
			<br>
			<br>
			<button type="submit" class="btn123" name="logincsubmit">login</button>
			<br>
		</form>
	</div>
	<div class="row formclass">
		<form action="registration.php">
			<button name="registerc" class="btn123">SIGN UP</button>
		</form>
	</div>

	</div>

	<?php

	?>
	<style>
		.btn123 {

			margin: 1rem 0;

		}
	</style>

</body>

</html>