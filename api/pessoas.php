<?php
header('Content-Type: application/json');

$host = 'mysql';
$db   = 'teste_fullstack';
$user = 'user';
$pass = 'userpass';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['erro' => 'Falha ao conectar ao banco: ' . $e->getMessage()]);
    exit;
}

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        $stmt = $pdo->query("SELECT * FROM pessoas ORDER BY id DESC");
        echo json_encode($stmt->fetchAll());
        break;

    case 'POST':
        $nome = $input['nome'] ?? '';
        $cpf = $input['cpf'] ?? '';
        $idade = $input['idade'] ?? 0;

        if (!$nome || !$cpf || !$idade) {
            http_response_code(400);
            echo json_encode(['erro' => 'Dados incompletos']);
            exit;
        }

        $stmt = $pdo->prepare("INSERT INTO pessoas (nome, cpf, idade) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $cpf, $idade]);
        echo json_encode(['sucesso' => true, 'id' => $pdo->lastInsertId()]);
        break;

    case 'PUT':
        $id = $input['id'] ?? 0;
        $nome = $input['nome'] ?? '';
        $cpf = $input['cpf'] ?? '';
        $idade = $input['idade'] ?? 0;

        if (!$id || !$nome || !$cpf || !$idade) {
            http_response_code(400);
            echo json_encode(['erro' => 'Dados incompletos']);
            exit;
        }

        $stmt = $pdo->prepare("UPDATE pessoas SET nome=?, cpf=?, idade=? WHERE id=?");
        $stmt->execute([$nome, $cpf, $idade, $id]);
        echo json_encode(['sucesso' => true]);
        break;

    case 'DELETE':
        $id = $input['id'] ?? 0;

        if (!$id) {
            http_response_code(400);
            echo json_encode(['erro' => 'ID � necess�rio']);
            exit;
        }

        $stmt = $pdo->prepare("DELETE FROM pessoas WHERE id=?");
        $stmt->execute([$id]);
        echo json_encode(['sucesso' => true]);
        break;

    default:
        http_response_code(405);
        echo json_encode(['erro' => 'M�todo n�o permitido']);
        break;
}
