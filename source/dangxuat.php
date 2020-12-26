<?php
session_start(); 
session_destroy();
setcookie( "name", "", time()- 60, "/","", 0);
setcookie( "hoten", "", time()- 60, "/","", 0);
setcookie( "email", "", time()- 60, "/","", 0);
header('Location: lienhe.php');

?>