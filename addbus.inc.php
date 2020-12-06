<?php

session_start();
require 'dbh.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ADD BUS SUCCESS </title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	


<?php

if(isset($_POST['addbusbtnp'])){

$busnamep =  strtolower($_POST['busnamep']);
$busnop = strtolower($_POST['busnop']);
$rfrombp =  strtolower($_POST['rfrombp']);
$rtobp =  strtolower($_POST['rtobp']);
$rfarebp = $_POST['rfarebp'];
$ridbp = $_POST['ridbp'];
$bsdatebp = $_POST['bsdatebp'];
$bssavialbp = $_POST['bssavialbp'];
$bstotalsbp = $_POST['bstotalsbp'];
$bssbooked =  $bstotalsbp - $bssavialbp;
$driverfname = $_POST['driverfname'];
$did = $_POST['did'];
// $sql8 = "select * from route where rfrom ='$rfromp' and rto= '$rtop' and rfare='$rfarep'";
// $result8 = mysqli_query($conn, $sql);



// $sql9 = " insert into route( rfrom, rto, rfare) values ('$rfromp', '$rtop', '$rfarep');";
// $result9 = mysqli_query($conn, $sql1);

	
	$sql = "select * from route where rid='$ridbp' and rfrom ='$rfrombp' and rto= '$rtobp' and rfare='$rfarebp'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result)>0){

		$row = mysqli_fetch_assoc($result);

		if($row['rid']==$ridbp){

			$sql1 = "select * from bus where bname ='$busnamep' and bno= '$busnop' and rid='$ridbp'";
			$result1 = mysqli_query($conn , $sql1);


			// if bus already exist
			if(mysqli_num_rows($result1)>0){

				$row1 = mysqli_fetch_assoc($result1);

				echo "BUS is Already Exist"."<br>";
				echo "BUS id is ".$row1['bid'];
				?>
				<br>
				<form action="addbus.php" method="post">
					<button type="submit" class="btn123" name="toaddbuspage">ADD Bus</button>
				</form><br>
				<form action="addroute.php" method="post">
					<button type="submit" class="btn123" name="toaddroute">ADD Another Route</button>
				</form><br>
				<form action="aindex.php" method="post">
					<button type="submit" class="btn123" name="tomainpageofadmin">Main Page</button>
				</form>
				<?php

			}
			else{

				$sql2 =  "insert into bus( bname, bno, rid, did) values ('$busnamep', '$busnop', '$ridbp', '$did');";
				$result2 = mysqli_query($conn , $sql2);

				$sql3 = "select * from bus where bname ='$busnamep' and bno='$busnop' and rid='$ridbp' and did='$did';";
				$result3 = mysqli_query($conn , $sql3);

				if(mysqli_num_rows($result3)>0){

					$row3 = mysqli_fetch_assoc($result3);
					$pbid = $row3['bid'];

					$sql4 =  "insert into seats( srdate, sbooked, savail, bid) values ('$bsdatebp', '$bssbooked', '$bssavialbp', '$pbid');";
					$result4 = mysqli_query($conn , $sql4);

					$sql5 = "select * from seats where srdate ='$bsdatebp' and sbooked= '$bssbooked' and savail='$bssavialbp' and bid='$pbid';";
					$result5 = mysqli_query($conn , $sql5);

					if(mysqli_num_rows($result5)>0){

						$row5 = mysqli_fetch_assoc($result5);
						$psid = $row5['sid'];

						echo "<p class='h4' > BUS ADDED SUCCESSFULLY"."<br></p>";
						echo "<p class='h4' >Seats id:  ".$psid."<br></p>";
						echo "<p class='h4' >Bus id: ".$pbid."<br></p>";
						echo "<p class='h4' >Route is: ".$row['rid']."<br></p>";

						echo "<br><br><br>";

						?>

						<form action="addbus.php" method="post">
							<button type="submit" class="btn123" name="toaddbuspage">ADD Another Bus</button>
						</form>
						<form action="addroute.php" method="post">
							<button type="submit" class="btn123" name="toaddroute">ADD Another Route</button>
						</form>
						<form action="aindex.php" method="post">
							<button type="submit" class="btn123" name="tomainpageofadmin">Main Page</button>
						</form>

						<?php


					}
					else{

						echo "ERROR IN SQL4/ SQL5 : Seats Insertion or selection";

					}

				}
				else{

					echo "ERROR IN SQL3 : Inserting bus";

				}

			}



		}
		else{

			echo "RID does not Match";

		}

		

	}
	else{

		echo "ERROR IN SQL1 :  Starting Query select row ";

	}
	




}
else{

	echo "ADD BUS BUTTON NOT CLICKED ERROR";

}
?>
</body>
</html>