<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Contacto - Kalma</title>
<style>
body {
  font-family: Inter, sans-serif;
  background: #fff8f5;
  color: #794023;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
}
form {
  background: white;
  padding: 24px;
  border-radius: 12px;
  box-shadow: 0 6px 16px rgba(121,64,35,.1);
  width: 100%;
  max-width: 420px;
}
input, textarea {
  width: 100%;
  padding: 10px;
  margin: 6px 0;
  border: 1px solid #f0e7e2;
  border-radius: 8px;
  font-size: 1rem;
}
button {
  background: #E46727;
  color: white;
  border: none;
  padding: 10px 16px;
  border-radius: 8px;
  font-weight: bold;
  cursor: pointer;
}
button:hover { background: #BC421D; }
.success {
  background: #F9D7B4;
  padding: 10px;
  border-radius: 8px;
  margin-bottom: 10px;
  color: #794023;
}
</style>
</head>
<body>

<form action="guardar.php" method="POST">
  <h2>💬 Contacto Kalma</h2>
  <input type="text" name="nombre" placeholder="Tu nombre" required>
  <input type="email" name="correo" placeholder="Tu correo" required>
  <textarea name="mensaje" placeholder="Tu mensaje..." required></textarea>
  <button type="submit">Enviar</button>
</form>

</body>
</html>
