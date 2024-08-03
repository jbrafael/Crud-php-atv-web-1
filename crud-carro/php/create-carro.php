<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fabricante = $_POST['fabricante'];
    $ano = $_POST['ano'];
    $modelo = $_POST['modelo'];

    $query = "INSERT INTO carros (fabricante, ano, modelo) VALUES (:fabricante, :ano, :modelo)";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['fabricante' => $fabricante, 'ano' => $ano, 'modelo' => $modelo]);

    header("Location: index-carro.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Carro</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1>Criar Carro</h1>
    <form method="POST">
        <label for="fabricante">Fabricante:</label>
        <input type="text" name="fabricante" id="fabricante" required>
        <br>
        <label for="ano">Ano:</label>
        <input type="number" name="ano" id="ano" required>
        <br>
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" id="modelo" required>
        <br>
        <button type="submit" class="button">Salvar</button>
    </form>
    <a href="index-carro.php" class="button">Voltar</a>
</body>
</html>