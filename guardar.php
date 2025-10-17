<?php
include("conexion_pg.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $tipo = $_POST["tipo"] ?? "contacto";
    $nombre = $_POST["nombre"] ?? "Suscriptor";
    $correo = $_POST["correo"] ?? "";
    $mensaje = $_POST["mensaje"] ?? ($tipo === "suscripcion" ? "Suscripción al boletín" : "");

    try {
        $stmt = $conn->prepare("INSERT INTO mensajes (nombre, correo, mensaje) VALUES (:nombre, :correo, :mensaje)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':mensaje', $mensaje);
        $stmt->execute();

        echo "<h2 style='text-align:center;color:green;margin-top:60px;'>✅ Datos guardados correctamente</h2>";
        echo "<p style='text-align:center;'><a href='index.html' style='color:#E46727;'>⬅ Volver al sitio</a></p>";
    } catch (PDOException $e) {
        echo "<h3 style='color:red;text-align:center;'>❌ Error al guardar: " . $e->getMessage() . "</h3>";
    }
}
?>

