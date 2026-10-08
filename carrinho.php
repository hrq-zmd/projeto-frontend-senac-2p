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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Meu Carrinho | Mercado Senac</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/carrinho.css">
</head>

<body>

    <!-- Header -->
    <header class="senac_header">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="index.html" class="senac_brand">Mercado Senac</a>
            <span>Meu Carrinho</span>
        </div>
    </header>

    <!-- Main content -->
    <main class="container my-5">
        <h1 class="cart_title mb-2">Meu Carrinho</h1>
        <p class="text-secondary mb-4">Confira os produtos selecionados para sua compra.</p>

        <div class="row g-4">

            <!-- Products column -->
            <div class="col-12 col-lg-8">
                <section class="cart_panel">
                    <h2 class="h5 mb-3">Produtos selecionados</h2>

                    <?php if (empty($carrinho)): ?>
                        <p class="text-secondary">Seu carrinho está vazio.</p>

                    <?php else: ?>
                        <?php foreach ($carrinho as $id => $quantidade): ?>
                            <?php if (isset($produtos[$id])): ?>

                                <?php
                                $preco = $produtos[$id]["preco"];
                                $subtotal = $preco * $quantidade;
                                $total += $subtotal;
                                ?>

                                <!-- Product item -->
                                <div class="cart_item">
                                    <div class="row align-items-center g-3">

                                        <!-- Product information -->
                                       <div class="col-12 col-md-6">
                                            <div class="d-flex align-items-center gap-3">
                                                <img
                                                    src="<?= htmlspecialchars($produtos[$id]["imagem"]) ?>"
                                                    alt="<?= htmlspecialchars($produtos[$id]["nome"]) ?>"
                                                    class="cart_product_image"
                                                >

                                                <div>

                                                    <h3 class="h6 product_name">
                                                        <?= htmlspecialchars($produtos[$id]["nome"]) ?>
                                                    </h3>

                                                    <p class="product_price mb-0">
                                                        Preço unitário: R$
                                                        <?= number_format($preco, 2, ",", ".") ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Quantity controls -->
                                        <div class="col-6 col-md-3">
                                            <form
                                                action="atualizar.php"
                                                method="POST"
                                                class="d-flex align-items-center gap-2"
                                            >
                                                <input
                                                    type="hidden"
                                                    name="id"
                                                    value="<?= (int) $id ?>"
                                                >
                                                <button
                                                    type="submit"
                                                    name="acao"
                                                    value="diminuir"
                                                    class="quantity_button"
                                                    aria-label="Diminuir quantidade"
                                                >
                                                    −
                                                </button>

                                                <span class="fw-bold">
                                                    <?= (int) $quantidade ?>
                                                </span>

                                                <button
                                                    type="submit"
                                                    name="acao"
                                                    value="aumentar"
                                                    class="quantity_button"
                                                    aria-label="Aumentar quantidade"
                                                >
                                                    +
                                                </button>

                                            </form>

                                            <form action="atualizar.php" method="POST" class="mt-2">

                                                <input
                                                    type="hidden"
                                                    name="id"
                                                    value="<?= (int) $id ?>"
                                                >
                                                <button
                                                    type="submit"
                                                    name="acao"
                                                    value="remover"
                                                    class="remove_button"
                                                >
                                                    Remover produto
                                                </button>

                                            </form>
                                        </div>

                                        <!-- Product subtotal -->
                                        <div class="col-6 col-md-3 text-md-end">
                                            <span class="product_subtotal">
                                                R$
                                                <?= number_format($subtotal, 2, ",", ".") ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <?php if (!empty($carrinho)): ?>

                        <form action="atualizar.php" method="POST" class="mt-3">

                            <button
                                type="submit"
                                name="acao"
                                value="esvaziar"
                                class="clear_cart_button"
                                onclick="return confirm('Deseja realmente esvaziar o carrinho?')"
                            >
                                Esvaziar carrinho
                            </button>

                        </form>

                    <?php endif; ?>

                    <!-- Continue shopping -->
                    <div class="mt-4">
                        <a href="index.php" class="continue_shopping_link">Continuar comprando</a>

                    </div>
                </section>
            </div>

            <!-- Order summary column -->
            <div class="col-12 col-lg-4">
                <aside class="cart_panel">
                    <h2 class="h5 mb-4">Resumo do pedido</h2>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Subtotal</span>
                        <span>
                            R$
                            <?= number_format($total, 2, ",", ".") ?>
                        </span>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <strong>Total</strong>
                        <span class="cart_total">
                            R$
                            <?= number_format($total, 2, ",", ".") ?>
                        </span>
                    </div>

                    <!-- Checkout button -->
                    <button
                        type="button"
                        class="checkout_button"
                        disabled
                        title="Funcionalidade em desenvolvimento"
                    >
                        Finalizar compra
                    </button>

                    <p class="small text-secondary text-center mt-3 mb-0">
                        Finalização da compra em desenvolvimento.
                    </p>
                </aside>
            </div>
        </div>
    </main>
</body>
</html>
