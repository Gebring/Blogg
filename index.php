<?php
define('BLOG_ROOT', getcwd());  // En konstant som definerar sökvägen till mina filer.
//echo BLOG_ROOT . '/inc/connect.php<br>';
//echo BLOG_ROOT . '/inc/sign_up.php';
include BLOG_ROOT . '/inc/connect.php';
include BLOG_ROOT . '/inc/header.php';
include BLOG_ROOT . '/inc/content.php';
//include BLOG_ROOT . '/inc/add_post.php';
include BLOG_ROOT . '/inc/sign_up.php';
include BLOG_ROOT . '/inc/add_comments.php';
include BLOG_ROOT . '/inc/footer.php';
include BLOG_ROOT . '/inc/stats.php';

?>