<?php 


if($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
} else {
	if(isset($_GET["cat"])) {
		$category = $_GET['cat'];
		$query = "SELECT * FROM posts WHERE cat_id = $category";
	}elseif (isset($_SESSION["email"])&&($_GET["cat"])) {
		$category = $_GET['cat'];
		$query = "SELECT * FROM posts WHERE cat_id = $category ORDER BY date DESC";			
	} else {
		$query = "SELECT * FROM posts ORDER BY date DESC";
	}
	
	$stmt = $mysqli->stmt_init();
	if($stmt->prepare($query)) {
		$result = $stmt->execute();
		$stmt->bind_result($id, $title, $text, $cat_id, $date, $user_id);
		$stmt->store_result();
		//echo $stmt->num_rows . "<br>";
		while(mysqli_stmt_fetch($stmt)) {
			?>

			
			<h1><?php echo $title ?></h1>
			<p><?php echo $date ?></p>
			<p><?php echo $text ?></p>
			<div id='comments-1' style='display:none'></div>

			<a href='Inc/edit_post.php?postid=<?php echo $id ?>'>Redigera</a><br/>
			<a href='Inc/delete_posts.php?postid=<?php echo $id; ?>'>Radera</a>
			<a href='' onclick='getComments(<?php echo $id; ?>);return false;'>Se kommentarer</a><br/>
			<div id='comments-<?php echo $id; ?>' style='display:none'></div>
<h5>Skriv kommentar</h5>
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
			<?php echo "Inläggets id: " . $id; ?>
			<input type="hidden" name="postid" value="<?php echo $id;?>" />
			<textarea name="comtext"></textarea>
			<input type="submit" name="submit_comment" value="Spara">
		</form>
			<hr>

			<?php

		}
	}
}	//$stmt->close();
//$mysqli->close();
?>