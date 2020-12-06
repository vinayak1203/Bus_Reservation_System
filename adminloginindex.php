<?

session_start();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Aloginindex</title>
</head>
<body>



<?php



	echo 'pls login'."<br><br><br><br><br>";
	?>
		<form action="admin.login.inc.php" method="post">
			<br>
			ADMIN USERID
			<input type="text" name="adminuseridp" placeholder="Admin USERID">
			<br>
			ADMIN password
			<input type="password" name="adminpassp" placeholder="Admin PASSWORD">
			<br>
			<br>
		<button type="submit" name="loginasubmit">login</button>
		</form>


<?php

?>

</body>
</html>