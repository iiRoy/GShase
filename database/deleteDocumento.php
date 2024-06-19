<?php
    require 'database.php';
    $id = 0;
    if (!empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
    if ($id != 0) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM Biblioteca WHERE idDocumento = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
    }
    header("Location: ../adminPagina.php");
?>