<!DOCTYPE html>
<html>
<head>
    <title>Búsqueda de documentos</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <table>
        <tr>
            <td>
                <table>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td><div></div></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td><p>Filtros y Etiquetas</p></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td>
                            <form method="GET" action="">
                                <table>
                                    <tr>
                                        <td>
                                            <label for="autor">Autor:</label><br>
                                            <input type="text" id="autor" name="autor">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><br></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="publishYear">Año de publicación:</label><br>
                                            <input type="number" min="1900" max="2024" id="publishYear" name="publishYear">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><br></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="timeFilter">Antes de</label>
                                            <input type="radio" name="timeFilter" value="before">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="timeFilter">Durante</label>
                                            <input type="radio" name="timeFilter" value="during">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="timeFilter">Después de</label>
                                            <input type="radio" name="timeFilter" value="after">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><br></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="exclude">Excluir:</label><br>
                                            <input type="text" id="exclude" name="exclude">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><br></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button type="submit" class="button">Aplicar filtros</button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <table>
                    <tr>
                        <td>
                            <h2>Búsqueda de Artículos:</h2>
                        </td>
                        <td class="header">
                            <img src="images/usuario_default.png">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form method="GET" action="">
                                <input type="text" id="search" name="search">
                                <button type="submit" class="button">Buscar</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <?php
                                require 'database/database.php';
                                $pdo = Database::connect();
                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                $sql = "SELECT a.Nombre, a.Apellidos, a.Especializacion, b.Titulo FROM Autor a JOIN Biblioteca b ON a.idAutor = b.idAutor";
                                $conditions = [];
                                $params = [];

                                if (isset($_GET['search']) && !empty($_GET['search'])) {
                                    $conditions[] = "b.Titulo LIKE ?";
                                    $params[] = '%' . $_GET['search'] . '%';
                                }

                                if (isset($_GET['autor']) && !empty($_GET['autor'])) {
                                    $conditions[] = "CONCAT(a.Nombre, ' ', a.Apellidos) LIKE ?";
                                    $params[] = '%' . $_GET['autor'] . '%';
                                }

                                if (isset($_GET['publishYear']) && !empty($_GET['publishYear']) && isset($_GET['timeFilter'])) {
                                    switch ($_GET['timeFilter']) {
                                        case 'before':
                                            $conditions[] = "b.anioPublicacion < ?";
                                            $params[] = $_GET['publishYear'];
                                            break;
                                        case 'during':
                                            $conditions[] = "b.anioPublicacion = ?";
                                            $params[] = $_GET['publishYear'];
                                            break;
                                        case 'after':
                                            $conditions[] = "b.anioPublicacion > ?";
                                            $params[] = $_GET['publishYear'];
                                            break;
                                    }
                                }

                                if (isset($_GET['exclude']) && !empty($_GET['exclude'])) {
                                    $conditions[] = "b.Titulo NOT LIKE ?";
                                    $params[] = '%' . $_GET['exclude'] . '%';
                                }

                                if (!empty($conditions)) {
                                    $sql .= ' WHERE ' . implode(' AND ', $conditions);
                                }

                                $stmt = $pdo->prepare($sql);
                                $stmt->execute($params);
                                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                if (empty($result)) {
                                    echo '<div>
                                            <div>
                                                <h2>No hay documentos relacionados.</h2>
                                            </div>
                                          </div>';
                                } else {
                                    foreach ($result as $row) {
                                        echo '<div>
                                                <div>
                                                    <table>
                                                        <tr>
                                                            <td class="header">
                                                                <img src="images/usuario_default.png" alt="Imagen usuario"><br>
                                                            </td>
                                                            <td>
                                                                <div>' . htmlspecialchars($row['Titulo']) . '</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <div>' . htmlspecialchars($row['Nombre']) . ' ' . htmlspecialchars($row['Apellidos']) . ' ' . htmlspecialchars($row['Especializacion']) . '</div>
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
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>