<!DOCTYPE html>
<html lang="ca">
<head>
  <meta charset="UTF-8">
  <title>Test connexió MySQL</title>
  <style>
    body { font-family: Arial; padding: 30px; background: #f3f3f3; }
    .ok { color: green; }
    .error { color: red; }
  </style>
</head>
<body>
  <h1>🔌 Test connexió a la Base de Dades</h1>

  <?php
  $servername = "db";       // nom del servei del docker-compose
  $username = "user";
  $password = "password";
  $dbname = "demo";

  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "<p class='ok'>✅ Connexió establerta correctament amb la base de dades '$dbname'.</p>";

      // Exemple de consulta simple
      $stmt = $conn->query("SELECT NOW() AS hora_actual");
      $row = $stmt->fetch();
      echo "<p>Hora actual del servidor MySQL: <strong>{$row['hora_actual']}</strong></p>";
  } catch(PDOException $e) {
      echo "<p class='error'>❌ Error de connexió: " . $e->getMessage() . "</p>";
  }
  ?>
</body>
</html>