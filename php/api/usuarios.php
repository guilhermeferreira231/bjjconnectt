<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../config/db.php';
require_once '../utils/auth.php';

header('Content-Type: application/json');

// Inicia a sessão apenas uma vez!
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Cadastro
    if (isset($_POST['cadastro'])) {
        $nome = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $senha = password_hash(trim($_POST['senha']), PASSWORD_DEFAULT);
        $cpf = trim($_POST['cpf']);
        $telefone = trim($_POST['telefone']);
        $tipo = $_POST['tipo'] ?? 'atleta';

        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, cpf, telefone, tipo) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $email, $senha, $cpf, $telefone, $tipo]);
        echo json_encode(['status' => 'success']);
        exit;
    }

    // Login
    if (isset($_POST['login'])) {
        $email = trim($_POST['email']);
        $senha = trim($_POST['senha']);
        $tipo = $_POST['tipo'] ?? 'atleta'; // Adicione esta linha

        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ? AND tipo = ?");
        $stmt->execute([$email, $tipo]);
        $user = $stmt->fetch();

        if ($user && password_verify($senha, $user['senha'])) {
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['tipo'] = $user['tipo'];
            echo json_encode([
                'status' => 'success',
                'usuario_id' => $user['id'],
                'tipo' => $user['tipo'],
                'nome' => $user['nome']
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Credenciais inválidas']);
        }
        exit;
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Método não permitido']);
    exit;
}

$stmt = $pdo->prepare("SELECT nome, email, cpf, telefone FROM usuarios WHERE tipo = 'colaborador'");
$stmt->execute();
$colaboradores = $stmt->fetchAll(PDO::FETCH_ASSOC);