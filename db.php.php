<?php
// db.php
$DB_HOST = 'localhost';
$DB_NAME = 'singh_engineering';
$DB_USER = 'db_user';
$DB_PASS = 'db_pass';

try {
  $pdo = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4", $DB_USER, $DB_PASS, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  ]);
} catch (Exception $e) {
  http_response_code(500);
  echo "Database connection error.";
  error_log("DB connect error: ".$e->getMessage());
  exit;
}
