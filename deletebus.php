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


if(isset($_POST['todeletebus']) ){

            $btnvalue = $_POST['todeletebus'];
            $btnval = explode(".", $btnvalue);

            $bid = $btnval[0];
            $busname = $btnval[1];
            $busno = $btnval[2];
            $rid = $btnval[3];
            $did = $btnval[4];
            $rfrom = $btnval[5];
            $rto = $btnval[6];
            $rfare = $btnval[7];

        $sql = "Delete from bus where bid='$bid';";
        $result = mysqli_query($conn , $sql);

        $sql1 = "select * from bus where bid='$bid';";
        $result1 = mysqli_query($conn, $sql1);

        if(mysqli_num_rows($result1)){
    
            echo "Error in sql1";
        
        }else{

            echo "<br><p class='larger'>BUS DELETED SUCCESSFULLY WITH BID : ".$bid." <br></p>";
            echo "<p>SEATS DEALLOCATED !!<br></p>";
            echo "<br><p >BUS NAME WAS : ".$busname." <br></p>";
            echo "<br><p >BUS NO WAS : ".$busno." <br></p>";
            echo "<br><p class='larger'> DELETED SUCCESSFULLY </p>";

        }


}else{
    echo "Error in first if";
}

?>
            <form action="aindex.php" method="post">
                <button class="btn123" name="backtoaindexfromviewallbooking">BACK TO MAIN PAGE</button>
            </form>

</body>
</html>