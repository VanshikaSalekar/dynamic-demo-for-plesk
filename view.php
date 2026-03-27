<?php
require "config.php";

$stmt = $pdo->query("SELECT * FROM messages ORDER BY created_at DESC");
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Messages</title>
  <style>
    body { font-family: Arial; max-width: 700px; margin: 50px auto; }
    .msg { border: 1px solid #ccc; padding: 10px; margin-bottom: 15px; }
    small { color: gray; }
  </style>
</head>
<body>

<h2>Saved Messages</h2>
<a href="index.html">Back to Form</a>
<hr>

<?php foreach ($messages as $msg): ?>
  <div class="msg">
    <h3><?= htmlspecialchars($msg["name"]) ?></h3>
    <p><b>Email:</b> <?= htmlspecialchars($msg["email"]) ?></p>
    <p><?= nl2br(htmlspecialchars($msg["message"])) ?></p>
    <small>Submitted at: <?= $msg["created_at"] ?></small>
  </div>
<?php endforeach; ?>

</body>
</html>
