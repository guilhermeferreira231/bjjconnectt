<?php
<?php
require_once '../config/db.php';
require_once '../utils/auth.php';

header('Content-Type: application/json');
requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $local = $_POST['local'];
    $data = $_POST['data'];
    $premiacao = $_POST['premiacao'];
    $descricao = $_POST['descricao'];
    $imagem = $_POST['imagem'];
    $colaborador_id = $_SESSION['usuario_id'];

    $stmt = $pdo->prepare("INSERT INTO campeonatos (nome, local, data, premiacao, descricao, imagem, colaborador_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$nome, $local, $data, $premiacao, $descricao, $imagem, $colaborador_id]);
    echo json_encode(['status' => 'success']);
}