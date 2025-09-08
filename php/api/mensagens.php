<?php
<?php
require_once '../config/db.php';
require_once '../utils/auth.php';

header('Content-Type: application/json');
requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inscricao_id = $_POST['inscricao_id'];
    $mensagem = $_POST['mensagem'];

    $stmt = $pdo->prepare("INSERT INTO mensagens (inscricao_id, mensagem) VALUES (?, ?)");
    $stmt->execute([$inscricao_id, $mensagem]);
    echo json_encode(['status' => 'success']);
}