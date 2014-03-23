
<?php if(isset($_SESSION["email"])) { 
 
		
	$sql_art_sum = "SELECT (SELECT count(*) FROM posts WHERE user_id = ?) AS commentCount, 
					(SELECT count(*) FROM comments),
					(SELECT count(*)/commentCount FROM comments)";


		if($stmt = $mysqli->prepare($sql_art_sum)) {
			$stmt->bind_param('i', $_SESSION['id']); //Alltid WHERE
			$stmt->execute();
			$stmt->bind_result($art_sum, $comment_sum, $comment_median); //Alltid SELECT
			$stmt->fetch();
			$stmt->close();

		}

?>

	<section class="login">	
		<div id="logged-in-pos">
			<p class="logged-in">Inloggad som</p><a id="logout-link" href="logout.php">&#x2717</a>
			<h1><?php echo $_SESSION["email"]; ?></h1>
			<p class="logged-in">Antal inlägg</p>
			<p><?php echo $art_sum; ?></p>
			<p class="logged-in">Antal kommentarer</p>
			<p><?php echo $comment_sum; ?> (Totalt)</p>
			<p class="logged-in">Kommentars snitt</p>
			<p><?php echo $comment_median; ?></p>
			<span class="clearfix"></span>
			
			<button class="post-button bigger" id="write-article">Nytt inlägg</button>
		</div>	
	</section>

<?php } ?>

