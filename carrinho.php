<?php

session_start();

require_once __DIR__ . "/inc/produtos.php";

$carrinho = $_SESSION["carrinho"] ?? [];
$total = 0;

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
        <?php
    $preco = $produtos[$id]["preco"];

    $subtotal = $preco * $quantidade;

    $total += $subtotal;
?>

        <div>
            <h3>
                <?= htmlspecialchars($produtos[$id]["nome"]) ?>
            </h3>

            <p>
                Preço: R$
                <?= number_format($produtos[$id]["preco"], 2, ",", ".") ?>
            </p>

            <p>Quantidade: <?= $quantidade ?></p>

            <form action="atualizar.php" method="POST">

                <input type="hidden" name="id" value="<?= $id ?>">

                <button type="submit" name="acao" value="diminuir">
                    −
                </button>

                <button type="submit" name="acao" value="aumentar">
                    +
                </button>

            </form>
        </div>

        <hr>

    <?php endif; ?>

<?php endforeach; ?>

<a href="index.html">Continuar comprando</a>

</body>
</html>