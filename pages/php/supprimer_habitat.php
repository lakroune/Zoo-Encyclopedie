<?php


try {
    include "../db_connect.php";
    $idHab = $_POST['idHab'];
    $sql = " delete from  animal where idHab=  $idHab ";
    $resultat = $cennect->query($sql);
    $sql = " delete from  habitat where idHab= " . $idHab;
    $resultat = $cennect->query($sql);
    echo json_encode(['success' => true, 'message' => ' la suppression avec succès.']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Erreur lors de la suppression.']);
}
