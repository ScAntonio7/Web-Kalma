<?php
$host = "localhost";
$port = "5432";
$dbname = "kalma_bd";
$user = "postgres";
$password = "201206"; // tu contraseña de PostgreSQL

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "<p style='background:#ffdddd;color:#b30000;padding:10px;border:2px solid red;font-weight:bold;'>
          ❌ Error de conexión: " . htmlspecialchars($e->getMessage()) . "</p>";
    $conn = null;
}
?>
