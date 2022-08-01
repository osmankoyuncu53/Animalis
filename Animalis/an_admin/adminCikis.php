<?php 
session_start();
session_destroy();
unset($_SESSION["admin"]);

header("refresh: 1; url=index.php");


?>