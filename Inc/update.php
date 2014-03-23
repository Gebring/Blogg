<?php  

define('BLOG_ROOT', getcwd());

include BLOG_ROOT . '/connect.php';
?>



<?php



if( isset($_POST['update']) ) {

	echo $_GET['postid'];

	//$id = 0;
	$title = $_POST['title'];
	$content = $_POST['content'];
	$postid = $_GET['postid'];

	$sql = "UPDATE posts SET title = ?, content = ? WHERE id = ?";

	if( $stmt = $mysqli->prepare($sql) ) {
		$stmt->bind_param('ssi', $title, $content, $postid);
		$stmt->execute();

		$stmt -> close();
		echo 'Inlägget uppdaterad.';
	}

}
$mysqli -> close();

?>