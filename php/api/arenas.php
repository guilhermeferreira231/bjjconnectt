<?php
require_once '../config/db.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $endereco = trim($_POST['endereco'] ?? '');
    $cidade_estado = trim($_POST['cidade_estado'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $colaborador_id = intval($_POST['colaborador_id'] ?? 0);

    if ($nome && $endereco && $cidade_estado && $descricao && $colaborador_id) {
        $stmt = $pdo->prepare("INSERT INTO arenas (nome, endereco, cidade_estado, descricao, colaborador_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $endereco, $cidade_estado, $descricao, $colaborador_id]);
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Dados incompletos']);
    }
    exit;
}

// Para listar arenas (GET)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $pdo->query("SELECT id, nome, endereco, cidade_estado, descricao FROM arenas ORDER BY id DESC");
    $arenas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($arenas);
    exit;
}

echo json_encode(['error' => 'Método não permitido']);
exit;