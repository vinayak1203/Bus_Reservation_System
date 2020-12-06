<?php

require 'dbh.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Bus Passengers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <h1> Bus Passenger </h1>

    <?php
    $did = $_SESSION['did'];
    $driveruserid = $_SESSION['driveruserid'];


    $sqls1 = "Select * from driver where did= '$did'";
    $results1 = mysqli_query($conn, $sqls1);

    if(mysqli_num_rows($results1)){
    
        while($rows1 = mysqli_fetch_assoc($results1)){

            $rid = $rows1['rid'];

            $sqls3 = "select * from route where rid='$rid';";
            $results3 = mysqli_query($conn, $sqls3);

            if(mysqli_num_rows($results3)){
    
                while($rows3 = mysqli_fetch_assoc($results3)){

                    $rfrom = $rows3['rfrom'];
                    $rto = $rows3['rto'];

                    $sqls2 = "select * from bus where rid='$rid' and did='$did' ;";
                    $results2 = mysqli_query($conn, $sqls2);

                    if(mysqli_num_rows($results2)){
                    
                        while($rows2 = mysqli_fetch_assoc($results2)){

                            $bid = $rows2['bid'];
                            $busname = $rows2['bname'];
                            $busno = $rows2['bno'];
     

                        }

                    }else{

                        $bid = '';
                        $busname = '';
                        $busno = '';

                    }

                }

            

            }

            

        }

    }

    ?>

    <h5 class="h5">Bus Name : <?php echo $busname; ?></h5>
    <h5 class="h5">Bus No : <?php echo $busno; ?></h5>
    <h5 class="h5">Bus ID : <?php echo $bid; ?></h5>
    <h5 class="h5">Route ID : <?php echo $rid; ?></h5>
    <h5 class="h5">Route From : <?php echo $rfrom; ?></h5>
    <h5 class="h5">Route To : <?php echo $rto; ?></h5>
   



            <table class="table table-primary table-hover">
                <thead>

                    <tr>
                        <th scope="col">cid</th>
                        <th scope="col">cfname</th>
                        <th scope="col">cuserid</th>
                        <th scope="col">bookid</th>
                        <th scope="col">bookingno</th>


                    </tr>
        
                </thead>
                <tbody>
<?php


    $sql = "Select * from bus where did='$did' ;";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)){
    
        while($row = mysqli_fetch_assoc($result)){

            $bid = $row['bid'];
            
            $sql1 = "Select * from booked where bid='$bid'";
            $result1 = mysqli_query($conn , $sql1);

            if(mysqli_num_rows($result1)){
    
                while($row1 = mysqli_fetch_assoc($result1)){

                    $cid = $row1['cid'];
                    $sid = $row1['sid'];
                    $rid = $row1['rid'];
                    $bookid = $row1['bookid'];
                    $bookno = $row1['bookno'];


                    $sql2 = "Select * from customer where cid='$cid';";
                    $result2 = mysqli_query($conn, $sql2);

                    if(mysqli_num_rows($result2)){
    
                        while($row2 = mysqli_fetch_assoc($result2)){

                            $cfname = $row2['cfname'];
                            $cuserid = $row2['cuserid'];
 

                            ?>

                            <tr>
                            <td><?php echo $cid; ?></td>
                            <td><?php echo $cfname; ?></td>
                            <td><?php echo $cuserid; ?></td>
                            <td><?php echo $bookid; ?></td>
                            <td><?php echo $bookno; ?></td>
                            </tr>

                            <?php

                        }

                    }else{
                        echo "error in sql2";
                    }

                }

            }else{
                echo "<p class='larger'>NO PASSENGERS TILL NOW</p>";
            }

        }

    }else{
        echo "<p class='larger'>NO BUS FOUND</p>";
    }


?>
                            </tbody>
</table>


<form action="driverindex.php" method="post">

    <button class="btn123" name="tomainpageformpassenger">TO INDEX PAGE</button>

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
