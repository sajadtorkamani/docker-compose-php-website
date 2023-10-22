<?php
/** @var PDO $pdo */

require_once '../lib/database.php';

$message = $_POST['message'] ?? '';

$sql = 'INSERT INTO messages (body) VALUES (:body)';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':body', $message);
$stmt->execute();

header('Location: /');
exit();
