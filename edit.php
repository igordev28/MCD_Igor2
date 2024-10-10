<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
$stmt->execute([$id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];

    $stmt = $pdo->prepare("UPDATE produtos SET nome = ?, quantidade = ?, preco = ? WHERE id = ?");
    $stmt->execute([$nome, $quantidade, $preco, $id]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
</head>
<body>
    <h1>Editar Produto</h1>
    <form action="" method="POST">
        <input type="text" name="nome" value="<?= $usuario['nome'] ?>" required>
        <input type="number" name="number" value="<?= $usuario['quantidade'] ?>" required>
        <input type="text" name="text" value="<?= $usuario['preco'] ?>" required>
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
