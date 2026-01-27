<?php
session_start();

function listarCarrinho() {
    if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {
        echo "<li>O carrinho está vazio.</li>";
        return;
    }

    foreach ($_SESSION['carrinho'] as $nome => $item) {
        echo "<li>$nome - {$item['quantidade']} x "
           . number_format($item['preco'], 2)
           . " € = "
           . number_format($item['preco'] * $item['quantidade'], 2)
           . " €</li>";
    }
}

function calcularTotal() {
    $total = 0;
    if (isset($_SESSION['carrinho'])) {
        foreach ($_SESSION['carrinho'] as $item) {
            $total += $item['preco'] * $item['quantidade'];
        }
    }
    return $total;
}

function finalizarCompra() {
    if (isset($_POST['finalizar'])) {
        if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {
            echo "<script>alert('O carrinho está vazio!');</script>";
        } else {
            $_SESSION['carrinho'] = [];
            echo "<script>alert('Compra finalizada com sucesso!');</script>";
        }
    }
}

// Finalizar compra
finalizarCompra();
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
    <a href="Carrinho.php">Carrinho</a>
	<a href="index.php">Início</a>
  </nav>
</header>

<section style="text-align:center;padding:40px;">
  <ul id="listaCarrinho"></ul>
  <p id="totalCarrinho">Total: 0.00 €</p>
  <button onclick="finalizarCompra()">Finalizar Compra</button>
</section>

  <!-- Pagamento -->
  <section class="section" id="pagamento">
    <h2>Pagamento Seguro</h2>
    <p>Escolha o seu método de pagamento preferido. Transações 100% seguras!</p>
    <div class="payment-methods">
      <div class="payment-card">
        <img src="PayPal.JPG" alt="PayPal">
        <h3>PayPal</h3>
        <button onclick="alert('Redirecionando para PayPal...')">Pagar com PayPal</button>
      </div>
      <div class="payment-card">
        <img src="Credito_debito.JPG" alt="Cartão">
        <h3>Cartão de Crédito / Débito</h3>
        <button onclick="alert('Pagamento por cartão em desenvolvimento!')">Pagar com Cartão</button>
      </div>
      <div class="payment-card">
        <img src="MBWAY.JPG" alt="MB Way">
        <h3>MB Way</h3>
        <button onclick="alert('Pagamento MB Way em desenvolvimento!')">Pagar com MB Way</button>
      </div>
    </div>
  </section>

<footer>
  <p>&copy; 2025 GameWorld</p>
</footer>

<footer>
    <p>&copy; 2026 GameWorld</p>
</footer>
</body>
</html>
