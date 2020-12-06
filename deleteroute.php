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

if(isset($_POST['todeleteroute']) ){

    $btnvalr = $_POST['todeleteroute'];
    $btnvr = explode("." , $btnvalr);

    $rid = $btnvr[0];
    $rfrom = $btnvr[1];
    $rto = $btnvr[2];
    $rfare = $btnvr[3];

    $sql = "delete from route where rid='$rid' and rfrom='$rfrom' and rto='$rto' and rfare='$rfare';";
    $result = mysqli_query($conn, $sql);

    $sql1 = "select from route where rid='$rid' and rfrom='$rfrom' and rto='$rto' and rfare='$rfare';";
    $result1 = mysqli_query($conn, $sql1);


    if((!$result1)==0){

        echo "ERROR IN SQL QUERY";

    }else{

        echo "<br><p class='larger'>ROUTE DELETED SUCCESSFULLY WITH RID : ".$rid." <br></p>";
        echo "<br><p >ROUTE WAS FROM : ".$rfrom." <br></p>";
        echo "<br><p >ROUTE WAS TILL/TO : ".$rto." <br></p>";
        echo "<br><p >ROUTE FARE WAS : ".$rfare." <br></p>";
        echo "<br><p ><b>DUE TO NO ROUTE THEREFORE BUS AND DRIVER ARE ALSO DELETED OF THIS ROUTE<b><br></p>";
        echo "<br><p class='larger'>ROUTE DELETED SUCCESSFULLY WITH RID : ".$rid." <br></p>";


    }


}
?>

<form action="aindex.php" method="post">
	<button type="submit" class="btn123" name="tomainpageofadmin">Main Page</button>
</form>
</body>
</html>