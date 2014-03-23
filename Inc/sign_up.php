<?php

if( !isset( $_POST['user'] ) ) { ?>





	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
		
		Förnamn:
		<input type="text" name="fname">
		Efternam:
		<input type="text" name="lname">
		Användarnamn:
		<input type="text" name="username">
		Lösenord:
		<input type="text" name="pswd">
		Email:
		<input type="text" name="email">
		
		<input type="submit" name="user" value="Spara">
		
	</form>

<?php
} else {

	$id = 0;
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$username = $_POST['username'];
	$pswd = $_POST['pswd'];
	$email = $_POST['email'];
	

	$sign_up_sql = 'INSERT INTO user (id, fname, lname, username, pswd, email) VALUES (?, ?, ?, ?, ?, ?)';
	$stmt = $mysqli->stmt_init();

	if( $stmt->prepare($sign_up_sql) ) {

		$stmt->bind_param('isssss', $id, $fname, $lname, $username, $pswd, $email);
		$stmt->execute();
		$stmt->close();

		echo 'Grattis, du är nu registrerad!!!!';
	} else {
		echo "Registreringen misslyckades, försök igen";
	}
	$mysqli->close();
}


?>