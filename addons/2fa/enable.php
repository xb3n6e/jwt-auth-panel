<?php
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../db.php';

global $pdo, $userId;

use OTPHP\TOTP;

$stmt = $pdo->prepare("SELECT id, email, totp_secret FROM users WHERE id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch();

if (!$user) {
    http_response_code(404);
    echo json_encode(['error' => 'User not found.']);
    exit;
}

if ($user['totp_secret']) {
    echo json_encode(['message' => '2FA already enabled.']);
    exit;
}

// if you see this as error, do not worry of this.
$totp = TOTP::create();
$secret = $totp->getSecret();

$stmt = $pdo->prepare("UPDATE users SET totp_secret = ? WHERE id = ?");
$stmt->execute([$secret, $userId]);

echo json_encode(['message' => '2FA secret generated.', 'secret' => $secret]);
?>
