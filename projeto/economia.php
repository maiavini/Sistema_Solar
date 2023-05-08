<?php
    session_start();

    include_once('conex.php');

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['email'];
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM usuarios WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' ORDER BY id DESC";
    }
    else
    {
        $sql = "SELECT * FROM usuarios ORDER BY id DESC";
    }
    $result = $conexao->query($sql);



    // Definindo as variáveis de entrada
    $consumo_medio = $_POST['consumo_med']; // kWh/mês
    $preco_energia = $_POST['preco_energia']; // R$/kWh
    $capacidade_solar = $_POST['capacidade_solar']; // kWh/mês
    $preco_instalacao = $_POST['preco_instal'];
    $custo_disp = $_POST['custo_disp'];
    $imposto = $_POST['imposto'];
    $tx_iluminacao = $_POST['tx_iluminacao'];// R$
    

    

// Calculando o custo mensal atual da energia elétrica
    $consumo_mensal = $consumo_medio;
    $preco_atual = $consumo_mensal * $preco_energia;


// Calculando o custo mensal com energia solar
    $preco_solar = $preco_instalacao / (25 * 12) + ($consumo_medio - $capacidade_solar) * $preco_energia;

    $tarifa_fiob = $preco_energia * 0.28;

    $valor_fiob = $tarifa_fiob * $consumo_medio;

    if($valor_fiob >= $custo_disp){

        $resultado = $valor_fiob;
    }
    else{
        $resultado = $custo_disp;
    }
// Calculando a economia mensal com energia solar
    $economia_mensal = $preco_atual - $preco_solar - $imposto - $tx_iluminacao - $resultado;


// Exibindo o resultado
    echo "Com energia solar, você pode economizar R$" . number_format($economia_mensal, 2, ',', '.') . " por mês.";

    

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Economia</title>
    <link  rel="stylesheet" type="text/css" href="style_economia.css" >
</head>
<body>
    <navbar id="icons">
        <ul>
            <li>
                <a href="cidade.php" title="Cidades" style="color: black;">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
                </a>
            </li>
            <br><br>
            <li>
                <a href="clientes.php" title="Clientes" style="color: black;">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z"/>
                <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z"/>
                </svg>
                </a>
            </li>
            <br><br>
            <li>
                <a href="agendamento.php" title="Agendamentos" style="color: black;">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                </svg>
                </a>
            </li>
            <br><br>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-piggy-bank-fill" viewBox="0 0 16 16">
                <path d="M7.964 1.527c-2.977 0-5.571 1.704-6.32 4.125h-.55A1 1 0 0 0 .11 6.824l.254 1.46a1.5 1.5 0 0 0 1.478 1.243h.263c.3.513.688.978 1.145 1.382l-.729 2.477a.5.5 0 0 0 .48.641h2a.5.5 0 0 0 .471-.332l.482-1.351c.635.173 1.31.267 2.011.267.707 0 1.388-.095 2.028-.272l.543 1.372a.5.5 0 0 0 .465.316h2a.5.5 0 0 0 .478-.645l-.761-2.506C13.81 9.895 14.5 8.559 14.5 7.069c0-.145-.007-.29-.02-.431.261-.11.508-.266.705-.444.315.306.815.306.815-.417 0 .223-.5.223-.461-.026a.95.95 0 0 0 .09-.255.7.7 0 0 0-.202-.645.58.58 0 0 0-.707-.098.735.735 0 0 0-.375.562c-.024.243.082.48.32.654a2.112 2.112 0 0 1-.259.153c-.534-2.664-3.284-4.595-6.442-4.595Zm7.173 3.876a.565.565 0 0 1-.098.21.704.704 0 0 1-.044-.025c-.146-.09-.157-.175-.152-.223a.236.236 0 0 1 .117-.173c.049-.027.08-.021.113.012a.202.202 0 0 1 .064.199Zm-8.999-.65a.5.5 0 1 1-.276-.96A7.613 7.613 0 0 1 7.964 3.5c.763 0 1.497.11 2.18.315a.5.5 0 1 1-.287.958A6.602 6.602 0 0 0 7.964 4.5c-.64 0-1.255.09-1.826.254ZM5 6.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"/>
                </svg>
            </li>
            <br><br>
            <li>
                <a href="sair.php" title="Sair" style="color: black;">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
                <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/>
                </svg>
                </li>
                </a>
        </ul>
        </navbar>
   
        <form action="economia.php" method="POST">
            <fieldset>
                <legend><b>Economia</b></legend>
                <br><br>
                <div class="inputbox">
                    Consumo Médio:
                    <input type="text" name="consumo_med" id="consumo_med" class="inputUser" placeholder="KWh"required>
                    <label for="consumo_med" class="inputLabel"></label>
                    <br>
                    <p>
                    Tarifa de Energia por KWh:
                    <input type="text" name="preco_energia" id="preco_energia" class="inputUser" placeholder="R$"required>
                    <label for="preco_energia" class="inputLabel"></label>
                    <br>
                    <p>
                    Capacidade de Produção Solar:   
                    <input type="text" name="capacidade_solar" id="capacidade_solar" class="inputUser" placeholder="KWh"required>
                    <label for="capacidade_solar" class="inputLabel"></label>
                    <br>
                    <p>
                    Instalação:
                    <input type="text" name="preco_instal" id="preco_instal" class="inputUser" placeholder="R$"required>
                    <label for="preco_instal" class="inputLabel"></label>
                    <br>
                    <p>
                    Custo de Disponibilidade:
                    <input type="text" name="custo_disp" id="custo_disp" class="inputUser" placeholder="R$"required>
                    <label for="custo_disp" class="inputLabel"></label>
                    <br>
                    <p>    
                    Imposto:
                    <input type="text" name="imposto" id="imposto" class="inputUser" placeholder="R$"required>
                    <label for="imposto" class="inputLabel"></label>
                    <br>
                    <p>
                    Taxa Iluminiação Pública:
                    <input type="text" name="tx_iluminacao" id="tx_iluminacao" class="inputUser" placeholder="R$"required>
                    <label for="tx_iluminacao" class="inputLabel"></label>
                </div>
                <br><br>
                <button type="" name="calcular">Calcular</button>
                
            </fieldset>
        </form>
        
  
    
</body>
</html>