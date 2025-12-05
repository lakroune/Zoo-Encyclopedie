<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zoo_db";

$cennect = new mysqli($servername, $username, $password, $dbname);
if ($cennect->connect_error) {
    echo "il y a un erreur";
}



$sql = " select * from  habitat";
$resultat = $cennect->query($sql);
$array_habitat = $resultat->fetch_all();


$sql = " select a.IdAnimal ,a.NomAnimal, a.Type_alimentaire ,h.NomHab,a.Url_image from animal as a join habitat as h where  a.IdHab=h.IdHab";
$resultat = $cennect->query($sql);

$array_animal = $resultat->fetch_all();

?>