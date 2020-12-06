<?php

session_start();
require 'dbh.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>addroute.inc.page</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	


<?php

if(isset($_POST['addroutebtnp'])){

	$rfromp = strtolower($_POST['rfromp']);
	$rtop = strtolower($_POST['rtop']);
	$rfarep = $_POST['rfarep'];


	$sql = "select * from route where rfrom ='$rfromp' and rto= '$rtop' and rfare='$rfarep'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result)>0){


		$falserow = mysqli_fetch_assoc($result);
		$alreadyrid = $falserow['rid'];
		echo"route ALREADY PRESENT"."<br>"."RID     ".$alreadyrid."<br>";

		?>

		<form action="addbus.php" method="post">
			<button type="submit" name="toaddbuspage">ADD Bus</button>
		</form>
		<form action="addroute.php" method="post">
			<button type="submit" name="toaddroute">ADD Another Route</button>
		</form>
		<form action="aindex.php" method="post">
			<button type="submit" name="tomainpageofadmin">main page</button>
		</form>

		<?php


	}
	else{

		
		$sql1 = " insert into route( rfrom, rto, rfare) values ('$rfromp', '$rtop', '$rfarep');";
		$result1 = mysqli_query($conn, $sql1);

		$sql2 = "select * from route where rfrom ='$rfromp' and rto= '$rtop' and rfare='$rfarep'";
		$result2 = mysqli_query($conn, $sql2);



		if(mysqli_num_rows($result2)>0){

			$row2 = mysqli_fetch_assoc($result2);
			$rid = $row2['rid'];
			
			echo "<p classs='larger'>Route ADDED With"." RID :   ".$rid."</p>";
			?>

			<form action="addbus.php" method="post">
				<button type="submit" class="btn123" name="toaddbuspage">ADD Bus</button>
			</form>
			<form action="addroute.php" method="post">
				<button type="submit" class="btn123" name="toaddroute">ADD Another Route</button>
			</form>
			<form action="aindex.php" method="post">
				<button type="submit" class="btn123" name="tomainpageofadmin">main page</button>
			</form>



			<?php

		}
		else{
			echo "error in query";
		}
	}

	





}
else{

	echo " not clicked add route btn";

}

?>
</body>
</html>