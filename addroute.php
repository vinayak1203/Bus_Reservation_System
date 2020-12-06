<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>ADD ROUTE</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>

	<br>
	<form action="addroute.inc.php" method="post">

		<h1> ADD ROUTE </h1>
		
		<br>
		<label>R From : </label>
		<input type="text" class="bordernone" name="rfromp" placeholder="R From">
		<br>
		<label>R to : </label>
		<input type="text" class="bordernone" name="rtop" placeholder="R To">
		<br>
		<label>R Fare : </label>
		<input type="text" class="bordernone" name="rfarep" placeholder="R Fare">
		<br>
		<button type="submit" class="btn123" name="addroutebtnp">ADD ROUTE</button>
		<br>

	</form>
	<br>
	<form action="aindex.php" method="post">
    	<button class="btn123" name="backtoaindexfromviewallbooking">BACK TO MAIN PAGE</button>
    </form>



</body>
</html>