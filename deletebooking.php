<?php 

require 'dbh.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleting BUS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    

<?php
if(isset($_POST['todeletebookingpage'])){

    $deletebooking = $_POST['todeletebookingpage'];


    $breakdbooking = explode("*.", $deletebooking);
    $bookid = $breakdbooking[0];
    $bookno = $breakdbooking[1];
    $bookfrom = $breakdbooking[2];
    $bookto = $breakdbooking[3];
    $noofpeople = $breakdbooking[4];
    $bookprice = $breakdbooking[5];
    $bookdate = $breakdbooking[6];
    $bookcid = $breakdbooking[7];
    $bookbid = $breakdbooking[8];
    $bookrid = $breakdbooking[9];
    $booksid = $breakdbooking[10];

    
    $sql = "delete from booked where bookid='$bookid'and bookno='$bookno'";
    $result = mysqli_query($conn, $sql);

    $sql1  = "select * from booked where bookid='$bookid'and bookno='$bookno'";
    $result1 = mysqli_query($conn, $sql1);

    $sql2 = "select * from seats where sid= '$booksid'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);

    $psavail= $row2['savail'];
    $psbooked = $row2['sbooked'];

    $usavail = $psavail + $noofpeople ;
    $usbooked = $psbooked - $noofpeople ;

    $sql3 = "update seats set savail='$usavail', sbooked='$usbooked' where sid='$booksid'";
    $result3 = mysqli_query($conn, $sql3);

    $sql4 = "select * from seats where sid='$booksid'";
    $result4 = mysqli_query($conn, $sql4);

    $row4 = mysqli_fetch_assoc($result4);

    if(($row4['savail']==$usavail) && ($row4['sbooked']==$usbooked)){

        if($result1 == FALSE){

            echo "ERROR in QUERY 0/1";
    
        }
        else{
            echo "<br><p class='larger'>ENTRY DELETED SUCCESSFULLY WITH BOOKID : ".$bookid." <br></p>";
            echo "<p>SEATS DEALLOCATED !!<br></p>";
            ?>
    
            <form action="viewallbooking.php" method="post">
            <button class="btn123" name="backtodeletepage">NEXT</button>
            </form>
    
    
            <?php
        }

    }
    else{

        echo "ERROR IN UPDATING SEATS";

    }


    

}
else{

    echo "HAHAHAHHAHHAHAHHAHAHAH";

}
?>
</body>
</html>