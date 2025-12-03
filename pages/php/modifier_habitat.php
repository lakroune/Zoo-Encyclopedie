<?php


 


include "../db_connect.php";

$name = $_POST['name'];
$description = $_POST['description'];
$idHab = $_POST['idHab'];


if (!empty($_FILES['image_habitat']['name'])) {
    $Url_image = "";
    $Url_image =  time() . basename($_FILES["image_habitat"]["name"]);
    move_uploaded_file($_FILES["image_habitat"]["tmp_name"], "../images/" . $Url_image);
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $sql = "update Habitat set  Url_image = '$Url_image'  , Description_Hab = '$description' , NomHab  = '$name'  where idHab = $idHab";
        $resultat = $cennect->query($sql);
        if ($resultat) {
            header("Location: ../gestion_des_habitats.php");
        }
    }
} else {
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $sql = "update habitat set   Description_Hab= '$description' , NomHab ='$name'  where idHab =  $idHab";
        $resultat = $cennect->query($sql);
        if ($resultat) {
            header("Location: ../gestion_des_habitats.php");
        }
    }
}
