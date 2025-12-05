<?php
include "../db_connect.php";
if ($_SERVER['REQUEST_METHOD'] === "POST"  && isset($_POST['IdAnimal'])) {
    try {
        $IdAnimal = $_POST['IdAnimal'];
        $sql = " delete from animal where IdAnimal= " . $IdAnimal;
        $resultat = $cennect->query($sql);
        echo json_encode(['success' => true, 'message' => ' la suppression avec succès.']);
    } catch (Exception $e) {
        error_log(date('y-m-d h:i:s') . "  supprimer_animal.php :error ." . $e->getMessage() . PHP_EOL, 3, "./../error.log");
        echo json_encode(['success' => false, 'message' => 'Erreur lors de la suppression.']);
    }
} else  echo json_encode(['success' => false, 'message' => 'ID ??.']);
