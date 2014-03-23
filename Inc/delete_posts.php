<?php 

include 'session.php';
include 'connect.php';

$postid = $_GET['postid'];

$sql = "DELETE FROM posts WHERE id = ?";

if( $stmt = $mysqli->prepare($sql) ) {
	$stmt->bind_param('i', $postid);
	$stmt->execute();

  $sql = "DELETE FROM comments WHERE postid = ?";
  if( $stmt = $mysqli->prepare($sql) ) {
    $stmt->bind_param('i', $postid);
    $stmt->execute();
  }

	
	$_SESSION['message'] = 'Inlägget raderat';
	header('Location: ../index.php');
	$stmt -> close();
}

?>