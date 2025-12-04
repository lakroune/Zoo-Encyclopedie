<?php


try {
    include "../db_connect.php";
    $IdAnimal = $_POST['IdAnimal'];
    $sql = " delete from animal where IdAnimal= " . $IdAnimal;
    $resultat = $cennect->query($sql);
    echo json_encode(['success' => true, 'message' => ' la suppression avec succès.']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Erreur lors de la suppression.']);
}
