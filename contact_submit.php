<?php
// contact_submit.php
require 'db.php';

function clean($v){ return trim(htmlspecialchars($v)); }

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  echo "Only POST allowed";
  exit;
}

// map expected fields (match contact.html names)
$product = isset($_POST['product-service']) ? clean($_POST['product-service']) : (isset($_POST['product'])?clean($_POST['product']):'');
$name = isset($_POST['your-name']) ? clean($_POST['your-name']) : (isset($_POST['name'])?clean($_POST['name']):'');
$email = isset($_POST['your-email']) ? clean($_POST['your-email']) : (isset($_POST['email'])?clean($_POST['email']):'');
$mobile = isset($_POST['your-mobile']) ? clean($_POST['your-mobile']) : (isset($_POST['phone'])?clean($_POST['phone']):'');
$message = isset($_POST['enquiry-details']) ? clean($_POST['enquiry-details']) : (isset($_POST['message'])?clean($_POST['message']):'');
$country = isset($_POST['country']) ? clean($_POST['country']) : '';

if (empty($name) || empty($message)) {
  http_response_code(400);
  echo "Name and Message are required.";
  exit;
}

// Insert into DB
$stmt = $pdo->prepare("INSERT INTO enquiries (page, product_service, name, email, mobile, country, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->execute(['contact', $product, $name, $email, $mobile, $country, $message]);

// send email to company (change to real address)
$to = 'info@singhengineers.com';
$subject = "New enquiry from website: $name";
$body = "Name: $name\nEmail: $email\nMobile: $mobile\nCountry: $country\nProduct/Service: $product\n\nMessage:\n$message\n";
$headers = "From: no-reply@yourdomain.com\r\nReply-To: $email\r\n";

// try mail (server must allow)
@mail($to, $subject, $body, $headers);

// redirect back with success (or return JSON for AJAX)
header("Location: contact.html?sent=1");
exit;
