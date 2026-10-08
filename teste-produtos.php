<?php

require_once "inc/produtos.php";

echo "<h1>Teste do catálogo</h1>";

foreach ($produtos as $id => $produto) {

    echo "ID: " . $id . "<br>";

    echo "Produto: " . $produto["nome"] . "<br>";

    echo "Preço: R$ " .
        number_format($produto["preco"], 2, ",", ".") .
        "<br><br>";
}