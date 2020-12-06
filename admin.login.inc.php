<?php
session_start();

require 'dbh.php';

if(isset($_POST['loginasubmit'])){

	$adminuseridp = $_POST['adminuseridp'];
	$adminpassp = $_POST['adminpassp'];

	$sql = "select * from admin where adminuserid='$adminuseridp';";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result)>0){

				while($row = mysqli_fetch_assoc($result)){

					if(strcmp($adminpassp,$row['apassword'])==0){

						
						$_SESSION['adminid'] = $row['adminid'];
	                    $_SESSION['adminuserid'] = $row['adminuserid'];
	                    echo $_SESSION['adminid']."<br>";
	                    echo $_SESSION['adminuserid']."<br>";
	                    echo $row['adminid']."<br>";
	                    echo $row['adminuserid']."<br>";
	                    header("Location: aindex.php?login=success");

					}

				}
	}
	else{

		header("Location: adminloginindex.php?adminuserid=notfound");
	}

}
else{

	echo "INAPPROPRIATE URL";

}