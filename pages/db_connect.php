<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zoo_db";

$cennect = new mysqli($servername, $username, $password, $dbname);
if ($cennect->connect_error) {
    echo "il y a un erreur";
}




?>