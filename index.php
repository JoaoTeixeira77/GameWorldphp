<!DOCTYPE html>
<html lang="pt-PT">
<head>
  <meta charset="utf-8">
  <meta name="author" content="João Gonçalo Lourenço Teixeira">
  <meta name="date" content="1 de Julho de 2008">
  <meta name="contact" content="joao.teixeira.31501@esgc.pt">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GameWorld</title>
  <style>
    /* Reset e estrutura geral */
body {
  font-family: 'Poppins', Arial, sans-serif;
  margin: 0;
  padding: 0;
  background: #0f1419; /* fundo mais escuro estilo loja gamer */
  color: #eee;
  line-height: 1.6;
}

.container {
  max-width: 1200px;
  margin: auto;
  padding: 0 20px;
}

/* Cabeçalho e navegação */
header {
  background: linear-gradient(135deg, #1b1f24, #232931);
  color: #fff;
  padding: 25px 0;
  text-align: center;
  box-shadow: 0 3px 10px rgba(0,0,0,0.4);
}

header h1 {
  margin: 0;
  font-size: 2.4em;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  color: #00b4d8;
}

nav {
  background: #121417;
  text-align: center;
  padding: 15px 0;
  box-shadow: 0 2px 6px rgba(0,0,0,0.4);
}

nav a {
  color: #fff;
  margin: 0 20px;
  text-decoration: none;
  font-weight: 600;
  transition: color 0.3s, transform 0.2s;
  text-transform: uppercase;
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
  padding: 100px 20px;
  border-bottom: 5px solid #0096c7;
  box-shadow: 0 4px 15px rgba(0,0,0,0.3);
}

.banner h2 {
  font-size: 2.6em;
  margin-bottom: 15px;
}

.banner p {
  font-size: 1.2em;
  opacity: 0.9;
}

/* Secções gerais */
.section {
  padding: 60px 30px;
  background: #1b1f24;
  margin: 40px 0;
  border-radius: 12px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.2);
  transition: transform 0.3s;
}

.section:hover {
  transform: translateY(-5px);
}

/* Cards de jogos */
.games {
  display: flex;
  flex-wrap: wrap;
  gap: 30px;
  justify-content: center;
}

.game {
  background: #232931;
  border-radius: 12px;
  box-shadow: 0 3px 8px rgba(0,0,0,0.3);
  width: 250px;
  text-align: center;
  padding: 20px;
  transition: transform 0.3s, box-shadow 0.3s;
}

.game:hover {
  transform: translateY(-8px);
  box-shadow: 0 8px 16px rgba(0,0,0,0.4);
}

.game img {
  width: 100%;
  border-radius: 10px;
  margin-bottom: 15px;
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
  background: #0077b6;
  transform: scale(1.05);
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
}

input:focus, select:focus, textarea:focus {
  border-color: #00b4d8;
  box-shadow: 0 0 6px rgba(0,180,216,0.5);
  outline: none;
}

/* Rodapé fixo */
footer {
  background: #1b1f24;
  color: #ccc;
  text-align: center;
  font-size: 0.9em;
  padding: 25px 10px;
  border-top: 2px solid #00b4d8;
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
  z-index: 1000;
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
    padding: 70px 15px;
  }

  nav a {
    display: inline-block;
    margin: 10px;
  }
}
  </style>
</head>
<body>

<?php
$mensagem_enviada = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mensagem = strip_tags($_POST['mensagem']);
    $para = "GameWorld@gmail.com"; // substitua pelo email real da loja
    $assunto = "Mensagem do Formulário GameWorld";
    $corpo = "Mensagem recebida: \n\n" . $mensagem;
    $cabecalhos = "From: no-reply@gameworld.pt";

    if(mail($para, $assunto, $corpo, $cabecalhos)){
        $mensagem_enviada = true;
    }
}
?>

  <!-- Cabeçalho -->
  <header>
    <div class="container">
      <h1>GameWorld</h1>
      <nav>
        <a href="index.php">Início</a>
        <a href="Catálogo.php">Catálogo</a>
        <a href="#contato">Contactos</a>
        <a href="Minha_Conta.php">Minha Conta</a>
        <a href="Carrinho.php">Carrinho</a>
      </nav>
    </div>
  </header>

  <!-- Banner Principal -->
  <section class="banner" id="home">
    <h2>Promoções e Lançamentos!</h2>
    <p>Confira os jogos mais recentes e ofertas exclusivas!</p>
  </section>

  <!-- Jogos em Destaque -->
  <section class="section">
    <h2>Jogos em Destaque</h2>
    <div class="games">
      <h2>Jogos em Destaque</h2>
    <div class="games">
      <div class="game">
        <img src="ApanhaaMaca.JPG" alt="Apanha a Maçã">
        <h3>Apanha a Maçã</h3>
        <p>Preço: 10.00 €</p>
		<video width="200" height="140" controls>
          <source src="ApanhaaMaca.mp4" type="video/mp4">
        </video>
    </div>
    <div class="game">
        <img src="battlefield6.JPG" alt="Battlefield 6">
        <h3>Battlefield 6</h3>
        <p>Preço: 60.19 €</p>
        <video width="200" height="140" controls>
          <source src="Battlefield_6.MP4" type="video/mp4">
        </video>
    </div>
	<section class="games">
	<div class="game">
		<img src="ApanhaaBoladeBasket.JPG" alt="Apanha a Bola de Basket">
		<h3>Apanha a Bola de Basket</h3>
		<p>Preço: 10.00 €</p>
		<video width="200" height="140" controls>
          <source src="ApanhaaBoladeBasket.mp4" type="video/mp4">
        </video>
	</div>
	<div class="game">
		<img src="nba-2k26.JPG" alt="NBA 2K26">
		<h3>NBA 2K26</h3>
		<p>Preço: 53.99 €</p>
			<video width="200" height="140" controls>
			<source src="nba-2k26.MP4" type="video/mp4">
			<source src="movie.ogg" type="video/ogg">
			Your browser does not support the video tag.
		</video>
	</div>
</section>
    </div>
  </section>

  <!-- Contactos -->
  <section class="section" id="contato">
    <h2>Sobre e Contactos</h2>
    <p>Somos uma loja dedicada a vender os melhores jogos, simples e complexos!</p>
    <p>Email: <a href="mailto:GameWorld@gmail.com">GameWorld@gmail.com</a> | Tel: 925 588 547</p>

    <?php if($mensagem_enviada): ?>
      <p style="color: #00b4d8;">Mensagem enviada! Obrigado pelo contacto.</p>
    <?php endif; ?>

    <form id="formContato" method="post" action="">
      <label>Mensagem:</label>
      <textarea name="mensagem" placeholder="Escreva a sua mensagem" required></textarea>
      <button type="submit">Enviar</button>
    </form>
  </section>
  
  <!-- Rodapé -->
  <footer>
    <p>&copy; 2026 GameWorld | Redes Sociais: @GameWorldshop | Termos e Condições</p>
  </footer>

</body>
</html>


