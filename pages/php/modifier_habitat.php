<?php

include "../db_connect.php";
if (!empty($_FILES['image_habitat']['name'])) {
    $Url_image = "";
    $Url_image =  time() . basename($_FILES["image_habitat"]["name"]);
    try {
        move_uploaded_file($_FILES["image_habitat"]["tmp_name"], "../images/" . $Url_image);
    } catch (Exception $e) {
        error_log(date('y-m-d h:i:s') . "  modifier_habitat.php :error ." . $e->getMessage() . PHP_EOL, 3, "./../error.log");
        header("Location: ../gestion_des_habitats.php?upload=0");
    }
    if ($_SERVER['REQUEST_METHOD'] === "POST"  && isset($_POST['name'], $_POST['description'], $_POST['idHab'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $idHab = $_POST['idHab'];

        $sql = "update Habitat set  Url_image = '$Url_image'  , Description_Hab = '$description' , NomHab  = '$name'  where idHab = $idHab";
        try {
            $resultat = $cennect->query($sql);
            if ($resultat) {
                header("Location: ../gestion_des_habitats.php?successii=1");
            }
        } catch (Exception $e) {
            error_log(date('y-m-d h:i:s') . "  modifier_habitat.php :error ." . $e->getMessage() . PHP_EOL, 3, "./../error.log");
            header("Location: ../gestion_des_habitats.php?error=2");
        }
    } else   header("Location: ../gestion_des_habitats.php?error=1");
} else {
    if ($_SERVER['REQUEST_METHOD'] === "POST"  && isset($_POST['name'], $_POST['description'], $_POST['idHab'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $idHab = $_POST['idHab'];

        $sql = "update habitat set   Description_Hab= '$description' , NomHab ='$name'  where idHab =  $idHab";
        try {
            $resultat = $cennect->query($sql);
            if ($resultat) {
                header("Location: ../gestion_des_habitats.php?successss=1");
            }
        } catch (Exception $e) {
            error_log(date('y-m-d h:i:s') . "  modifier_habitat.php :error ." . $e->getMessage() . PHP_EOL, 3, "./../error.log");
            header("Location: ../gestion_des_habitats.php?error=2");
        }
    } else   header("Location: ../gestion_des_habitats.php?error=1");
}
