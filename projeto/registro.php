<?
   
   
   if(isset($_POST['submit']))
   {

        include_once('conex.php');

       $nome = $_POST['nome'];
       $email = $_POST['email'];
       $senha = $_POST['senha'];

       $result = mysqli_query($conexao, "INSERT INTO usuario(nome,email,senha) 
       VALUES ('$nome','$email','$senha')");

   }
   
?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solar</title>
    <link rel="stylesheet" type="text/css" href="style_login.css"/>
</head>
<body>
    <h1 class="logo">Solar</h1>
    <div>
        <h1>Registro</h1>
        <form action="registro.php" method="POST">
            <input type="text" name="nome" placeholder="Nome">
            <br><br>
            <input type="text" name="email" placeholder="Email" >
            <br><br>
            <input type="text" name="senha" placeholder="Senha">
            <br><br>
            <input class="inputSubmit" type="submit" name="submit" value="Enviar">
        </form>
    </div>
</body>
</html>