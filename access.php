<?php
/*
session_start();
if (isset($_SESSION['user_name'])) {
    header("Location: upload.php");
    exit();
}
*/
?>
<!DOCTYPE html>
<html>
<head>
    <title>Acceso Usuarios</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="access">
<!--Header-->
<div class="header">
    <div>
        <a href="inicio.php">
            <img src="images/logo_letra.png">
        </a>
    </div>
</div>
<div class="access_box">
    <div class="box_access">
        <div class="top_section">
            <div class="image_box">
                <img src="images/usuario_default.png" class="user-img-small">
            </div>
            <div>
                <h2>Acceso de Usuarios</h2>
                <?php if(isset($_GET["error"])){?>
                    <p class="error"><?php echo $_GET["error"];?></p>
                <?php }?>
            </div>
        </div>
        <form action="database/login.php" method="post">
            <div class="access_keys">
                <label>Usuario</label>
                <input type="text" name="uname" placeholder="Ingresa tu usuario aquí"><br>
                <label>Clave</label>
                <input type="password" name="password" placeholder="Ingresa tu clave aquí"><br>
                <button type="submit">Acceder</button>
                <a href="create.php">Crear una nueva cuenta</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
