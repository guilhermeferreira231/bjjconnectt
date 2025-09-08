<?php
require_once '../config/db.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_id = $_POST['usuario_id'];
    $stmt = $pdo->prepare("SELECT nome, email, cpf FROM usuarios WHERE id = ?");
    $stmt->execute([$usuario_id]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($dados);
    exit;
}
echo json_encode(['error' => 'Método não permitido']);
exit;