<?php
// Iniciamos a sessão para carrinho
session_start();

// Função para adicionar produto ao carrinho
function adicionarAoCarrinho($nome, $preco) {
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }

    if (isset($_SESSION['carrinho'][$nome])) {
        $_SESSION['carrinho'][$nome]['quantidade'] += 1;
    } else {
        $_SESSION['carrinho'][$nome] = [
            'preco' => $preco,
            'quantidade' => 1
        ];
    }
}

// Exemplo de carrinho simples
if (isset($_POST['adicionar'])) {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }
    $_SESSION['carrinho'][] = ['nome' => $nome, 'preco' => $preco];
    $msg = "$nome adicionado ao carrinho!";
}

// Lista de jogos
$games = [
    [
        'nome' => 'Apanha a Maçã',
        'preco' => 10.00,
        'img' => 'ApanhaaMaca.jpg',
        'video' => 'ApanhaaMaca.mp4',
        'link' => 'https://scratch.mit.edu/projects/1239856357'
    ],
    [
        'nome' => 'Battlefield 6',
        'preco' => 60.19,
        'img' => 'Battlefield6.jpg',
        'video' => 'Battlefield_6.mp4',
        'link' => ''
    ],
    [
        'nome' => 'Apanha a Bola de Basket',
        'preco' => 10.00,
        'img' => 'ApanhaaBoladeBasket.jpg',
        'video' => 'ApanhaaBoladeBasket.mp4',
        'link' => 'https://scratch.mit.edu/projects/1239872410'
    ],
    [
        'nome' => 'NBA 2K26',
        'preco' => 53.99,
        'img' => 'nba-2k26.jpg',
        'video' => 'nba-2k26.mp4',
        'link' => ''
    ]
];
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="utf-8">
    <meta name="author" value="João Gonçalo Lourenço Teixeira" />
    <meta name="date" value="1 de Julho de 2008" />
    <meta name="contact" value="joao.teixeira.31501@esgc.pt" />
    <title>Catálogo - GameWorld</title>
    <style>
         /* Reset e estrutura geral */
body {
  font-family: 'Poppins', Arial, sans-serif;
  margin: 0;
  padding: 0;
  background: #000; /* fundo preto */
  color: #eee; /* texto claro para contraste */
}

.container {
  max-width: 1200px;
  margin: auto;
  padding: 0 20px;
}

/* Cabeçalho e navegação */
header {
  background: linear-gradient(135deg, #0d1117, #1b1f24);
  color: #fff;
  padding: 20px 0;
  text-align: center;
  box-shadow: 0 2px 6px rgba(0,0,0,0.4);
}

header h1 {
  margin: 0;
  font-size: 2em;
  letter-spacing: 1px;
  color: #00b4d8;
}

nav {
  background: #121417;
  text-align: center;
  padding: 12px 0;
  box-shadow: 0 2px 8px rgba(0,0,0,0.5);
}

nav a {
  color: #fff;
  margin: 0 15px;
  text-decoration: none;
  font-weight: 500;
  transition: color 0.3s, transform 0.2s;
}

nav a:hover {
  color: #00b4d8;
  transform: scale(1.1);
}

/* Banner principal */
.banner {
  background: linear-gradient(135deg, #007bff, #00b4d8);
  color: #fff;
  text-align: center;
  padding: 80px 20px;
  border-bottom: 5px solid #00a5c8;
  box-shadow: 0 4px 10px rgba(0,0,0,0.3);
}

.banner h2 {
  font-size: 2.2em;
  margin-bottom: 10px;
}

.banner p {
  font-size: 1.1em;
  opacity: 0.9;
}

/* Secções gerais */
.section {
  padding: 50px 30px;
  background: #111; /* fundo escuro */
  margin: 30px 0;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.5);
  transition: transform 0.3s;
}

.section:hover {
  transform: translateY(-3px);
}

/* Cards de jogos */
.games {
  display: flex;
  flex-wrap: wrap;
  gap: 25px;
  justify-content: center;
}

.game {
  background: #1a1a1a;
  border-radius: 10px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.4);
  width: 240px;
  text-align: center;
  padding: 15px;
  transition: transform 0.3s, box-shadow 0.3s;
}

.game:hover {
  transform: translateY(-6px);
  box-shadow: 0 6px 15px rgba(0,180,216,0.4);
}

.game img {
  width: 100%;
  border-radius: 8px;
  margin-bottom: 10px;
}

.game h3 {
  font-size: 1.1em;
  margin: 10px 0;
  color: #fff;
}

.game button {
  background: #00b4d8;
  color: white;
  border: none;
  padding: 10px;
  border-radius: 6px;
  cursor: pointer;
  font-weight: bold;
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
  gap: 25px;
}

.payment-card {
  background: #1a1a1a;
  border-radius: 10px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.4);
  padding: 20px;
  text-align: center;
  width: 220px;
  transition: transform 0.3s, box-shadow 0.3s;
}

.payment-card:hover {
  transform: scale(1.05);
  box-shadow: 0 6px 12px rgba(0,180,216,0.3);
}

.payment-card img {
  width: 100%;
  height: 100px;
  object-fit: contain;
  margin-bottom: 10px;
}

/* Formulários e inputs */
input, select, textarea, button {
  padding: 10px;
  margin: 6px 0;
  width: 100%;
  border: 1px solid #333;
  border-radius: 6px;
  font-family: inherit;
  background: #111;
  color: #eee;
  transition: border 0.3s, box-shadow 0.3s;
}

input:focus, select:focus, textarea:focus {
  border-color: #00b4d8;
  box-shadow: 0 0 6px rgba(0,180,216,0.5);
  outline: none;
}

/* Rodapé */
footer {
  background: #0d1117;
  color: #ccc;
  text-align: center;
  font-size: 0.9em;
  padding: 25px 10px;
  border-top: 2px solid #00b4d8;
}

footer p {
  margin: 5px 0;
}

/* Responsividade */
@media (max-width: 700px) {
  .games, .payment-methods {
    flex-direction: column;
    align-items: center;
  }

  .banner {
    padding: 60px 15px;
  }

  nav a {
    display: inline-block;
    margin: 8px;
  }
}

    </style>
</head>
<body>
<header>
  <h1>Catálogo de Jogos</h1>
  <nav>
    <a href="Catálogo.php">Catálogo</a>
	<a href="Carrinho.php">Carrinho</a>
	<a href="index.php">Início</a>
  </nav>
</header>

<?php if(isset($msg)) echo "<p style='color: yellow; text-align:center;'>$msg</p>"; ?>

<section class="section">
    <h2>Jogos em Destaque</h2>
    <div class="games">
        <?php foreach($games as $game): ?>
        <div class="game">
            <img src="<?= $game['img'] ?>" alt="<?= $game['nome'] ?>">
            <?php if($game['link'] != ''): ?>
            <a href="<?= $game['link'] ?>" target="_blank"><?= $game['nome'] ?></a>
            <?php endif; ?>
            <h3><?= $game['nome'] ?></h3>
            <p>Preço: <?= number_format($game['preco'], 2, ',', '.') ?> €</p>
            <form method="post">
                <input type="hidden" name="nome" value="<?= $game['nome'] ?>">
                <input type="hidden" name="preco" value="<?= $game['preco'] ?>">
                <button type="submit" name="adicionar">Adicionar ao Carrinho</button>
            </form>
            <video width="200" height="140" controls>
                <source src="<?= $game['video'] ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<footer>
  <p>&copy; <?= date("Y") ?> GameWorld</p>
</footer>
</body>
</html>

