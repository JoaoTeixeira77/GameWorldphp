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
    /* Aqui vai todo o CSS que você já colocou */
    body { font-family: 'Poppins', Arial, sans-serif; margin:0; padding:0; background:#0f1419; color:#eee; line-height:1.6; }
    /* resto do CSS... */
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
      <!-- jogos aqui, igual ao seu código -->
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
