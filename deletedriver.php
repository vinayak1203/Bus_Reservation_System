<?php

require 'dbh.php';
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View ALL BUS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>

<?php

if(isset($_POST['todeletedriver']) ){

    $btnvalueofd = $_POST['todeletedriver'];
    $btnvalofd = explode(".", $btnvalueofd);

    $did = $btnvalofd[0];
    $dfname = $btnvalofd[1];
    $duserid = $btnvalofd[2];
    $rid = $btnvalofd[3];
    $dfrom = $btnvalofd[4];
    $dto = $btnvalofd[5];
    $bid = $btnvalofd[6];
    $busname = $btnvalofd[7];
    $busno = $btnvalofd[8];

    $sql = "delete from driver where did='$did'and driveruserid='$duserid' and rid='$rid'";
    $result = mysqli_query($conn, $sql);

    $sql1 = "Select * from driver where did='$did'and driveruserid='$duserid' and rid='$rid'";
    $result1 = mysqli_query($conn, $sql1);

    if(mysqli_num_rows($result1)){

        echo 'ERROR IN SQL OF DELETE';

    }else{

        echo "<br><p class='larger'>DRIVER DELETED SUCCESSFULLY WITH DID : ".$did." <br></p>";
        echo "<p >DRIVER FIRST NAME WAS : ".$dfname." <br></p>";
        echo "<p >DRIVER USER ID WAS : ".$duserid." <br></p>";
        echo "<p >ROUTE ID WAS : ".$rid." <br></p>";
        echo "<p >DUE TO NO DRIVER BUS ALSO DELETED<br></p>";
            echo "<p>BUS DELETED SUCCESSFULLY WITH BID : ".$bid." <br></p>";
            echo "<p>SEATS DEALLOCATED !!<br></p>";
            echo "<p >BUS NAME WAS : ".$busname." <br></p>";
            echo "<p >BUS NO WAS : ".$busno." <br></p>";
            echo "<p class='larger'>DRIVER DELETED SUCCESSFULLY </p>";

    }


}else{

    echo "CLICK THE BUTTON";

}
?>
            <form action="aindex.php" method="post">
                <button class="btn123" name="backtoaindexfromviewallbooking">BACK TO MAIN PAGE</button>
            </form>

</body>
</html>