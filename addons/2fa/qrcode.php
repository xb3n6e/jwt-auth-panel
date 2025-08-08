<?php
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../db.php';

global $pdo, $userId;

use OTPHP\TOTP;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

$stmt = $pdo->prepare("SELECT email, totp_secret FROM users WHERE id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch();

if (!$user || !$user['totp_secret']) {
    http_response_code(400);
    echo json_encode(['error' => '2FA not set up.']);
    exit;
}

// if you see this as error, do not worry of this.
$totp = TOTP::create($user['totp_secret']);
$totp->setLabel($user['email']);

$qrCode = QrCode::create($totp->getProvisioningUri());
$writer = new PngWriter();
$result = $writer->write($qrCode);

header('Content-Type: image/png');
echo $result->getString();
?>