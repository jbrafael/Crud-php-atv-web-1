<?php
require 'db.php';

$query = "SELECT * FROM carros";
$stmt = $pdo->prepare($query);
$stmt->execute();
$carros = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Carros</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1>Lista de Carros</h1>
    <a href="create-carro.php" class="button">Adicionar Carro</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Fabricante</th>
            <th>Ano</th>
            <th>Modelo</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($carros as $carro): ?>
        <tr>
            <td><?php echo htmlspecialchars($carro['id']); ?></td>
            <td><?php echo htmlspecialchars($carro['fabricante']); ?></td>
            <td><?php echo htmlspecialchars($carro['ano']); ?></td>
            <td><?php echo htmlspecialchars($carro['modelo']); ?></td>
            <td>
                <a href="read-carro.php?id=<?php echo $carro['id']; ?>" class="button">Ver</a>
                <a href="update-carro.php?id=<?php echo $carro['id']; ?>" class="button">Editar</a>
                <a href="delete-carro.php?id=<?php echo $carro['id']; ?>" class="button" onclick="return confirm('Tem certeza que deseja deletar este carro?');">Deletar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>