<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solar - Login</title>
    <link rel="stylesheet" type="text/css" href="style_login.css"/>
</head>
<body>
    <h1 class="logo">Solar</h1>
    <div>
        <h1>Entrar</h1>
        <form action="testeLogin.php" method="POST">
            <input type="text" name="email" placeholder="Email" class="login_txt">
            <br><br>
            <input type="password" name="senha" placeholder="Senha">
            <br><br>
            <input class="inputSubmit" type="submit" name="submit" value="Enviar">
            <br><br>
            <a href="registro.php" style="color: white;">Registro</a>
        </form>
    </div>
    
</body>
</html>