<?php session_start();

include'/Inc/connect.php';



if(!isset($_SESSION["email"])) {

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

		$_SESSION['email'] = $email;
		$_SESSION['id'] = $id;

		//header('Refresh: 1; url=../index.php',false);
		echo 'Du loggas in';


		$stmt->close();
	}
	$mysqli->close();
}
?>