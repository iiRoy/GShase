<?php
session_start();
include "database.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: ../access.php?error=El nombre de usuario no puede estar vacio.");
        exit();
    } elseif (empty($pass)) {
        header("Location: ../access.php?error=La clave no puede estar vacia.");
        exit();
    } else {
        try {
            $conn = Database::connect();
            $sql = "SELECT * FROM usuario WHERE user_name = :uname AND password = :pass";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':uname', $uname);
            $stmt->bindParam(':pass', $pass);
            $stmt->execute();

            if ($stmt->rowCount() === 1) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($row['user_name'] === $uname && $row['password'] === $pass) {
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['id'] = $row['id'];
                    header("Location: ../upload.php");
                    exit();
                } else {
                    header("Location: ../access.php?error=Datos de acceso incorrectos.");
                    exit();
                }
            } else {
                header("Location: ../access.php?error=Datos de acceso incorrectos.");
                exit();
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        Database::disconnect();
    }
} else {
    header("Location: ../access.php");
    exit();
}
?>