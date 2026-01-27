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
        /* Aqui vai o seu CSS inteiro, sem alterações */
        body { font-family: 'Poppins', Arial, sans-serif; margin:0; padding:0; background:#000; color:#eee; }
        /* restante CSS omitido para não poluir, mas você deve colar o seu CSS completo aqui */
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
