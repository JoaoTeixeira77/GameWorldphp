<?php
session_start();

// Inicializa carrinho
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Listar carrinho (equivale ao for do JS)
function listarCarrinho() {
    $total = 0;

    if (empty($_SESSION['carrinho'])) {
        echo "<li>O carrinho está vazio.</li>";
        return 0;
    }

    foreach ($_SESSION['carrinho'] as $nome => $preco) {
        echo "<li>$nome - " . number_format($preco, 2) . " €</li>";
        $total += $preco;
    }

    return $total;
}

// Finalizar compra (equivale ao localStorage.clear)
function finalizarCompra() {
    if (isset($_POST['finalizar'])) {
        if (empty($_SESSION['carrinho'])) {
            echo "<script>alert('O carrinho está vazio!');</script>";
        } else {
            $_SESSION['carrinho'] = [];
            echo "<script>alert('Compra finalizada com sucesso!');</script>";
        }
    }
}

// Executa finalizar
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
         /* Reset e estrutura geral */
body {
	font-family: 'Poppins', Arial, sans-serif;
	margin: 0;
	padding: 0;
	background: #000; /* fundo preto */
	color: #eee; /* texto claro para bom contraste */
}

.container {
	max-width: 900px;
	margin: auto;
	padding: 0 10px;
}

/* Cabeçalho e navegação */
header {
	background: linear-gradient(135deg, #1b1f24, #2b323c);
	color: #fff;
	padding: 10px 0;
	text-align: center;
	box-shadow: 0 2px 6px rgba(0,0,0,0.4);
}

header h1 {
	margin: 0;
	font-size: 1.6em;
	letter-spacing: 0.5px;
	color: #00b4d8;
}

nav {
	background: #1f252b;
	text-align: center;
	padding: 8px 0;
	box-shadow: 0 2px 6px rgba(0,0,0,0.3);
}

nav a {
	color: #fff;
	margin: 0 10px;
	text-decoration: none;
	font-weight: 500;
	font-size: 0.95em;
	text-transform: uppercase;
	transition: color 0.3s, transform 0.2s;
}

nav a:hover {
	color: #00b4d8;
	transform: scale(1.05);
}

/* Banner principal */
.banner {
	background: linear-gradient(135deg, #007bff, #00b4d8);
	color: #fff;
	text-align: center;
	padding: 60px 20px;
	border-bottom: 4px solid #0096c7;
	box-shadow: 0 3px 10px rgba(0,0,0,0.4);
}

.banner h2 {
	font-size: 1.9em;
	margin-bottom: 10px;
}

.banner p {
	font-size: 1em;
	opacity: 0.95;
}

/* Secções gerais */
.section {
	padding: 30px 20px;
	background: #1b1f24; /* fundo escuro */
	margin: 20px 0;
	border-radius: 10px;
	box-shadow: 0 3px 8px rgba(0,0,0,0.4);
	transition: transform 0.3s;
	color: #eee;
}

.section:hover {
	transform: translateY(-2px);
}

/* Cards de jogos */
.games {
	display: flex;
	flex-wrap: wrap;
	gap: 20px;
	justify-content: center;
}

.game {
	background: #232931;
	border-radius: 8px;
	box-shadow: 0 3px 8px rgba(0,0,0,0.3);
	width: 200px;
	text-align: center;
	padding: 12px;
	transition: transform 0.3s, box-shadow 0.3s;
	color: #fff;
}

.game:hover {
	transform: translateY(-5px);
	box-shadow: 0 6px 12px rgba(0,0,0,0.4);
}

.game img {
	width: 100%;
	border-radius: 6px;
	margin-bottom: 8px;
}

.game h3 {
	font-size: 1em;
	margin: 6px 0;
	color: #fff;
}

.game button {
	background: #00b4d8;
	color: white;
	border: none;
	padding: 8px;
	border-radius: 5px;
	cursor: pointer;
	font-weight: bold;
	font-size: 0.9em;
	transition: background 0.3s, transform 0.2s;
}

.game button:hover {
	background: #0096c7;
	transform: scale(1.05);
}

/* Métodos de pagamento */
.payment-methods {
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	gap: 20px;
}

.payment-card {
	background: #1e242c;
	border-radius: 8px;
	box-shadow: 0 2px 5px rgba(0,0,0,0.3);
	padding: 15px;
	text-align: center;
	width: 180px;
	transition: transform 0.3s;
	color: #fff;
}

.payment-card:hover {
	transform: scale(1.04);
}

.payment-card img {
	width: 100%;
	height: 80px;
	object-fit: contain;
	margin-bottom: 8px;
}

/* Formulários e inputs */
input, select, textarea, button {
	padding: 8px;
	margin: 5px 0;
	width: 100%;
	border: 1px solid #444;
	border-radius: 5px;
	font-family: inherit;
	font-size: 0.95em;
	background: #111;
	color: #fff;
	transition: border 0.3s, box-shadow 0.3s;
}

input:focus, select:focus, textarea:focus {
	border-color: #00b4d8;
	box-shadow: 0 0 6px rgba(0,180,216,0.4);
	outline: none;
}

/* Rodapé */
footer {
	background: #1b1f24;
	color: #ccc;
	text-align: center;
	font-size: 0.85em;
	padding: 15px 10px;
	border-top: 2px solid #00b4d8;
}

footer p {
	margin: 4px 0;
}

/* Responsividade */
@media (max-width: 700px) {
	.games, .payment-methods {
		flex-direction: column;
		align-items: center;
	}

	.banner {
		padding: 40px 10px;
	}

	nav a {
		display: inline-block;
		margin: 5px;
	}
}

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
    <p>&copy; 2026 GameWorld</p>
</footer>
</body>
</html>






