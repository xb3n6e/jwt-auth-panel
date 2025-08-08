<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../db.php';

global $pdo;

$data = json_decode(file_get_contents('php://input'), true);
if (!isset($data['email'], $data['password'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing fields.']);
    exit;
}

$email = $data['email'];
$password = password_hash($data['password'], PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
try {
    $stmt->execute([$email, $password]);
    echo json_encode(['message' => 'Success register.']);
} catch (PDOException $e) {
    http_response_code(409);
    echo json_encode(['error' => 'User has exist.']);
}
?>
