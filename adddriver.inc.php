<?php

require 'dbh.php';
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
<?php

if(isset($_POST['adddriverbtnp'])){

    $dfname = $_POST['driverfname'];
    $duserid = $_POST['driveruserid'];
    $dpass = $_POST['driverpassword'];
    $drid = $_POST['drid'];

    $sql = "insert into driver( dfname, driveruserid, driverpassword, rid ) values('$dfname', '$duserid', '$dpass', '$drid');";
    $result = mysqli_query($conn , $sql);

    $sql1 = "Select * from  driver where dfname='$dfname' and driveruserid='$duserid' and driverpassword='$dpass' and rid='$drid';";
    $result1 = mysqli_query($conn, $sql1);

    if(mysqli_num_rows($result1)){

        while($row = mysqli_fetch_assoc($result1)){

            $did = $row['did'];

            echo "<p class='larger'> DRIVER ADDED SUCESSFULLY<br></p>";
            echo "<p>Driver ID IS ".$did."<br></p>";
            echo "<p>Driver First Name IS ".$dfname."<br></p>";
            echo "<p>Driver USER ID IS ".$duserid."<br></p>";
            echo "<p>Driver PASSWORD IS ".$dpass."<br></p>";
            echo "<p>Driver ROUTE ID IS ".$drid."<br></p>";
            echo "<p>DID IS ".$did."<br></p>";



        }

    }


}

?>
<form action="aindex.php" method="post">
    <button class="btn123" name="backtoaindexfromviewallbooking">BACK TO MAIN PAGE</button>
</form>
</body>
</html>
