<?php
require 'config.php';
require 'db.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri) {
    case '/register':
        require 'auth/register.php';
        break;
    case '/login':
        require 'auth/login.php';
        break;
    case '/profile':
        require 'auth/middleware.php';
        require 'auth/profile.php';
        break;
    case '/2fa/enable':
        require 'auth/middleware.php';
        require 'addons/2fa/enable.php';
        break;
    case '/2fa/qrcode':
        require 'auth/middleware.php';
        require 'addons/2fa/qrcode.php';
        break;
    case '/2fa/verify':
        require 'auth/middleware.php';
        require 'addons/2fa/verify.php';
        break;
    default:
        http_response_code(404);
        echo json_encode(['error' => 'Endpoint not found']);
}
?>