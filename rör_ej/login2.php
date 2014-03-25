<?php 
if(!isset($_SESSION['email'])) { ?>

<div id="login">
	<form action="Inc/checklogin.php" method="post">
		<input type="text" class="input-std" name="email" placeholder="Email">
		<input type="password" class="input-std" name="pswd" placeholder="Password">
		<input type="submit" name="login" id="log-in" value="logga in"/>
	</form>
</div>


<?php
} else { ?>

<h1>Du är inloggad</h1>

<?php echo $_SESSION['email']; ?>

<?php
}

?>