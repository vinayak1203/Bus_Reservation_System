<?php

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

	$cuserid = $_SESSION['cuserid'];
	$cid = $_SESSION['cid'];

	echo "<br>";

	echo "<p class='larger'>hello USER : ".$cuserid."</p>";

	?>

	<br>

	<form action="logout.inc.php" method="post">
		<button type="submit" class="btn123" name="logoutsubmit">LOGOUT</button>
	</form>
	

	<br><form action="viewallbookingforc.php" method="post">
		<button name="toviewallbookingforc" value="<?php  echo $cid; ?>" class="btn123">VIEW BOOKING</button>
	</form>
	<br>

	<form action="selectbus.php" method="post">

		
		<br>
		<h1> Search Routes </h1>
		<br>
		<br>
		<label> Date : </label>
		<input type="date" class="bordernone" name="traveldate" placeholder="date">
		<br>
		<label> From : </label>
		<input type="text" class="bordernone" name="tfrom" placeholder="From">
		<br>
		<label> To :</label>
		<input type="text" class="bordernone" name="tto" placeholder="To">
		<br>
		<label> NO of people:</label>
		<input type="number" class="bordernone" min=1 max=6 name="noofpeople" style="width:227px;"placeholder="NO OF PEOPLES">
		<br>
		<button type="submit" class="btn123" name="searchforbuses">Go</button>
		<br>
		

	</form>







</body>
</html>