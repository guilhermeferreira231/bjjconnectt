<?php

require_once '../config/db.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_id = $_POST['usuario_id'] ?? null;
    if (!$usuario_id) {
        echo json_encode(['error' => 'ID não informado']);
        exit;
    }
    $stmt = $pdo->prepare("SELECT id, nome, email, telefone, tipo FROM usuarios WHERE id = ? AND tipo = 'colaborador'");
    $stmt->execute([$usuario_id]);
    $colaborador = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($colaborador ?: []);
    exit;
}
echo json_encode(['error' => 'Método não permitido']);
exit;