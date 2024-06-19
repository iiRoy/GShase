<?php
require 'database.php'; // Ensure database connection details are included

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT Documento FROM Biblioteca WHERE idDocumento = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $pdf = $stmt->fetchColumn();

    header('Content-type: application/pdf');
    echo $pdf;

    Database::disconnect();
} else {
    echo 'No se encontró el PDF';
}
?>
