<?php

require_once 'wamp64/www/projeto/conex.php'; // caminho para o arquivo de conexão com o banco de dados

class ClientTest extends PHPUnit_Framework_TestCase
{
    protected $conn;

    protected function setUp()
    {
        $this->conexao = new mysqli('localhost', 'usuario', 'senha', 'bd-solar');
    }

    public function testInsertClient()
    {
        $_POST['submit'] = true;
        $_POST['nome'] = 'João Dias';
        $_POST['cpf'] = '12345678901';
        $_POST['telefone'] = '99999999';
        $_POST['rua'] = 'Rua A';
        $_POST['numero'] = '123';
        $_POST['complemento'] = 'Apto 123';
        $_POST['cep'] = '12345678';
        $_POST['idCidade_FK'] = 1;

        $this->assertTrue(isset($_POST['submit']));

        $result = mysqli_query($this->conn, "INSERT INTO cliente(nome,cpf,telefone,rua,numero,complemento,cep,idCidade_FK) 
        VALUES ('{$_POST['nome']}','{$_POST['cpf']}','{$_POST['telefone']}','{$_POST['rua']}','{$_POST['numero']}','{$_POST['complemento']}','{$_POST['cep']}','{$_POST['idCidade_FK']}')");

        $this->assertTrue($result);

        $client = mysqli_query($this->conn, "SELECT * FROM cliente WHERE nome='João Dias'");

        $this->assertEquals(mysqli_num_rows($client), 1);
    }

    public function testDeleteCliente()
    {
        // Simulação $_POST 
        $_POST['idCliente'] = '1';

        // Criar uma conexão de banco de dados simulada
        $conexao = $this->getMockBuilder(mysqli::class)
            ->disableOriginalConstructor()
            ->getMock();

        // Configura as expectativas para a consulta e o resultado
        $conexao->expects($this->once())
            ->method('query')
            ->with($this->stringContains('DELETE FROM cliente'))
            ->willReturn(true);

        
        include 'clientes.php';

        // Afirmar que a consulta foi executada
        $this->assertTrue(isset($result));
    }

    protected function tearDown()
    {
        mysqli_query($this->conn, "DELETE FROM cliente WHERE nome='João Dias'");
        $this->conn->close();
    }
}
