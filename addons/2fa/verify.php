<?php
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../db.php';

global $pdo, $userId;

use OTPHP\TOTP;

$data = json_decode(file_get_contents('php://input'), true);
if (!isset($data['code'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing code.']);
    exit;
}

$stmt = $pdo->prepare("SELECT totp_secret FROM users WHERE id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch();

if (!$user || !$user['totp_secret']) {
    http_response_code(400);
    echo json_encode(['error' => '2FA not set up.']);
    exit;
}

// if you see this as error, do not worry of this.
$totp = TOTP::create($user['totp_secret']);

if ($totp->verify($data['code'])) {
    echo json_encode(['message' => '2FA verification successful.']);
} else {
    http_response_code(401);
    echo json_encode(['error' => 'Invalid code.']);
}
?>