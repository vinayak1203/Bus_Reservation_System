<?php
session_start();
require_once 'dbh.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>SelectBus</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>

<?php
if(isset($_POST['searchforbuses'])){

	$traveldate = $_POST['traveldate'];
	$tfrom = strtolower($_POST['tfrom']);
	$tto = strtolower($_POST['tto']);
	$noofpeople = $_POST['noofpeople'];

	$sql = "select * from route where rfrom='$tfrom' and rto='$tto'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result)>0){

		$_SESSION['tto'] = $tto;
		$_SESSION['tfrom'] = $tfrom;
		$_SESSION['traveldate'] = $traveldate;
		$_SESSION['noofpeople'] = $noofpeople;



		while($row = mysqli_fetch_assoc($result)){

			$routeid = $row['rid'];
			$sql1 = "select * from bus where rid= '$routeid'";
			$result1 = mysqli_query($conn, $sql1);


			if(mysqli_num_rows($result1)>0){

					while($row1 = mysqli_fetch_assoc($result1)){
						

						$busid = $row1['bid'];
						$sql2 = "select * from seats where bid='$busid'";
						$result2 = mysqli_query($conn, $sql2);

						if(mysqli_num_rows($result2)>0){

							while($row2 = mysqli_fetch_assoc($result2)){

								$seatsavail = $row2['savail'] ;
								$srdate = $row2['srdate'];
								$srdate1 = $_POST['traveldate'];
								
								
								
								if(strcmp($srdate,$_POST['traveldate'])==0){

									if($seatsavail >= $noofpeople ){

										$bookprice = $row['rfare'] * $noofpeople;

										$bbook = $row['rid'].".".$row1['bid'].".".$row2['sid'].".".$row2['savail'].".".$row2['sbooked'].".".$bookprice.".".$noofpeople;
										
										echo "<div class='card123'>"."<br>";
										echo "<p class='h5'>".$srdate."<br></p>";
										echo "<p class='h5'>".'Bus FOUND'."<br></p>";
										echo "<p class='h5'>From ".$row['rfrom']."<br></p>";
										echo "<p class='h5'>To ".$row['rto']."<br></p>";
										echo "<p class='h5'>Bus name ".$row1['bname']."<br></p>";
										echo "<p class='h5'>Bus no ".$row1['bno']."<br></p>";
										echo "<p class='h5'>Fare per person".$row['rfare']."<br></p>";
										echo "<p class='h5'>Seats booked ".$row2['sbooked']."<br></p>";
										echo "<p class='h5'>Seats Available ".$row2['savail']."<br></p>";
										
										



										echo "<form action='bookticket.inc.php' method='post'>

										<button type='submit' name='book' class='btn123' value='$bbook'>book</button>
										</form>";
										echo "<br><br><br></div>";
									}
									else if(($seatsavail> 0 )&& ($noofpeople > $seatsavail)){

										echo "<div class='card123'>"."<br>";
										echo "<p class='h5'>".$srdate."<br></p>";
										echo "<p class='h5'>".'Bus FOUND'."<br></p>";
										echo "<p class='h5'>From ".$row['rfrom']."<br></p>";
										echo "<p class='h5'>To ".$row['rto']."<br></p>";
										echo "<p class='h5'>Bus name ".$row1['bname']."<br></p>";
										echo "<p class='h5'>Bus no ".$row1['bno']."<br></p>";
										echo "<p class='h5'>Fare per person".$row['rfare']."<br></p>";
										echo "<p class='h5'>Seats booked ".$row2['sbooked']."<br></p>";
										echo "<p class='h5'>Seats Available ".$row2['savail']."<br></p>";
										echo "<p class='h5'>DO NOT HAVE FULL ".$noofpeople." SEATS AVAILABLE <br></p>";
										echo "<p class='h5'>WE ONLY HAVE ".$row2['savail']." SEATS <br></p>";
										echo '<form action="cindex.php">
											  <button class="btn123" name="lessnoofseatsbacktomainpage">CHANGE NO OF PEOPLE</button>
											  </form></div>';

									}
									else{
										echo "<div class='card123'>";
										echo "<p class='h5'>".$srdate."<br></p>";
										echo "<p class='h5'>".'Bus FOUND BUT NOT EMPTY'."<br></p>";
										echo "<p class='h5'>From ".$row['rfrom']."<br></p>";
										echo "<p class='h5'>To ".$row['rto']."<br></p>";
										echo "<p class='h5'>Bus name ".$row1['bname']."<br></p>";
										echo "<p class='h5'>Bus No ".$row1['bno']."<br></p>";
										echo "<p class='h5'>RId ".$row['rid']."<br></p>";
										echo "<p class='h5'>BID ".$row1['bid']."<br></p>";
										echo "<br><br><br></div>";

									}										

								}
								// else{
								// 	echo "//////////////////////////////////////////"."<br>";
								// 	echo "No bus AVAILABLE on ".$srdate."<br>";
								// 	echo "//////////////////////////////////////////"."<br>";
								// }
								
							
							}
						}
					}
			}else{

				echo 'no bus found';
			}

		}
		

	}
	else{

		echo'no route found';
	}




	echo '<form action="cindex.php" method="post">
	<button class="btn123" name="backtomainpage">TO MAIN PAGE</button>
	</form>';




}





?>


</body>
</html>