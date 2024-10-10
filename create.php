<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $produto = $_POST['produto']; 
    $quantidade = $_POST['quantidade']; 
    $preco = $_POST['preco']; 

    
    $stmt = $pdo->prepare("INSERT INTO produtos (produto, quantidade, preco) VALUES (?, ?, ?)");
    $stmt->execute([$produto, $quantidade, $preco]);

   
    header('Location: index.php');
    exit(); 
}
?>
