<?php
require 'db.php';

$id = $_GET['id'];

$query = "SELECT * FROM carros WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->execute(['id' => $id]);
$carro = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$carro) {
    die("Carro não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Carro</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1>Detalhes do Carro</h1>
    <p><strong>ID:</strong> <?php echo htmlspecialchars($carro['id']); ?></p>
    <p><strong>Fabricante:</strong> <?php echo htmlspecialchars($carro['fabricante']); ?></p>
    <p><strong>Ano:</strong> <?php echo htmlspecialchars($carro['ano']); ?></p>
    <p><strong>Modelo:</strong> <?php echo htmlspecialchars($carro['modelo']); ?></p>
    <a href="index-carro.php" class="button">Voltar</a>
</body>
</html>