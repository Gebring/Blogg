<?php

define('BLOG_ROOT', getcwd());

include BLOG_ROOT . '/connect.php';

if($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
    exit();
} else {
	$query = "SELECT * FROM posts WHERE id = ?";
	$stmt = $mysqli->stmt_init();
	if($stmt->prepare($query)) {
		$stmt->bind_param('i', $_GET["postid"]);
		$result = $stmt->execute();
		$stmt->bind_result($id, $title, $content, $cat_id, $date, $userid);
		$stmt->store_result();
		// echo $stmt->num_rows . "<br>"; // Visar hur många kommentarer som finns totalt.
		while(mysqli_stmt_fetch($stmt)) {
			?>
			<form action="update.php?postid=<?php echo $_GET['postid']; ?>" method="post">
				<!--<input type="hidden" name="postid" value="<?php echo $id;?>" />-->
				<input type="text" name="title" value="<?php echo $title; ?>" />
				<textarea name="content"></textarea>
				<input type="submit" name="update" value="Spara">
			</form>
			<?php
		}
		?>
		
		<?php
	}
	
}
//$stmt->close();
$mysqli->close();

?>