<?php
require_once '../includes/db.php';

$sql = "SELECT id, username, password FROM Users";
$stmt = $conn->prepare($sql);

try {
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
    print_r($result);
    echo "</pre>";
} catch (PDOException $e) {
    echo "Error en la consulta: " . htmlspecialchars($e->getMessage());
}
?>
