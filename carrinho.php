<?php

session_start();

require_once __DIR__ . "/inc/produtos.php";

$carrinho = $_SESSION["carrinho"] ?? [];

$cart_count = array_sum($carrinho);

$total = 0;

foreach ($carrinho as $id => $quantidade) {
    if (isset($produtos[$id])) {
        $total += $produtos[$id]["preco"] * $quantidade;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Meu Carrinho | Mercado Senac</title>

    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/carrinho.css">
    
    <!-- JavaScript do menu responsivo -->
    <script src="js/header.js" defer></script>
</head>

<body>

    <!-- Shared header -->
    <?php require __DIR__ . "/inc/header.inc.php"; ?>

    <main class="cart_container">

        <div class="cart_heading">
            <h1 class="cart_title">Meu Carrinho</h1>

            <p class="secondary_text">
                Confira os produtos selecionados para sua compra.
            </p>
        </div>

        <div class="cart_layout">

            <!-- Products -->
            <section class="cart_products cart_panel">

                <div class="cart_section_header">
                    <h2>Produtos selecionados</h2>

                    <span class="cart_item_count">
                        <?= $cart_count ?> unidade(s)
                    </span>
                </div>

                <?php if (empty($carrinho)): ?>

                    <p class="secondary_text">
                        Seu carrinho está vazio.
                    </p>

                <?php else: ?>

                    <?php foreach ($carrinho as $id => $quantidade): ?>

                        <?php if (isset($produtos[$id])): ?>

                            <?php
                                $produto = $produtos[$id];
                                $preco = $produto["preco"];
                                $subtotal = $preco * $quantidade;
                            ?>

                            <article class="cart_item">

                                <div class="cart_product_info">

                                    <img
                                        src="<?= htmlspecialchars($produto["imagem"]) ?>"
                                        alt="<?= htmlspecialchars($produto["nome"]) ?>"
                                        class="cart_product_image"
                                    >

                                    <div class="cart_product_details">

                                        <h3 class="product_name">
                                            <?= htmlspecialchars($produto["nome"]) ?>
                                        </h3>

                                        <p class="product_price">
                                            Preço unitário: R$
                                            <?= number_format($preco, 2, ",", ".") ?>
                                        </p>

                                        <form
                                            action="atualizar.php"
                                            method="POST"
                                            class="remove_form"
                                        >
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

                                </div>

                                <div class="cart_product_actions">

                                    <form
                                        action="atualizar.php"
                                        method="POST"
                                        class="quantity_controls"
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

                                        <span class="quantity_value">
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

                                    <strong class="product_subtotal">
                                        R$
                                        <?= number_format($subtotal, 2, ",", ".") ?>
                                    </strong>

                                </div>

                            </article>

                        <?php endif; ?>

                    <?php endforeach; ?>

                <?php endif; ?>

                <div class="cart_footer">

                    <a href="index.php" class="continue_shopping_link">
                        ← Continuar comprando
                    </a>

                    <?php if (!empty($carrinho)): ?>

                        <form action="atualizar.php" method="POST">

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

                </div>

            </section>

            <!-- Order summary -->
            <aside class="cart_summary cart_panel">

                <h2>Resumo do pedido</h2>

                <div class="summary_row">
                    <span>Subtotal</span>

                    <span>
                        R$ <?= number_format($total, 2, ",", ".") ?>
                    </span>
                </div>

                <div class="summary_divider"></div>

                <div class="summary_row summary_total">
                    <strong>Total</strong>

                    <strong class="cart_total">
                        R$ <?= number_format($total, 2, ",", ".") ?>
                    </strong>
                </div>

                <button
                    type="button"
                    class="checkout_button"
                    disabled
                    title="Funcionalidade em desenvolvimento"
                >
                    Finalizar compra
                </button>

                <p class="checkout_note">
                    Finalização da compra em desenvolvimento.
                </p>

            </aside>

        </div>

    </main>

<!-- Footer compartilhado -->
    <?php require __DIR__ . "/inc/footer.inc.php"; ?>
</body>
</html>
