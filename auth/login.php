<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../db.php';

global $pdo, $jwt_secret, $jwt_algo;

use Firebase\JWT\JWT;

$data = json_decode(file_get_contents('php://input'), true);
if (!isset($data['email'], $data['password'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing fields.']);
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$data['email']]);
$user = $stmt->fetch();

if (!$user || !password_verify($data['password'], $user['password'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Incorrect login details.']);
    exit;
}

$payload = [
    'sub' => $user['id'],
    'email' => $user['email'],
    'exp' => time() + 3600
];

$jwt = JWT::encode($payload, $jwt_secret, $jwt_algo);
echo json_encode(['token' => $jwt]);
?>
