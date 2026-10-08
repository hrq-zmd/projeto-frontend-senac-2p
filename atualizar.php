<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: carrinho.php");
    exit;
}

$acao = $_POST["acao"] ?? "";

// Remove todos os produtos
if ($acao === "esvaziar") {
    $_SESSION["carrinho"] = [];

    header("Location: carrinho.php");
    exit;
}

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

// Valida produtos no carrinho
if (!$id || !isset($_SESSION["carrinho"][$id])) {
    header("Location: carrinho.php");
    exit;
}

// Aumentar quantidade
if ($acao === "aumentar") {

    if ($_SESSION["carrinho"][$id] < 99) {
        $_SESSION["carrinho"][$id]++;
    }

// Diminuir quantidade
} elseif ($acao === "diminuir") {

    $_SESSION["carrinho"][$id]--;

    if ($_SESSION["carrinho"][$id] <= 0) {
        unset($_SESSION["carrinho"][$id]);
    }

// Remove um produto específico
} elseif ($acao === "remover") {

    unset($_SESSION["carrinho"][$id]);

}

header("Location: carrinho.php");
exit;

