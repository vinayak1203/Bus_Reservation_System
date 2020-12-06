<?php
session_start();

require 'dbh.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LOGIN.INC.PHP</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	
<?php

if(isset($_POST['logincsubmit'])){

	$cuseridp = $_POST['cuseridp'];
	$cpassp = $_POST['cpassp'];

	$sqla = "select * from admin where adminuserid = '$cuseridp';";
	$resulta = mysqli_query($conn, $sqla);

	$sql = "select * from customer where cuserid='$cuseridp';";
	$result = mysqli_query($conn, $sql);

	$sqld = "select * from driver where driveruserid='$cuseridp';";
	$resultd = mysqli_query($conn, $sqld);

	if(mysqli_num_rows($resulta)>0){

		while($rowa = mysqli_fetch_assoc($resulta)){

			if(strcmp($cpassp,$rowa['apassword'])==0){		

				$_SESSION['adminid'] = $rowa['adminid'];
	            $_SESSION['adminuserid'] = $rowa['adminuserid'];
	            header("Location: aindex.php?login=success");

			}else{

				echo '<p>PASSWORD NOT MATCHING </p>';
				echo '<p>WRONG PASSSWORD</p>';
				echo '<form action="cloginindex.php" method="post">
						<button class="btn123" name="tocloginindex">TO LOGIN PAGE</button>
						</form>';

			}
		}

	}
	elseif(mysqli_num_rows($result)>0){

			while($row = mysqli_fetch_assoc($result)){

				if(strcmp($cpassp,$row['cpassword'])==0){

						
					$_SESSION['cid'] = $row['cid'];
					$_SESSION['cuserid'] = $row['cuserid'];
					header("Location: cindex.php?login=success");

				}else{

						echo '<p>PASSWORD NOT MATCHING </p>';
						echo '<p>WRONG PASSSWORD</p>';
						echo '<form action="cloginindex.php" method="post">
								<button class="btn123" name="tocloginindex">TO LOGIN PAGE</button>
								</form>';
		
				}

			}
		
		}
		elseif(mysqli_num_rows($resultd)>0) {

					while($rowd = mysqli_fetch_assoc($resultd)){

						if(strcmp($cpassp,$rowd['driverpassword'])==0){

								
							$_SESSION['did'] = $rowd['did'];
							$_SESSION['driveruserid'] = $rowd['driveruserid'];

							header("Location: driverindex.php?login=success");

							}else{

								echo '<p>PASSWORD NOT MATCHING </p>';
								echo '<p>WRONG PASSSWORD</p>';
								echo '<form action="cloginindex.php" method="post">
										<button class="btn123" name="tocloginindex">TO LOGIN PAGE</button>
										</form>';
				
							}

					}
					
			}
			else{

				header("Location: cloginindex.php?cuserid=notfound");

				}

}
else{

	echo "INAPPROPRIATE URL";

}
?>
</body>
</html>