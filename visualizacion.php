<!DOCTYPE html>
<html>
<head>
    <title>Visualización de documentos</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <table>
        <tr>
            <td>
                <?php 
                require 'database/database.php';

                if (isset($_GET['id']) && !empty($_GET['id'])) {
                    $idDocumento = $_GET['id'];

                    $pdo = Database::connect();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Query to get author details using idDocumento
                    $sql = "SELECT a.Nombre, a.Apellidos, a.Especializacion, a.nombreInstitucion, b.Titulo, b.idDocumento 
                            FROM Autor a 
                            JOIN Biblioteca b ON a.idAutor = b.idAutor 
                            WHERE b.idDocumento = ?";
                    $stmt = $pdo->prepare($sql); 
                    $stmt->execute([$idDocumento]);
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if (empty($result)) {
                        echo '<div>
                                <div>
                                    <p>No hay información del autor</p>
                                </div>
                            </div>';
                    } else {
                        echo '
                            <div>
                                <table>
                                    <tr>
                                        <td>
                                            <h4>Nombre completo del Autor:</h4>
                                            <div>' . htmlspecialchars($result[0]['Nombre']) . ' ' . htmlspecialchars($result[0]['Apellidos']) . '</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Especializado en:</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>' . htmlspecialchars($result[0]['Especializacion']) . '</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <br>
                                            <h5>Institución que lo avala:</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>' . htmlspecialchars($result[0]['nombreInstitucion']) . '</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <br>
                                            <h5>Artículos del autor:</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <ul>';
                                                foreach ($result as $row) {
                                                    echo '<li>' . htmlspecialchars($row['Titulo']) . '</li>';
                                                }
                                            echo '</ul>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>';
                    }

                    Database::disconnect();
                } else {
                    echo '<div>
                            <div>
                                <p>Documento no especificado.</p>
                            </div>
                          </div>';
                }
                ?>
            </td>
            <td>
                <div>
                    <?php
                    if (!empty($result)) {
                        echo '<embed src="viewpdf.php?id=' . htmlspecialchars($idDocumento) . '" type="application/pdf">';
                    }
                    ?>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>