<?php

include "../db_connect.php";

$Url_image = "";
if (!empty($_FILES['image_habitat']['name'])) {
    $Url_image =  time() . basename($_FILES['image_habitat']["name"]);
    move_uploaded_file($_FILES['image_habitat']["tmp_name"], "../images/" . $Url_image);
}

$name = $_POST['name'];
$description = $_POST['description'];
$sql = "insert into habitat (NomHab, Description_Hab,Url_image) values ('$name', '$description','$Url_image')";
$resultat = $cennect->query($sql);

if ($resultat) {
    echo "Habitat ajouté avec succès";
} else {
    echo "Erreur ";
}

header("Location: ../gestion_des_habitats.php");


 
