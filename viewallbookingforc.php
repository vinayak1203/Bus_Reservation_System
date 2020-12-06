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

<h1> All BOOKING </h1>


<table class="table table-primary table-hover">
                <thead>
    
                    <tr>
                        <th scope="col">bookid</th>
                        <th scope="col">bookno</th>
                        <th scope="col">bookfrom</th>
                        <th scope="col">bookto</th>
                        <th scope="col">noofpeoples</th>
                        <th scope="col">bookprice</th>
                        <th scope="col">bookdate</th>
                        <th scope="col">rid</th>
                        <th scope="col">bid</th>
                        <th scope="col">sid</th>
                        <th scope="col">delete</th>


                    </tr>
    
                </thead>
                <tbody>

<?php

if(isset($_POST['toviewallbookingforc'])){

    $cid = $_POST['toviewallbookingforc'];
    

    $sql = "select * from booked where cid='$cid' ;";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)){

        while($row = mysqli_fetch_assoc($result)){

            $bookid = $row['bookid'];
            $bookno = $row['bookno'];
            $bookfrom = $row['bookfrom'];
            $bookto = $row['bookto'];
            $noofpeoples = $row['noofpeoples'];
            $bookprice = $row['bookprice'];
            $bookdate = $row['bookdate'];
            $rid = $row['rid'];
            $bid = $row['bid'];
            $sid = $row['sid'];

            $btnvb = $bookid."*.".$bookno."*.".$bookfrom."*.".$bookto."*.".$noofpeoples."*.".$bookprice."*.".$bookdate."*.".$cid."*.".$bid."*.".$rid."*.".$sid;

            ?>

                        <tr>
                        <td><?php     echo $bookid;     ?></td>
                        <td><?php     echo $bookno;     ?></td>
                        <td><?php     echo $bookfrom;     ?></td>
                        <td><?php     echo $bookto;     ?></td>
                        <td><?php     echo $noofpeoples;     ?></td>
                        <td><?php     echo $bookprice;     ?></td>
                        <td><?php     echo $bookdate;     ?></td>
                        <td><?php     echo $rid;     ?></td>
                        <td><?php     echo $bid;     ?></td>
                        <td><?php     echo $sid;     ?></td>


                        
                        <td><form action="deletebooking1.php" method="post">
                                <button name="todeletebooking" value="<?php  echo $btnvb ; ?>" class="btn123">DELETE BOOKING</button>
                        </form></td>
                        </tr>


            <?php
            

        }

    }else{

        echo "error in sql";
    }



}else{

    echo 'PLS CLICK BUTTON';

}
?>
 </tbody>
</table>
<form action="cindex.php" method="post">
    <button class="btn123" name="backtocindexfromviewallbooking">BACK TO MAIN PAGE</button>
</form>
<style>
    th, td{
        font-size: 0.75rem;
        font-weight: 600;
        text-align: center;
    }
    body{
        margin-left: 0;
    }
    br{
        display: none;
    }
    h1{
        text-align: center;
    }

</style>
</body>
</html>