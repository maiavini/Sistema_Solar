<?php

    include_once('conex.php');

    if(isset($_POST['submit']))
    {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];
        $complemento = $_POST['complemento'];
        $cep = $_POST['cep'];
        $idCidade_FK = $_POST['idCidade_FK'];

        echo $nome;
        echo $cpf;
        echo $telefone;
        echo $rua;
        echo $numero;
        echo $complemento;
        echo $cep;
        echo $idCidade_FK;
      

        $result = mysqli_query($conexao, "INSERT INTO cliente(nome,cpf,telefone,rua,numero,complemento,cep,idCidade_FK) 
        VALUES ('$nome','$cpf','$telefone','$rua','$numero','$complemento','$cep','$idCidade_FK')");

        //if ($conexao->query($result) === TRUE) {
            //echo "Registro criado";
        //}else {
            //echo "Erro: " . $result . "<br>" . $conexao->error;
        //}

       
    }
    
?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link  rel="stylesheet" type="text/css" href="style_clientes.css" >
</head>
<body>
    <navbar id="icons">
        <ul>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
            </li>
            <br><br>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-vcard-fill" viewBox="0 0 16 16">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5ZM9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8Zm1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5Zm-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96c.026-.163.04-.33.04-.5ZM7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z"/>
                </svg>
            </li>
            <br><br>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                </svg>
            </li>
            <br><br>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-piggy-bank" viewBox="0 0 16 16">
                <path d="M5 6.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm1.138-1.496A6.613 6.613 0 0 1 7.964 4.5c.666 0 1.303.097 1.893.273a.5.5 0 0 0 .286-.958A7.602 7.602 0 0 0 7.964 3.5c-.734 0-1.441.103-2.102.292a.5.5 0 1 0 .276.962z"/>
                <path fill-rule="evenodd" d="M7.964 1.527c-2.977 0-5.571 1.704-6.32 4.125h-.55A1 1 0 0 0 .11 6.824l.254 1.46a1.5 1.5 0 0 0 1.478 1.243h.263c.3.513.688.978 1.145 1.382l-.729 2.477a.5.5 0 0 0 .48.641h2a.5.5 0 0 0 .471-.332l.482-1.351c.635.173 1.31.267 2.011.267.707 0 1.388-.095 2.028-.272l.543 1.372a.5.5 0 0 0 .465.316h2a.5.5 0 0 0 .478-.645l-.761-2.506C13.81 9.895 14.5 8.559 14.5 7.069c0-.145-.007-.29-.02-.431.261-.11.508-.266.705-.444.315.306.815.306.815-.417 0 .223-.5.223-.461-.026a.95.95 0 0 0 .09-.255.7.7 0 0 0-.202-.645.58.58 0 0 0-.707-.098.735.735 0 0 0-.375.562c-.024.243.082.48.32.654a2.112 2.112 0 0 1-.259.153c-.534-2.664-3.284-4.595-6.442-4.595zM2.516 6.26c.455-2.066 2.667-3.733 5.448-3.733 3.146 0 5.536 2.114 5.536 4.542 0 1.254-.624 2.41-1.67 3.248a.5.5 0 0 0-.165.535l.66 2.175h-.985l-.59-1.487a.5.5 0 0 0-.629-.288c-.661.23-1.39.359-2.157.359a6.558 6.558 0 0 1-2.157-.359.5.5 0 0 0-.635.304l-.525 1.471h-.979l.633-2.15a.5.5 0 0 0-.17-.534 4.649 4.649 0 0 1-1.284-1.541.5.5 0 0 0-.446-.275h-.56a.5.5 0 0 1-.492-.414l-.254-1.46h.933a.5.5 0 0 0 .488-.393zm12.621-.857a.565.565 0 0 1-.098.21.704.704 0 0 1-.044-.025c-.146-.09-.157-.175-.152-.223a.236.236 0 0 1 .117-.173c.049-.027.08-.021.113.012a.202.202 0 0 1 .064.199z"/>
                </svg>
            </li>
        </ul>
        </navbar>
   
        <form action="clientes.php" method="POST">
            <fieldset>
                <legend><b>Clientes</b></legend>
                <br>
                <div class="inputbox">
                    <input type="text" name="cpf" id="cpf" class="inputUser" placeholder="CPF" required>
                    <label for="cpf" class="inputLabel"></label>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </div>
                <br><br>
                <div class="inputbox">
                    <input type="text" name="nome" id="nome" class="inputUser" placeholder="Nome"required>
                    <label for="nome" class="inputLabel"></label>
                </div>
                <br><br>
                <div class="inputbox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" placeholder="Telefone" required>
                    <label for="telefone" class="inputLabel"></label>
                </div>
                <br><br>
                <div class="inputbox">
                    <input type="text" name="rua" id="rua" class="inputUser" placeholder="Logradouro" required>
                    <label for="rua" class="inputLabel">  </label>
                    <input type="text" name="numero" id="numero" class="inputUser" placeholder="Nº" required>
                    <label for="numero" class="inputLabel"> </label>
                </div>
                <br><br>
                <div class="inputbox">
                    <input type="text" name="complemento" id="complemento" class="inputUser" placeholder="Complemento">
                    <label for="complemento" class="inputLabel"></label>
                    <input type="text" name="cep" id="cep" class="inputUser" placeholder="CEP" required>
                    <label for="cep" class="inputLabel"></label>
                </div>
                <br><br>
                <?php
                    $sql = "SELECT * FROM cidade"; 
    
                    $result = $conexao->query($sql);
                    echo "<select name='idCidade_FK'>";
                    while($user_data = mysqli_fetch_assoc($result)){
                    echo "<option value='".$user_data["idCidade"]."'>".$user_data["cidade"]."</option>";
                    }
                    echo "</select>";
                ?>
                
                <br><br>
                <div>
                <input type="submit" name="submit" id="submit">
                <button type="" name="Limpar">Limpar</button>
                </div>
                
            </fieldset>
        </form>
        
  
    
</body>
</html>