<?php

if(!isset($_SESSION['email'])) { ?>

<div class="login_main">
	<form action="Inc/checklogin.php" method="post">
		<input type="text" class="input-std" name="email" placeholder="Email">
		<input type="password" class="input-std" name="pswd" placeholder="Password">
		<input class="go" type="submit" name="login" id="log-in" value="GO"/>
	</form>
</div>

<?php 
} else { ?>

<!--<h1>FELFELFELFELFELFELFELFELFELFEL</h1>-->

<?php echo $_SESSION['email']; 
		include 'inc/add_post.php';
?>


<?php
}

?>
