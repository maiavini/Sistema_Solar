<?php
    $dbhost='Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'bd-solar';

    $conexao = new mysqli($dbhost, $dbUsername, $dbPassword, $dbName);

    //if($conexao -> connect_errno)
     //{
        //echo "Erro!";
     //}
     //else
     //{
        //echo "Conexão estabelecida com sucesso!";
     //}

?>