<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compre em nosso supermercado</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <header class="cabecalho">
        <div class="logo">MeuSupermercado</div>
        <button class="menu-toggle" aria-label="Abrir menu">&#9776;</button>
        <nav class="menu">
            <a href="#">Início</a>
            <a href="#">Cadastrar</a>
            <a href="#">Produtos</a>
            <a href="#">Sobre</a>
            <a href="#">Contato</a>
            <a href="#">Ajuda</a>
        </nav>
    </header>
    <script>
        const toggleBtn = document.querySelector('.menu-toggle');
        const menu = document.querySelector('.menu');

        toggleBtn.addEventListener('click', () => {
            menu.classList.toggle('ativo');
        });
    </script>