<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../db.php';

global $jwt_secret, $jwt_algo;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$headers = getallheaders();
if (!isset($headers['Authorization'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Token is missing.']);
    exit;
}

list(, $token) = explode(" ", $headers['Authorization']);

try {
    $decoded = JWT::decode($token, new Key($jwt_secret, $jwt_algo));
    $GLOBALS['userId'] = $decoded->sub;
} catch (Exception $e) {
    http_response_code(401);
    echo json_encode(['error' => 'Invalid token.']);
    exit;
}
?>
