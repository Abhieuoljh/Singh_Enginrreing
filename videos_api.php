<?php
// videos_api.php
require 'db.php';
$stmt = $pdo->query("SELECT id,title,youtube_embed_url,thumb_url FROM videos ORDER BY created_at DESC");
echo json_encode($stmt->fetchAll());
