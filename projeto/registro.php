<?php

    if(isset($_POST['submit']))
    {

        include_once('conex.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        

        $result = mysqli_query($conexao, "INSERT INTO usuario(nome,email,senha) 
        VALUES ('$nome','$email','$senha')");

        header('Location: login.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link  rel="stylesheet" type="text/css" href="style_login.css" >
</head>
<body>
    <a href="login.php" style="color: white">Voltar</a>
    <div class="box">
        <form action="registro.php" method="POST">
            
                <h2><b>Registro</b></h2>
                <br>
                <input type="text" name="nome" placeholder="Nome" class="login_txt">
                <br><br>
                <input type="text" name="email" placeholder="Email" class="login_txt">
                <br><br>
                <input type="password" name="senha" placeholder="Senha">
                <br><br>
                <input class="inputSubmit" type="submit" name="submit" value="Enviar">
                <br><br>
        </form>
    </div>
</body>
</html>