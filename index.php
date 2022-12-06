<?php
    include ("conexao.php");


    if(isset($_POST['email']) || isset($_POST['senha'])){
        
        if(strlen($_POST['email']) == 0 ){
            echo "Preencha seu e-mail";
        }else if(strlen($_POST['senha'])== 0) {
            echo "Preencha sua senha";
        }else{
            //segurança anti fraude// 
            
            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sql_code = "SELECT * FROM  usuarios WHERE (email ='$email' AND senha = '$senha' )";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
            

            $quantidade = $sql_query->num_rows;

            if($quantidade == 1){

                $usuario = $sql_query->fetch_assoc();

                if(!isset($_SESSION)){
                    session_start();
                }

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];

                header("Location: painel.php");

            } else{
                echo "Falha ao logar.<br>";
                echo "Email ou senha incorretos";
            }


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
    <title>Login</title>
</head>
<body>
    
    <div class="container">
        <div class="box">
            <form action="" method="POST">
                <h1>Login</h1>
                
                <input class="login" type="text" name="email" placeholder="E-mail">            
                
                <input class="login"type="password" name="senha" placeholder="Senha"> <br>              
                
                <button id="entrar" type="submit">Entrar </button> 
            
                               
                <p class="sair"><a href="cadastro.php">Criar cadastro</a></p>
            </form>
        </div>
    </div>

    
</body>
</html>

