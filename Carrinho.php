<?php
session_start();

// Exemplo: adicionar itens ao carrinho
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [
        'Jogo 1' => 29.99,
        'Jogo 2' => 49.90
    ];
}

// Finalizar compra
if (isset($_POST['finalizar'])) {
    if (!empty($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = []; // Limpa carrinho
        $mensagem = "Compra finalizada com sucesso!";
    } else {
        $mensagem = "O carrinho está vazio!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta name="author" content="João Gonçalo Lourenço Teixeira" />
    <meta name="date" content="1 de Julho de 2008" />
    <meta name="contact" content="joao.teixeira.31501@esgc.pt" />
    <meta charset="utf-8">
    <title>Carrinho - GameWorld</title>
    <style>
        /* Aqui entra o teu CSS existente */
        body { font-family: 'Poppins', Arial, sans-serif; background: #000; color: #eee; margin:0; padding:0;}
        header, nav, section, footer { padding:10px; margin:5px; }
        button { padding:8px; border-radius:5px; cursor:pointer; }
    </style>
</head>
<body>
<header>
    <h1>O Meu Carrinho</h1>
    <nav>
        <a href="carrinho.php">Carrinho</a>
    </nav>
</header>

<section style="text-align:center;padding:40px;">
    <ul>
        <?php 
        $total = 0;
        if (!empty($_SESSION['carrinho'])) {
            foreach ($_SESSION['carrinho'] as $nome => $preco) {
                echo "<li>$nome - " . number_format($preco, 2) . " €</li>";
                $total += $preco;
            }
        }
        ?>
    </ul>
    <p>Total: <?php echo number_format($total, 2); ?> €</p>
    <form method="post">
        <button type="submit" name="finalizar">Finalizar Compra</button>
    </form>
    <?php if (isset($mensagem)) echo "<p>$mensagem</p>"; ?>
</section>

<footer>
    <p>&copy; 2026 GameWorld</p>
</footer>
</body>
</html>
