<?php
require 'config.php';
$query = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT 1");
$task = $query->fetch(PDO::FETCH_ASSOC);
echo json_encode($task);
?>
