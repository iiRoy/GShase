<?php
require 'database.php';

$id = 0;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if ($id != 0) {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Delete from Biblioteca
    $sqlBiblioteca = "DELETE FROM Biblioteca WHERE idAutor = ?";
    $qBiblioteca = $pdo->prepare($sqlBiblioteca);
    $qBiblioteca->execute(array($id));

    // Delete from Autor
    $sqlAutor = "DELETE FROM Autor WHERE idAutor = ?";
    $qAutor = $pdo->prepare($sqlAutor);
    $qAutor->execute(array($id));

    Database::disconnect();
}

header("Location: ../adminPagina.php");
?>
