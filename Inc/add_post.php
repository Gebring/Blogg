<?php

echo '<h1>' . $_SESSION['id'] . '</h1>';

if(isset($_SESSION["email"])) {
	if( !isset( $_POST['posts'] ) ) { 
		$stmt = $mysqli->stmt_init();
		$cat_query = "SELECT * FROM categories";
			if ($stmt -> prepare ($cat_query)):
				$stmt -> execute();
				$stmt -> bind_result($category_id, $cat_name);
			
		?> 
		<h1>Gör ett inlägg</h1>

		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
			Kategorie
			<select name="cat_id">
			<?php
				while($stmt -> fetch ()):
				?>
				<option value="<?php echo $category_id; ?>"><?php echo $cat_name; ?>
				</option>
			<?php endwhile; ?>
			</select>
			<?php endif;?>
			Titel:
			<input type="text" name="title">
			Gör inlägg/posts:
			<textarea name="content"></textarea>
			<input type="submit" name="posts" value="Spara">
			
		</form>
	<?php
	} else {

		$title = $_POST['title'];
		$content = $_POST['content'];
		$cat_id = $_POST['cat_id'];
		$user_id = $_SESSION['id'];
		//$id = 0;
		
		$add_posts_sql = 'INSERT INTO posts (title, content, cat_id, user_id) VALUES(?, ?, ?, ?)';

		if( $stmt = $mysqli->prepare($add_posts_sql) ) {

			$stmt->bind_param('ssii', $title, $content, $cat_id, $user_id);
			$stmt->execute();
			$stmt->close();

			echo 'Inlagt';
		} else {
			echo "Felaktig query";
		}
		$mysqli->close();
	}
}

	


?>