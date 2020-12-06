<?php

if(isset($_POST['logoutasubmit'])){

session_start();
session_unset();
session_destroy();
header("Location: cloginindex.php?logout=success");
	
}
else{

	echo "INAPPROPRIATE URL";
}




?>