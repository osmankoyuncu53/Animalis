<?php 

try
{
    $db=new PDO("mysql:host=localhost;dbname=animaliss","root","");
}
catch(PDOException $e)
{
    echo $e -> getMessage();
}

?>