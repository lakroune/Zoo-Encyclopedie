<?php

include "../db_connect.php";
if ($_SERVER['REQUEST_METHOD'] === "POST"  && isset($_POST['idHab'])) {
    $idHab = $_POST['idHab'];

    try {
        $sql = " delete from  animal where idHab=  $idHab ";
        $resultat = $cennect->query($sql);
        $sql = " delete from  habitat where idHab=  $idHab";
        $resultat = $cennect->query($sql);
        echo json_encode(['success' => true, 'message' => ' la suppression avec succès.']);
    } catch (Exception $e) {
        error_log(date('y-m-d h:i:s') . "  supprimer_habitat.php :error ." . $e->getMessage() . PHP_EOL, 3, "./../error.log");
        echo json_encode(['success' => false, 'message' => 'Erreur lors de la suppression.']);
    }
} else  echo json_encode(['success' => false, 'message' => 'ID ??.']);
