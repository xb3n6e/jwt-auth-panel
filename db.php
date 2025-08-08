<?php
// db.php
$host = 'localhost'; // Your DB Host address
$db   = 'jwt_auth'; // Your DB name
$user = 'root'; // Your DB Host username
$pass = ''; // Your DB Host password (if u use xampp too, leave it blank.)
$charset = 'utf8mb4'; // Do not change if u dont know what u do

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Adatbázis kapcsolódási hiba: ' . $e->getMessage()]);
    exit;
}
