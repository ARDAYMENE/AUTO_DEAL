<?php
$user="root";
$mdp="";
$db="autodeal";
$serve="localhost";
$password = "password";

$link =mysqli_connect($serve,$user,$mdp,$db);
if(!$link)
{
 
die(mysqli_connect_error());
}

?>
