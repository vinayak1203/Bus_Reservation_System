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

<h1> All BUSES </h1>

<table class="table table-primary table-hover">
                <thead>
    
                    <tr>
                        <th scope="col">bid</th>
                        <th scope="col">busname</th>
                        <th scope="col">busno</th>
                        <th scope="col">rid</th>
                        <th scope="col">did</th>
                        <th scope="col">from</th>
                        <th scope="col">rto</th>
                        <th scope="col">rfare</th>
                        <th scope="col">Delete</th>

                    </tr>
    
                </thead>
                <tbody>


<?php

if(isset($_POST['toviewallbus']) ){

    $sql = "Select bid, bname, bno, did, r.rid, rfrom, rto, rfare from bus b, route r where b.rid = r.rid";
    $result = mysqli_query($conn , $sql);

    if(mysqli_num_rows($result)){
    
        while($row = mysqli_fetch_assoc($result)){

            $bid = $row['bid'];
            $busname = $row['bname'];
            $busno = $row['bno'];
            $rid = $row['rid'];
            $did = $row['did'];
            $rfrom = $row['rfrom'];
            $rto = $row['rto'];
            $rfare = $row['rfare'];
            
            $btnval = $bid.".".$busname.".".$busno.".".$rid.".".$did.".".$rfrom.".".$rto.".".$rfare ;
            ?>
                    <tr>
                    <td><?php     echo $bid;     ?></td>
                    <td><?php     echo $busname;     ?></td>
                    <td><?php     echo $busno;     ?></td>
                    <td><?php     echo $rid;     ?></td>
                    <td><?php     echo $did;     ?></td>
                    <td><?php     echo $rfrom;     ?></td>
                    <td><?php     echo $rto;     ?></td>
                    <td><?php     echo $rfare;     ?></td>

                    <td><form action="deletebus.php" method="post">
                            <button name="todeletebus" value="<?php echo $btnval; ?>" class="btn123">DELETE BUS</button>
                    </form></td>
                    </tr>
            <?php



        }


    }else{
        echo "error in sql query";
    }

}else{
    echo "click op";
}

?>







                    </tbody>
</table>
<form action="aindex.php" method="post">
    <button class="btn123" name="backtoaindexfromviewallbooking">BACK TO MAIN PAGE</button>
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