<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>ADD BUS</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<br>
	<br>
	<form action="addbus.inc.php" method="post">

		<h1>ADD Bus</h1>
		<br>
		<br>
		
		<!-- bus -->
		<label>Bus Name : </label>
		<input class="bordernone" type="text" name="busnamep" placeholder="Bus Name">
		<br>
		<label>Bus Number : </label>
		<input class="bordernone" type="text" name="busnop" placeholder="Bus Number">
		<br>

		<!-- route -->
		<label>R From :  </label>
		<input class="bordernone" type="text" name="rfrombp" placeholder="R From">
		<br>
		<label>R To : </label>
		<input class="bordernone" type="text" name="rtobp" placeholder="R To">
		<br>
		<label>R Fare : </label>
		<input class="bordernone" type="text" name="rfarebp" placeholder="R Fare">
		<br>
		<label>RID : </label>
		<input class="bordernone" type="text" name="ridbp" placeholder="RID">
		<br>

		<!-- seats -->
		<label>Bus Date : </label>
		<input class="bordernone" type="date" name="bsdatebp" placeholder="Bus Date">
		<br>
		<label>Bus Seats Available : </label>
		<input class="bordernone" type="text" name="bssavialbp" placeholder="Bus Seats Available">
		<br>
		<label>Bus Total Seats : </label>
		<input class="bordernone" type="text" name="bstotalsbp" placeholder="Bus Total Seats">

		<br>
		<!-- driver -->
		<label>Driver ID : </label>
		<input class="bordernone" type="text" name="did" placeholder="Driver ID">
		<br>
		<label>Driver First Name : </label>
		<input class="bordernone" type="text" name="driverfname" placeholder="Driver Frist Name">
		<br>

		<button type="submit" class="btn123" name="addbusbtnp">ADD BUS</button>




	</form>
	<form action="aindex.php" method="post">
    	<button class="btn123" name="backtoaindexfromviewallbooking">BACK TO MAIN PAGE</button>
    </form>



</body>
</html>