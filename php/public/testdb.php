<?php

require_once '../config/db.php';
$stmt = $pdo->query("SHOW TABLES");
$tables = $stmt->fetchAll();
print_r($tables);