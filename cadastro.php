<?php 
if(isset($_POST['email'])){

    include("conexao.php");

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST['senha'];

    $mysqli->query("INSERT INTO usuarios (nome, email, senha) VALUES('$nome','$email', '$senha')");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <form action="" method="post">
        <h1>Cadastre seu e-mail e senha</h1>
        <p>
            <label>Nome</label>
            <input type="text" name="nome">
        </p>
        <p>
            <label>E-mail</label>
            <input type="email" name="email">
        </p>

        <p>
            <label>Senha</label>
            <input type="password" name="senha">
        </p>
        <button type="submit">Cadastrar</button>

    

    </form>
</body>
</html>