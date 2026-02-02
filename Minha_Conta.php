<?php
// Definir um usuário e senha de exemplo (em produção, use base de dados e hash de senha)
$usuario_correto = "teste@exemplo.com";
$senha_correta = "123456";

$mensagem_login = "";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($email === $usuario_correto && $senha === $senha_correta) {
        $mensagem_login = "Login efetuado com sucesso, $email!";
    } else {
        $mensagem_login = "Email ou palavra-passe incorretos!";
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
    <title>Minha Conta - GameWorld</title>
    <style>
        body {
  font-family: 'Poppins', sans-serif;
  margin: 0;
  background: #000; /* fundo preto */
  color: #fff; /* texto branco para contraste */
}

header, footer {
  background: #1b1f24;
  color: #fff;
  text-align: center;
  padding: 15px;
}

nav {
  background: #1f252b;
  text-align: center;
  padding: 10px;
}

nav a {
  color: #fff;
  margin: 0 15px;
  text-decoration: none;
  font-weight: 500;
  transition: color 0.3s;
}

nav a:hover {
  color: #00b4d8;
}

section {
  text-align: center;
  padding: 50px;
  background: #0d0d0d; /* ligeiro contraste com o fundo geral */
  border-radius: 10px;
  margin: 20px auto;
  width: 80%;
  box-shadow: 0 0 10px rgba(0,180,216,0.2);
}

input, button {
  padding: 10px;
  margin: 5px;
  width: 250px;
  border-radius: 6px;
  border: 1px solid #333;
  background: #111;
  color: #fff;
  transition: border 0.3s, background 0.3s;
}

input:focus {
  border-color: #00b4d8;
  outline: none;
}

button {
  background: #007bff;
  color: #fff;
  border: none;
  cursor: pointer;
  font-weight: bold;
}

button:hover {
  background: #0056b3;
}

    </style>
</head>
<body>

<header>
    <h1>Minha Conta</h1>
    <nav>
        <a href="Minha_Conta.php">Minha Conta</a>
		<a href="index.html">Início</a>
    </nav>
</header>

<section>
    <h2>Login</h2>

    <form method="post" action="">
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="senha" placeholder="Palavra-passe" required><br><br>
        <button type="submit" name="login">Entrar</button>
    </form>

    <?php if($mensagem_login != ""): ?>
        <p class="mensagem"><?php echo $mensagem_login; ?></p>
    <?php endif; ?>

    <p><a href="#">Criar nova conta</a></p>
</section>

<section>
    <div class="saldo-container">
        <h3>Total na Conta</h3>
        <p>Saldo atual: <span id="saldo">€50.00</span></p>
        <input type="number" id="valorAdicionar" placeholder="Valor a adicionar (€)">
        <button onclick="adicionarSaldo()">Adicionar Saldo</button>
    </div>
</section>

<section class="section">
    <h2>Newsletter</h2>
    <input type="email" id="emailNewsletter" placeholder="Digite seu email">
    <button onclick="inscreverNewsletter()">Inscrever-se</button>
</section>

<footer>
    <p>&copy; 2026 GameWorld</p>
</footer>

<script>
    let saldoAtual = 50.00;

    function atualizarSaldo() {
        document.getElementById('saldo').innerText = `€${saldoAtual.toFixed(2)}`;
    }

    function adicionarSaldo() {
        const valor = parseFloat(document.getElementById('valorAdicionar').value);
        if (!isNaN(valor) && valor > 0) {
            saldoAtual += valor;
            atualizarSaldo();
            alert(`Saldo adicionado: €${valor.toFixed(2)}`);
        } else {
            alert("Insira um valor válido para adicionar.");
        }
    }

    function inscreverNewsletter() {
        const email = document.getElementById('emailNewsletter').value;
        if (email.includes('@')) {
            alert(`Obrigado por inscrever-se, ${email}!`);
        } else {
            alert("Insira um email válido.");
        }
    }
</script>
</body>
</html>


