<?php
// products_api.php
require 'db.php';
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
  // optional ?id= for single
  if (!empty($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id=?");
    $stmt->execute([intval($_GET['id'])]);
    echo json_encode($stmt->fetch());
  } else {
    $stmt = $pdo->query("SELECT * FROM products ORDER BY created_at DESC");
    echo json_encode($stmt->fetchAll());
  }
  exit;
}

$input = json_decode(file_get_contents('php://input'), true) ?? $_POST;

if ($method === 'POST') {
  $name = $input['name'] ?? '';
  $desc = $input['description'] ?? '';
  $img = $input['image_url'] ?? '';
  $cat = $input['category'] ?? '';
  $slug = strtolower(preg_replace('/[^a-z0-9]+/','-',trim($name)));
  $stmt = $pdo->prepare("INSERT INTO products (name, slug, description, image_url, category) VALUES (?,?,?,?,?)");
  $stmt->execute([$name, $slug, $desc, $img, $cat]);
  echo json_encode(['id'=>$pdo->lastInsertId()]);
  exit;
}

if ($method === 'PUT') {
  $id = intval($input['id'] ?? 0);
  $stmt = $pdo->prepare("UPDATE products SET name=?, description=?, image_url=?, category=?, updated_at=NOW() WHERE id=?");
  $stmt->execute([$input['name'],$input['description'],$input['image_url'],$input['category'],$id]);
  echo json_encode(['updated'=>true]);
  exit;
}

if ($method === 'DELETE') {
  parse_str(file_get_contents('php://input'), $d);
  $id = intval($d['id'] ?? 0);
  $stmt = $pdo->prepare("DELETE FROM products WHERE id=?");
  $stmt->execute([$id]);
  echo json_encode(['deleted'=>true]);
  exit;
}

http_response_code(405);
