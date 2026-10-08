<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: carrinho.php");
    exit;
}

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$acao = $_POST["acao"] ?? "";

if (!$id || !isset($_SESSION["carrinho"][$id])) {
    header("Location: carrinho.php");
    exit;
}

if ($acao === "aumentar") {

    if ($_SESSION["carrinho"][$id] < 99) {
        $_SESSION["carrinho"][$id]++;
    }

} elseif ($acao === "diminuir") {

    $_SESSION["carrinho"][$id]--;

    if ($_SESSION["carrinho"][$id] <= 0) {
        unset($_SESSION["carrinho"][$id]);
    }
}

header("Location: carrinho.php");
exit;
