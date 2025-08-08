<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../db.php';

global $pdo;

$userId = $GLOBALS['userId'];

$stmt = $pdo->prepare("SELECT id, email, totp_secret FROM users WHERE id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch();

echo json_encode(['user' => $user]);
?>
