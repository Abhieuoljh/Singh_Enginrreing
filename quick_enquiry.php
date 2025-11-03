<?php
// quick_enquiry.php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); exit; }

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$product = trim($_POST['product'] ?? '');
$country = trim($_POST['country'] ?? '');
$message = trim($_POST['message'] ?? '');

if (!$name || !$product) { http_response_code(400); echo "Please provide name and product."; exit; }

$stmt = $pdo->prepare("INSERT INTO enquiries (page, product_service, name, email, mobile, country, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->execute(['quick', $product, $name, $email, '', $country, $message]);

// return JSON if AJAX
if (strpos($_SERVER['HTTP_ACCEPT'] ?? '', 'application/json') !== false) {
  echo json_encode(['status'=>'ok']);
} else {
  header("Location: index.html?enquiry=1");
}
