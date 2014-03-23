<?php

if(isset($_POST["submit_comment"])) {
	echo "Lägg in kommentar i databasen";
	$id = 0;
	$comtext = $_POST['comtext'];
	$post_id = $_POST["postid"];
	$username = 0;

	$add_comments_sql = 'INSERT INTO comments (id, comtext, post_id, username) VALUES (?, ?, ?, ?)';
	$stmt = $mysqli->stmt_init();

	if( $stmt->prepare($add_comments_sql) ) {

		$stmt->bind_param('isis', $id, $comtext, $post_id, $username);
		$stmt->execute();
		$stmt->close();

		echo 'Kommentar inlagd';
	}
}
?>