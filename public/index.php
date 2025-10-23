<!DOCTYPE html>
<html lang="ca">
<head>
  <meta charset="UTF-8">
  <title>Test connexió MySQL</title>
  <style>
    body { font-family: Arial, sans-serif; padding: 30px; background: #f3f3f3; }
    h1 { color: #333; }
    .ok { color: green; font-weight: bold; }
    .error { color: red; font-weight: bold; }
    p { font-size: 1.1em; }
  </style>
</head>
<body>
  <h1>Hola Mundo</h1>
  <h1>🔌 Test de connexió a la Base de Dades</h1>

  <?php
  // 🔧 Configuració de connexió (ha de coincidir amb docker-compose.yml)
  $servername = "db";        // Nom del servei MySQL al docker-compose
  $username   = "user";
  $password   = "password";
  $dbname     = "demo";

  try {
      // Crear connexió PDO
      $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      echo "<p class='ok'>✅ Connexió establerta correctament amb la base de dades <strong>$dbname</strong>.</p>";

      // Exemple de consulta
      $stmt = $conn->query("SELECT NOW() AS hora_actual");
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      echo "<p>🕒 Hora actual del servidor MySQL: <strong>{$row['hora_actual']}</strong></p>";

  } catch (PDOException $e) {
      echo "<p class='error'>❌ Error de connexió: " . htmlspecialchars($e->getMessage()) . "</p>";
  }
  ?>
</body>
</html>
