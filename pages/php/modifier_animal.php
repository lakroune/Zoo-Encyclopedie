<?php

include "../db_connect.php";
if (!empty($_FILES['image']['name'])) {
    $Url_image = "";
    $Url_image =  time() . basename($_FILES["image"]["name"]);
    try {
        move_uploaded_file($_FILES["image"]["tmp_name"], "../images/" . $Url_image);
    } catch (Exception $e) {
        error_log(date('y-m-d h:i:s') . "  modifier_animal.php :error ." . $e->getMessage() . PHP_EOL, 3, "./../error.log");
        header("Location: ../gestion_des_animaux.php?upload=1");
    }
    if ($_SERVER['REQUEST_METHOD'] === "POST"  && isset($_POST['type-regime'], $_POST['nomAnimal'], $_POST['idHab'], $_POST['Description_animal']) && (trim($_POST['nomAnimal']) != "" && trim($_POST['Description_animal']) != "")) {
        $sql = "update animal set  Url_image  ='" . $Url_image . "', NomAnimal = '" . trim($_POST['nomAnimal']) . "' ,    Type_alimentaire ='" . trim($_POST['type-regime']) . "', IdHab=" .   (int) $_POST['idHab'] . " where IdAnimal=" . (int) $_GET['IdAnimal'] . "";
        try {
            $resultat = $cennect->query($sql);
            if ($resultat) {
                header("Location: ../gestion_des_animaux.php?success=2");
            }
        } catch (Exception $e) {
            error_log(date('y-m-d h:i:s') . "  modifier_animal.php :error ." . $e->getMessage() . PHP_EOL, 3, "./../error.log");
            header("Location: ../gestion_des_animaux.php?error=2");
        }
    } else   header("Location: ../gestion_des_animaux.php?error=1");
} else {
    if ($_SERVER['REQUEST_METHOD'] === "POST"  && isset($_POST['type-regime'], $_POST['nomAnimal'], $_POST['idHab'],$_POST['Description_animal'])&& (trim($_POST['nomAnimal']) != "" && trim($_POST['Description_animal']) != "")) {
        $sql = "update animal set NomAnimal = '" . $_POST['nomAnimal'] . "' ,    Type_alimentaire ='" . $_POST['type-regime'] . "', IdHab=" .   (int) $_POST['idHab'] . " where IdAnimal=" . (int) $_GET['IdAnimal'] . "";
        try {
            $resultat = $cennect->query($sql);
            if ($resultat) {
                header("Location: ../gestion_des_animaux.php?success=2");
            }
        } catch (Exception $e) {
            error_log(date('y-m-d h:i:s') . "  modifier_animal.php :error ." . $e->getMessage() . PHP_EOL, 3, "./../error.log");
            header("Location: ../gestion_des_animaux.php?error=2");
        }
    } else   header("Location: ../gestion_des_animaux.php?error=1");
}
