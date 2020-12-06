<?php

require 'dbh.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Transaction</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <h1> ALL TRANSACTION </h1>
            <table class="table table-primary table-hover">
                <thead>
    
                    <tr>
                        <th scope="col">bookid</th>
                        <th scope="col">bookno</th>
                        <th scope="col">bookingfrom</th>
                        <th scope="col">bookingto</th>
                        <th scope="col">No of peoples</th>
                        <th scope="col">bookprice</th>
                        <th scope="col">bookingdate</th>
                        <th scope="col">Customerid</th>
                        <th scope="col">customerFname</th>
                        <th scope="col">busbid</th>
                        <th scope="col">seatssid</th>
                        <th scope="col">DELETE</th>

                    </tr>
    
                </thead>
                <tbody>


<?php


if(isset($_POST['toviewallbooking']) || isset($_POST['backtodeletepage'])){

    $sql = "select * from booked";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result)){
    
        while($row = mysqli_fetch_assoc($result)){
    
        
            $bookid = $row['bookid'];
            $bookno = $row['bookno'];
            $bookfrom = $row['bookfrom'];
            $bookto = $row['bookto'];
            $noofpeople = $row['noofpeoples'];
            $bookprice = $row['bookprice'];
            $bookdate = $row['bookdate'];
            $bookcid = $row['cid'];
            $bookbid = $row['bid'];
            $bookrid = $row['rid'];
            $booksid = $row['sid'];
            


            
    
            $sql1 = "select * from customer where cid='$bookcid'";
            $result1 = mysqli_query($conn, $sql1);
    
            if(mysqli_num_rows($result1)){
    
                while($row1 = mysqli_fetch_assoc($result1)){
    
                    $tcid = $row1['cid'];
                    $tcfname = $row1['cfname'];
                    
                    
    
        
    
    ?>
                <tr>
    
                    <td><?php     echo $bookid;     ?></td>
                    <td><?php     echo $bookno;     ?></td>
                    <td><?php     echo $bookfrom;     ?></td>
                    <td><?php     echo $bookto;     ?></td>
                    <td><?php     echo $noofpeople;     ?></td>
                    <td><?php     echo $bookprice;     ?></td>
                    <td><?php     echo $bookdate;     ?></td>
                    <td><?php     echo $bookcid;     ?></td>
                    <td><?php     echo $tcfname;     ?></td>
                    <td><?php     echo $bookbid;     ?></td>
                    <td><?php     echo $booksid;     ?></td>
                <?php
                   
                    $deletebooking = $bookid."*.".$bookno."*.".$bookfrom."*.".$bookto."*.".$noofpeople."*.".$bookprice."*.".$bookdate."*.".$bookcid."*.".$bookbid."*.".$bookrid."*.".$booksid;

                ?>

                    <td>
                    <form action="deletebooking.php" method="post">

                    <button type="submit" class="btn123" value="<?php echo $deletebooking?>" name="todeletebookingpage">DELETE BOOKING</button>
                    
                    </form>
                    </td>
    
                </tr>
                <br>
                

    

    <?php
    
                }    
            
            }
            else{
    
                echo "ERROR IN QUERY 2 Customer";
    
            }
    
        }   

        ?>
                </tbody>
    
            </table>
        <?php
    
    }
    else{
    
        echo "NO ENTRY OR ERROR in Query 1";
    
    }
    
    ?>
    <form action="aindex.php" method="post">
    <button class="btn123" name="backtoaindexfromviewallbooking">BACK TO MAIN PAGE</button>
    </form>
    
    
    <?php

}
else{

    echo "INAPPRO HAHAHAHAHHAHAH URL";

}



?>
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