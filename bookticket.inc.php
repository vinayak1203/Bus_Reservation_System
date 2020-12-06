<?php

session_start();
require_once 'dbh.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>

<?php

	$tto = $_SESSION['tto'];
	$tfrom = $_SESSION['tfrom'];
	$traveldate = $_SESSION['traveldate'];

	$cid = $_SESSION['cid'];

if(isset($_POST['book'])){

	$bbook = $_POST['book'];
	$abook = explode('.', $bbook);
	$rid = $abook[0];
	$bid = $abook[1];
	$sid = $abook[2];
	$savail = $abook[3];
	$sbooked = $abook[4];
	$bookprice = $abook[5];
	$noofpeople = $abook[6];
	$rfare =  $bookprice / $noofpeople;


	$sql = "insert into booked(	bookno,	bookfrom, bookto, noofpeoples, bookprice, bookdate, cid, bid, rid, sid) values 
						('$bbook','$tfrom','$tto', '$noofpeople', '$bookprice','$traveldate', '$cid' , '$bid', '$rid','$sid' );";
	$result = mysqli_query($conn, $sql);

	$sql1 ="select * from booked where bookno = '$bbook'";
	$result1 = mysqli_query($conn, $sql1);

	if(mysqli_num_rows($result1)>0){

		while($row1 = mysqli_fetch_assoc($result1)){

			$sbookeduselater = $sbooked;
			$sxbooked = $sbooked + $noofpeople;
			
			$sxavail = $savail - $noofpeople;

			$sql2 = "update seats set sbooked= '$sxbooked', savail= '$sxavail' where sid='$sid';";
			$resultu1 = mysqli_query($conn, $sql2);	

			$sql3 = "select * from seats where sid='$sid';";		
			$result3 = mysqli_query($conn, $sql3);

			$sql5 = "select * from booked order by bookid desc";
			$result5 = mysqli_query($conn, $sql5);



			if(mysqli_num_rows($result3)>0){

				while($row3 = mysqli_fetch_assoc($result3)){

					if(($row3['savail']==$sxavail)&&($sxbooked==$row3['sbooked'])){

						$sql4 = "select * from booked where bookno='$bbook' and cid='$cid' and rid='$rid' and bid='$bid'";
						$result4 = mysqli_query($conn, $sql4);

						if(mysqli_num_rows($result4)>0){

							while($row4 = mysqli_fetch_assoc($result4)){

								echo "<div class='card123'>";
								echo "<p class='h5'>ticket booked with ticket no: ".$bbook."<br></p>";
								echo "<br><br><br>";
								echo "<p class='h5'ticket id is: ".$row4['bookid'];
								echo "<br><br><br>";
								echo "<p class='h5'>travelling from: ".$row4['bookfrom']."<br></p>";
								echo "<p class='h5'>travelling to: ".$row4['bookto']."<br></p>";
								echo "<p class='h5'>travel no (YYYY-MM-DD): ".$row4['bookdate']."<br></p>";
								echo "<p class='h5'>travel in busid: ".$bid."<br></p>";
								echo "<p class='h5'>travelling with ".$row4['noofpeoples']." PEOPLES<br></p>";
								echo "<p class='h5'>travelling cost:".$row4['bookprice']."<br></p>";

								if($noofpeople==1){

									echo "<p class='h5'>travelling with seat no : ".($sbookeduselater+1)."<br></p>";

								}
								else{

									echo "<p class='h5'>travelling with seat no FROM : ".($sbookeduselater+1)."<br></p>";
									echo "<p class='h5'>travelling with seat no TO : ".($row3['sbooked']+1)."<br></p>";
									echo "</div>";
								}
								


								// header("Location: cindex.php?booking=sucess");
								?>
								<form action="cindex.php" method="post">
									
									<button type="submit" class="btn123" name="nexttomainpage">NEXT</button>

								</form>
								<?php
								
								exit();


							}

						}
	
					}

				}

			}
			else{

				echo "Error in update query";
			}


			

		}
	}
	else{
		echo "ERROR IN BOOKING";
	}


}
else{

	echo "didnt press book button";
}



?>

</body>
</html>

