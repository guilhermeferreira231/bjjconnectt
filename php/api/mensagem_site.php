<?php

require_once '../config/db.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $mensagem = trim($_POST['mensagem'] ?? '');

    file_put_contents('log_mensagem.txt', json_encode($_POST) . PHP_EOL, FILE_APPEND);

    if ($nome && $email && $mensagem) {
        $stmt = $pdo->prepare("INSERT INTO mensagens_site (nome, email, mensagem) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $email, $mensagem]);
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Preencha todos os campos']);
    }
    exit;
}

echo json_encode(['error' => 'Método não permitido']);
exit;