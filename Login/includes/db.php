<?php
$serverName = "DESKTOP-0P1B82L\\SQLEXPRESS"; // Cambia esto a tu nombre de servidor
$database = "Escuela";

try {
    // Usando autenticación de Windows
    $conn = new PDO("sqlsrv:server=$serverName;Database=$database;TrustServerCertificate=true;");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexión exitosa"; // Comentado para producción
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
