<?php
require "config.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid request.");
}

$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$message = trim($_POST["message"]);

if (empty($name) || empty($email) || empty($message)) {
    die("All fields are required.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format.");
}

$stmt = $pdo->prepare("INSERT INTO messages (name, email, message) VALUES (:name, :email, :message)");
$stmt->execute([
    ":name" => $name,
    ":email" => $email,
    ":message" => $message
]);

echo "<h2>Message Saved Successfully ✅</h2>";
echo "<a href='index.html'>Go Back</a>";
?>
