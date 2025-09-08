<?php
require_once '../config/db.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = trim($_POST['tipo'] ?? '');
    $ref_id = intval($_POST['ref_id'] ?? 0);
    $nota = intval($_POST['nota'] ?? 0);
    $comentario = trim($_POST['comentario'] ?? '');

    if ($tipo && $nota >= 1 && $nota <= 5) {
        $stmt = $pdo->prepare("INSERT INTO avaliacoes_site (nota, comentario) VALUES (?, ?)");
        $stmt->execute([$nota, $comentario]);
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Dados inválidos']);
    }
    exit;
}

echo json_encode(['error' => 'Método não permitido']);
exit;