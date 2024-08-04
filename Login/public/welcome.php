<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Bienvenido</title>
</head>
<body>
    <div class="container">
        <h2>Bienvenido, ¡<?php echo htmlspecialchars($username); ?>!</h2>
        <p>Has iniciado sesión correctamente.</p>
        <a href="logout.php"><button>Cerrar sesión</button></a>
    </div>
</body>
</html>
