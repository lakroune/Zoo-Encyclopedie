<?php


include "../db_connect.php";
if ($_SERVER['REQUEST_METHOD'] === "POST"  && isset($_POST['type-regime'], $_POST['Description_animal'], $_POST['nomAnimal'], $_POST['idHab']) && (trim($_POST['nomAnimal']) != "" && trim($_POST['Description_animal']) != "")) {

    $Url_image = "";
    $isUpload = true;
    if (!empty($_FILES['image']['name'])) {
        $Url_image =  time() . basename($_FILES["image"]["name"]);
        try {
            move_uploaded_file($_FILES["image"]["tmp_name"], "../images/" . $Url_image);
        } catch (Exception $e) {
            $isUpload = false;
            error_log(date('y-m-d h:i:s') . "  ajouter_animal.php :error ." . $e->getMessage() . PHP_EOL, 3, "../error.log");
            header("Location: ../gestion_des_animaux.php?upload=1");
        }
    } else  header("Location: ../gestion_des_animaux.php?upload=2");

    if ($isUpload) {
        $sql = " insert into  Animal (Description_animal,NomAnimal, Type_alimentaire, Url_image, IdHab) value ('" . trim($_POST['Description_animal']) . "','" . trim($_POST['nomAnimal']) . "' ,'" . trim($_POST['type-regime']) . "','" . $Url_image . "'," . trim($_POST['idHab']) . ")";

        try {
            $resultat = $cennect->query($sql);
            header("Location: ../gestion_des_animaux.php?success=1");
        } catch (Exception $e) {
            error_log(date('y-m-d h:i:s') . "  ajouter_animal.php :error ." . $e->getMessage() . PHP_EOL, 3, "../error.log");
            header("Location: ../gestion_des_animaux.php?error=1");
        }
    }
} else  header("Location: ../gestion_des_animaux.php?error=2");
