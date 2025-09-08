<?php
require_once '../config/db.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_id = $_POST['usuario_id'];
    // Busca dados do usuário
    $stmt = $pdo->prepare("SELECT nome, email, cpf FROM usuarios WHERE id = ?");
    $stmt->execute([$usuario_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Busca quantidade de inscrições
    $stmt2 = $pdo->prepare("SELECT COUNT(*) AS total FROM inscricoes WHERE usuario_id = ?");
    $stmt2->execute([$usuario_id]);
    $total = $stmt2->fetchColumn();

    echo json_encode([
        'nome' => $user['nome'] ?? '',
        'email' => $user['email'] ?? '',
        'cpf' => $user['cpf'] ?? '',
        'campeonatos_inscritos' => $total
    ]);
    exit;
}
echo json_encode(['error' => 'Método não permitido']);
exit;