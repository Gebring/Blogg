<?php 
define("DB_HOST","localhost");
define("DB_USER", "root"); //Användarnamnet för att logga in. Körs det via xammp så skrivs "root"
define("DB_PASS", ""); //Databas lösenordet, lämnas blank ifall du inte har något
define("DB_NAME", "blogg"); //Databas namnet som skapas via PHPMYADMIN

//Upprätta databasanslutning
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//Teckenkodning
$mysqli -> set_charset("utf8"); 

//Kolla att anslutning lyckades
if ($mysqli->connect_errno) {
	echo "Failed to connect" . $mysqli->connect_error . " " . $mysqli-> connect_errno;
	exit(); //avslutar
} else {
	//echo "MEGABAJS";
}

$stmt = $mysqli->stmt_init();

/*
1. Anslut till databasen med mysqli
2. initiera ett statement
3. Förbered query (prepere query)
4. Bind paramterar
5. Exekvera
6. Bind resultat
7. hämta resultat
8. Stäng statement
9. Stäng databasanslutning
 */



?>

