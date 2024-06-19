<?php
session_start();
if (isset($_SESSION['user_name'])) {
    header("Location: adminPagina.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Creación de Usuarios</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="/scripts/create.js"></script>
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
                <h2>Creación de Usuarios</h2>
            </div>
        </div>
        <form name="registro" action="database/login.php" method="post" onsubmit="validateForm(event)" enctype="multipart/form-data">
            <div class="access_keys">
                <label>Nombre Completo</label>
                <input type="text" name="uname" placeholder="Ingresa tu nombre aquí." required><br>

                <label>Título</label>
                <input type="text" name="titulo" placeholder="Ingresa tu título aquí." required><br>

                <label>Especialidad</label>
                <input type="text" name="especialidad" placeholder="Ingresa tu especialidad aquí." required><br>

                <label>Correo Electrónico</label>
                <input type="email" name="correo" placeholder="Ingresa tu correo electrónico aquí." required><br>

                <label>Institución</label>
                <select id="Instituciones" name="Instituciones" onchange="changeLeague(this.value)" required>
                    <option value="NValid" selected>Seleccionar Institución.</option>
                    <option value="Valid">Instituto Tecnológico y de Estudios Superiores de Monterrey</option>
                    <option value="Valid">Universidad Nacional de Colombia</option>
                    <option value="Valid">Universidad Nacional de Córdoba</option>
                    <option value="Valid">Universidad Cooperativa de Colombia</option>
                </select>
                <div id="institucionError" class="error2"></div><br>

                <label>Crear Contraseña</label>
                <input type="password" name="password" placeholder="Ingresa tu contraseña" required><br>
                <div id="passwordError" class="error2"></div>

                <label>Repite la Contraseña</label>
                <input type="password" name="repeatPassword" placeholder="Repite tu contraseña" required><br>
                <div id="repeatPasswordError" class="error2"></div>

                <label>Sube tu primer documento</label>
                <input type="file" id="documento" name="documento" required><br>

                <div id="generalError" class="error2"></div>

                <button type="submit">Enviar Solicitud</button>
                <a href="access.php">Acceder a tu cuenta</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
