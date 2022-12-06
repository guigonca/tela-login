<?php 
if(isset($_POST['nome']) || isset($_POST['email']) || isset($_POST['senha'])){

    include("conexao.php");

    // $nome = $_POST["nome"];
    // $email = $_POST["email"];
    // $senha = $_POST['senha'];

    if(strlen($_POST['nome']) == 0 ){
        echo "Preencha seu nome";
    }else if(strlen($_POST['email'])== 0) {
        echo "Preencha sua e-mail";
    }else if(strlen($_POST['senha'])== 0) {
        echo "Preencha sua senha";
    }else{
        //segurança anti fraude// 
        
        $nome = $mysqli->real_escape_string($_POST['nome']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

    $mysqli->query("INSERT INTO usuarios (nome, email, senha) VALUES('$nome', '$email', '$senha')");

    header("Location: index.php");
}
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Khojki:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro</title>
</head>
<body>
    <div class="container">
        <div class="box2">
            <form action="" method="post">
                <h1>Cadastro</h1>
                <p>
                    
                    <input class="login" type="text" name="nome" placeholder="Nome">
                </p>
                <p>
                    
                    <input class="login" type="email" name="email" placeholder="E-mail">
                </p>
                <p>
                    <input class="login"type="password" name="senha" placeholder="Senha">
                </p>
                <br>
                <button id="entrar" type="submit">Cadastrar</button>
                <br>
                <a href="index.php">Área de login</a>
            
            </form>
        </div>
    </div>

    <p><a href="index.php">Tela de login</a></p>
</body>
</html>