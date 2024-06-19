<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: access.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administrador</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<!--Header-->
<div class="header">
    <div>
        <a href="inicio.php">
            <img src="images/logo_letra.png">
        </a>
        <div class="buttons">
            <a href="database/logout.php">
                <button>
                    <div class="button-circle"></div>
                    Cerrar Sesión
                </button>
            </a>
        </div>
    </div>
</div>
<div class="scroll-container" id="reservations-container">
    <h1>Documentos Publicados</h1>
    <?php
    require 'database/database.php';
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT a.idAutor, a.Nombre, a.Apellidos, a.Especializacion, a.nombreInstitucion, b.idDocumento, b.Titulo, b.Indole, b.Estado 
            FROM Autor a 
            JOIN Biblioteca b ON a.idAutor = b.idAutor 
            WHERE b.Estado = 'Pendiente'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($result)) {
        echo '<div>
                <div>
                    <p>No hay documentos por procesar.</p>
                </div>
              </div>';
    } else {
        foreach ($result as $row) {
            echo '<div class="item-container">
                    <div class="table-container">
                        <table>
                            <tr>
                                <td><div>' . htmlspecialchars($row['Titulo']) . '</div></td>
                            </tr>
                            <tr>
                                <td><div class="name">' . htmlspecialchars($row['Nombre']) . ' ' . htmlspecialchars($row['Apellidos']) . '</div></td>
                            </tr>
                            <tr>
                                <td><div class="name">' . htmlspecialchars($row['Indole']) . '</div></td>
                            </tr>
                            <tr>
                                <td><div>Estado: ' . htmlspecialchars($row['Estado']) . '</div></td>
                            </tr>
                            <tr>
                                <td>
                                    <form method="GET" action="database/validateDocumento.php">
                                        <input type="hidden" name="id" value="' . htmlspecialchars($row['idDocumento']) . '">
                                        <button type="submit" class="accept">Validación</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <form method="GET" action="database/deleteDocumento.php">
                                        <input type="hidden" name="id" value="' . htmlspecialchars($row['idDocumento']) . '">
                                        <button type="submit" class="delete-btn">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="table-container">
                        <table>
                            <tr>
                                <td><div class="name">' . htmlspecialchars($row['Nombre']) . ' ' . htmlspecialchars($row['Apellidos']) . '</div></td>
                            </tr>
                            <tr>
                                <td><div class="name">' . htmlspecialchars($row['nombreInstitucion']) . '</div></td>
                            </tr>
                            <tr>
                                <td><div class="name">' . htmlspecialchars($row['Titulo']) . '</div></td>
                            </tr>
                            <tr>
                                <td><div class="name">' . htmlspecialchars($row['Especializacion']) . '</div></td>
                            </tr>
                            <tr>
                                <td>
                                    <form method="GET" action="database/deleteAutor.php">
                                        <input type="hidden" name="id" value="' . htmlspecialchars($row['idAutor']) . '">
                                        <button type="submit" class="delete-btn">Eliminar Autor y Documentos</button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                  </div>';
        }
    }

    Database::disconnect();
    ?>
</div>
</body>
</html>