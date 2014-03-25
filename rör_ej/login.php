<?php

if( !isset( $_POST['login'] ) ) { ?>

<div class="login_main">
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
		<input type="text" class="input-std" name="email" placeholder="Email">
		<input type="password" class="input-std" name="password" placeholder="Password">
		<input class="go" type="submit" name="login" id="log-in" value="GO"/>
	</form>
</div>

<?php 
} else {

	$password = $_POST['password'];
	$email = $_POST['email'];

	$login = 'SELECT id, username FROM user WHERE email = ? AND pswd = ?';
	$stmt = $mysqli->stmt_init();

	if( $stmt->prepare($login) ) {

		$stmt->bind_param('ss', $email, $password);
		$stmt->bind_result($id, $username);
		$stmt->execute();
		$stmt->close();
		$_SESSION['id'] = $id;
		$_SESSION['username'] = $username;

		echo 'Du är nu inloggad.';
	} else {
		echo 'inloggningen misslyckades.';
	}
	$mysqli->close();
}
/*	
	id
	fname	
	lname
	username
	pswd
	email
*/
?>
