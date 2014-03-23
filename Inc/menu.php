
<!-- Nav Bar -->
 
<div class="menu">	
  <ul>
   <li><a href="index.php" class="button">HEM</a></li>
   <li><a href="#" class="button">OM</a></li>
   <li><a href="#" class="button">KONTAKT</a></li>
   <li><a href="#" class="button">Kategorier</a>
   		<ul>
   			<li><a href="index.php?cat=1" class="button">Design</a></li>
   			<li><a href="index.php?cat=2" class="button">Webb</a></li>
   			<li><a href="index.php?cat=3" class="button">något annat</a></li>

   		</ul>
   	</li>
   <li><a href="Inc/logout.php" id="lastbtn" class="button">LOG out</a></li>
   <?php
   session_start();
   if(isset($_SESSION["email"])) {
    echo "Du är inloggad";
   } else {
    echo "Du är utloggad";
   }
   ?>
  </ul>
</div>

   
<!-- End Nav -->