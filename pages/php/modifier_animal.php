<?php

include "../db_connect.php";

// $description = $_POST['description']; 


if (!empty($_FILES['image']['name'])) {
    $Url_image = "";
    $Url_image =  time() . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], "../images/" . $Url_image);
    if ($_SERVER['REQUEST_METHOD'] === "POST"  && isset($_POST['type-regime'], $_POST['nomAnimal'], $_POST['idHab'])) {
        $sql = "update animal set  Url_image  ='" . $Url_image . "', NomAnimal = '" . $_POST['nomAnimal'] . "' ,    Type_alimentaire ='" . $_POST['type-regime'] . "', IdHab=" .   (int) $_POST['idHab'] . " where IdAnimal=" . (int) $_GET['IdAnimal'] . "";
        $resultat = $cennect->query($sql);
        if ($resultat) {
            header("Location: ../gestion_des_animaux.php");
        }
    }
} else {
    if ($_SERVER['REQUEST_METHOD'] === "POST"  && isset($_POST['type-regime'], $_POST['nomAnimal'], $_POST['idHab'])) {
        $sql = "update animal set NomAnimal = '" . $_POST['nomAnimal'] . "' ,    Type_alimentaire ='" . $_POST['type-regime'] . "', IdHab=" .   (int) $_POST['idHab'] . " where IdAnimal=" . (int) $_GET['IdAnimal'] . "";
        $resultat = $cennect->query($sql);
        if ($resultat) {
            header("Location: ../gestion_des_animaux.php");
        }
    }
}
