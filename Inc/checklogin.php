<?php session_start();

include'connect.php';

if(!isset($_SESSION["email"]) || $_SESSION["email"] == "") {
	
	if(isset($_POST["login"])) {
		$email = $_POST["email"];
		$pswd = $_POST["pswd"];
	}


	$sql = 'SELECT id, username, email FROM user WHERE email = ? AND pswd = ?';

	if($stmt = $mysqli->prepare($sql)) {
		//$user_id = 1;
		$stmt->bind_param('ss', $email, $pswd); //Alltid WHERE
		$stmt->execute();
		$stmt->bind_result($id, $username, $email); //Alltid SELECT
		$stmt->fetch();

		if( isset($username) ) {
			$_SESSION["logged_in"] = true;
			$_SESSION['email'] = $email;
			$_SESSION['id'] = $id;

			header('Refresh: 1; url=../index.php');
			echo 'inloggad';


		} else {
			echo 'Fel användarnamn eller lösenord!';
		}

		$stmt->close();
	}
	$mysqli->close();
} else {
	echo "Du är redan inloggad.";
}
?>