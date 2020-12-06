<?php

require_once "dbh.php";
session_start();

?>


<!DOCTYPE html>
<html>
<head>
	<title>REGISTARTION</title>
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>

<?php



if(isset($_POST['registersubmit'])){

    $userid = $_POST['ruseridp'];
    $upass = $_POST['rpassp'];
    $urpass = $_POST['rrepeatpassp'];
    $ufname = $_POST['rcpassp'];

    

    $sql = "Select * from customer where cuserid='$userid' and cfname='$ufname';";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)){

        $row = mysqli_fetch_assoc($result);

        $cid = $row['cid'];

        echo "<p class='larger'>USER PRESENT WITH CID : ".$cid."</p>";
        echo "<p class='larger'>PLS ENTER THE PROPER USER ID AND PASSWORD</p>";


        

        echo'<form action="cloginindex.php?ruseridp=used" method="post">
                <button class="btn123" name="tocloginindex">TO LOGIN PAGE</button>
            </form>';

        

    }else{

        if(strcmp($urpass, $upass)==0){

            $sql1 = "insert into customer( cuserid, cpassword, cfname) values( '$userid', '$upass', '$ufname'); ";
            $result1 = mysqli_query($conn, $sql1);

            echo '';

            $sql2 = "select * from customer where cuserid='$userid' and cpassword='$upass' and cfname='$ufname';";
            $result2 = mysqli_query($conn, $sql2);

            if(mysqli_num_rows($result2)){

                while($row2 = mysqli_fetch_assoc($result2)){

                    $_SESSION['cid'] = $row2['cid'];
                    $_SESSION['cuserid'] = $row2['cuserid'];
                    
                    

                    echo '
                    <p class="larger">USER REGISTERED SUCCESSFULLY</p><br>
                    <p class="larger">USER CID : '.$row2['cid'].'</p><br>
                    <p> USER ID : '.$userid.'</p><br>
                    <p> USER FIRST NAME : '. $ufname.'</p><br>
                    
                    <br>
                    <form action="cindex.php" method="post">
                        <button name="tocindex" class="btn123">NEXT</button>
                    </form>';

                    
                        
                }

            }else{

                echo "ERROR IN SQL!";

            }

        }else{


            echo "<p class='larger'>PLS ENTER THE SAME PASSWORD AND REPEAT PASSSWORD</p>";


            

            echo '<form action="cloginindex.php?rpass=unmatch" method="post">
                    <button class="btn123" name="tocloginindex">TO LOGIN PAGE</button>
                </form>';

            
            
        }
        

    }


}else{

    echo "PLS PRESS BUTTON";

}

?>
</body>
</html>