
<header class="header">

    <!-- Logo -->
    <div class="logo">
        <a href="index.php">
            <img
                src="img/logo.png"
                alt="Mercado Senac"
            >
        </a>
    </div>

    <!-- Botão Menu Celular-->
    <button
        class="menu-toggle"
        aria-label="Abrir menu"
        aria-expanded="false"
    >
        &#9776;
    </button>

    <!-- Navegação -->
    <nav class="menu">
        <a href="index.php">Início</a>
        <a href="#">Cadastrar</a>
        <a href="index.php#produtos">Produtos</a>
        <a href="#">Sobre</a>
        <a href="#">Contato</a>
        <a href="#">Ajuda</a>
    </nav>

    <!-- Carrinho -->
    <div class="cart">
        <div class="cart_icon_settings">

            <a href="carrinho.php" aria-label="Abrir carrinho de compras">

                <img
                    src="img/white cart.png"
                    alt=""
                >

                <span class="cart_value">
                    <?= (int) $cart_count ?>
                </span>

            </a>

        </div>
    </div>

</header>
