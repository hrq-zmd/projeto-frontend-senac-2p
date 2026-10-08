<?php

session_start();

require_once __DIR__ . "/inc/produtos.php";

$carrinho = $_SESSION["carrinho"] ?? [];

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Meu Carrinho</title>
</head>
<body>

<h1>Meu Carrinho</h1>

<?php foreach ($carrinho as $id => $quantidade): ?>

    <?php if (isset($produtos[$id])): ?>

        <p>
            Produto:
            <?= htmlspecialchars($produtos[$id]["nome"]) ?>
        </p>

        <p>
            Quantidade:
            <?= (int) $quantidade ?>
        </p>

    <?php endif; ?>

<?php endforeach; ?>

<a href="index.html">Continuar comprando</a>

</body>
</html>