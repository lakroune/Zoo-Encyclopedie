<?php

include "../db_connect.php";
if ($_SERVER['REQUEST_METHOD'] === "POST"  && isset($_POST['name'], $_POST['description'], $_FILES['image_habitat'])) {

    $Url_image = "";
    $isUpload = true;
    if (!empty($_FILES['image_habitat']['name'])) {
        $Url_image =  time() . basename($_FILES['image_habitat']["name"]);
        try {
            move_uploaded_file($_FILES['image_habitat']["tmp_name"], "../images/" . $Url_image);
        } catch (Exception $e) {
            $isUpload = false;
            error_log(date('y-m-d h:i:s') . "  ajouter_habitat.php :error ." . $e->getMessage() . PHP_EOL, 3, "./../error.log");
            header("Location: ../gestion_des_habitats.php?upload=1");
        }
    } else  header("Location: ../gestion_des_habitats.php?upload=2");

    if ($isUpload) {

        $name = $_POST['name'];
        $description = $_POST['description'];
        $sql = "insert into habitat (NomHab, Description_Hab,Url_image) values ('$name', '$description','$Url_image')";
        try {
            $resultat = $cennect->query($sql);
            header("Location: ../gestion_des_habitats.php?success=1");
        } catch (Exception $e) {
            error_log(date('y-m-d h:i:s') . "  ajouter_habitat.php :error ." . $e->getMessage() . PHP_EOL, 3, "./../error.log");
            header("Location: ../gestion_des_habitats.php?error=1");
        }
    }
} else  header("Location: ../gestion_des_habitats.php?error=2");
