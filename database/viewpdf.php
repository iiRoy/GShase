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

    if ($pdf) {
        header('Content-Type: application/pdf');
        echo $pdf;
    } else {
        echo 'No se pudo encontrar el PDF';
    }

    Database::disconnect();
} else {
    echo 'ID de documento inválida.';
}
?>