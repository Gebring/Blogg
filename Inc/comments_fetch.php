<?php

define('BLOG_ROOT', getcwd());

include BLOG_ROOT . '/connect.php';

if($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
    exit();
} else {
	$query = "SELECT * FROM comments WHERE post_id = ?";
	$stmt = $mysqli->stmt_init();
	if($stmt->prepare($query)) {
		$stmt->bind_param('i', $_POST["id"]);
		$result = $stmt->execute();
		$stmt->bind_result($id, $comtext, $post_id, $username);
		$stmt->store_result();
		// echo $stmt->num_rows . "<br>"; // Visar hur många kommentarer som finns totalt.
		while(mysqli_stmt_fetch($stmt)) {
			echo "<b>". $id ."</b>" . ": " . $comtext .  "<hr>"; 
		}
		?>
		
		<?php
	}
	$stmt->close();
}
$mysqli->close();

?>