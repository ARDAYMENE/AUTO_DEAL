<?php
  //$amount = $_POST["amount"];
  $user="root";
  $mdp="";
  $db="autodeal";
  $serve="localhost";

    $conn =mysqli_connect($serve, $user, $mdp, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
//$conn = mysqli_connect('localhost','root','','user_db') or die('connection failed');

?>