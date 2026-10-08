<?php

session_start();

require_once __DIR__ . "/inc/produtos.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

if (!$id || !isset($produtos[$id])) {
    http_response_code(400);
    exit("Produto inválido.");
}

if (!isset($_SESSION["carrinho"])) {
    $_SESSION["carrinho"] = [];
}

if (!isset($_SESSION["carrinho"][$id])) {
    $_SESSION["carrinho"][$id] = 0;
}

if ($_SESSION["carrinho"][$id] < 99) {
    $_SESSION["carrinho"][$id]++;
}

header("Location: carrinho.php");
exit;