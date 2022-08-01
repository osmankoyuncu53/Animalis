<?php 
session_start();
session_destroy();
unset($_SESSION["Sponsor"]);

header("refresh: 1; url=index.php");


?>