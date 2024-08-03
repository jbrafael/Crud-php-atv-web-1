<?php
require 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fabricante = $_POST['fabricante'];
    $ano = $_POST['ano'];
    $modelo = $_POST['modelo'];

    $query = "UPDATE carros SET fabricante = :fabricante, ano = :ano, modelo = :modelo WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['fabricante' => $fabricante, 'ano' => $ano, 'modelo' => $modelo, 'id' => $id]);

    header("Location: index-carro.php");
    exit();
} else {
    $query = "SELECT * FROM carros WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id' => $id]);
    $carro = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (!$carro) {
    die("Carro não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Carro</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1>Atualizar Carro</h1>
    <form method="POST">
        <label for="fabricante">Fabricante:</label>
        <input type="text" name="fabricante" id="fabricante" value="<?php echo htmlspecialchars($carro['fabricante']); ?>" required>
        <br>
        <label for="ano">Ano:</label>
        <input type="number" name="ano" id="ano" value="<?php echo htmlspecialchars($carro['ano']); ?>" required>
        <br>
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" id="modelo" value="<?php echo htmlspecialchars($carro['modelo']); ?>" required>
        <br>
        <button type="submit" class="button">Atualizar</button>
    </form>
    <a href="index-carro.php" class="button">Voltar</a>
</body>
</html>