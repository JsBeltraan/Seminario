<?php
require_once '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "<script>alert('El nombre de usuario y la contraseña son obligatorios.');</script>";
        exit;
    }

    // Encriptar la contraseña con MD5
    $md5_password = md5($password);

    $sql = "INSERT INTO Users (username, password) VALUES (:username, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $md5_password, PDO::PARAM_STR);

    try {
        if ($stmt->execute()) {
            echo "<script>alert('Registro exitoso.'); window.location.href='login.php';</script>";
        } else {
            $errorInfo = $stmt->errorInfo();
            echo "<script>alert('Algo salió mal. Error: " . htmlspecialchars($errorInfo[2]) . "');</script>";
        }
    } catch (PDOException $e) {
        echo "<script>alert('Error al registrar el usuario: " . htmlspecialchars($e->getMessage()) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Registro</title>
</head>
<body>
    <div class="container">
        <h2>Registrarse</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Nombre de usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Registrarse</button>
        </form>
        <p>Ya cuentas con un usuario, <a href="login.php">inicia sesión</a>.</p>
    </div>
</body>
</html>
