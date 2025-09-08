<?php
<?php
require_once '../config/db.php';
require_once '../utils/auth.php';

header('Content-Type: application/json');
requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_id = $_SESSION['usuario_id'];
    $campeonato_id = $_POST['campeonato_id'];

    $stmt = $pdo->prepare("INSERT INTO inscricoes (usuario_id, campeonato_id) VALUES (?, ?)");
    $stmt->execute([$usuario_id, $campeonato_id]);
    echo json_encode(['status' => 'success']);
}