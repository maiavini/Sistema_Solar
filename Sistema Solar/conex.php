<?php
    $dbhost='Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'solar-bd';

    $conexao = new mysqli($dbhost, $dbUsername, $dbPassword, $dbName);

    if($conexao -> connect_errno)
    {
        echo "Erro!";
    }
    else
    {
        echo "Conexão com sucesso!";
    }

?>