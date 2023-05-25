<?php
use PHPUnit\Framework\TestCase;

class AgendamentoTest extends TestCase
{
    public function testRedirectIfNotLoggedIn()
    {
        // Simula o início da sessão sem informações de login
        $_SESSION['email'] = null;
        $_SESSION['senha'] = null;

        // Chama o código que redireciona para a página de login
        include('agendamento.php');

        // Verifica se o redirecionamento ocorreu corretamente
        $this->assertEquals('http://localhost/login.php', $this->getActualOutput());
    }

    public function testDatabaseQueryWithSearchData()
    {
        // Simula uma requisição GET com um valor de busca
        $_GET['search'] = 'example';

        // Cria uma simulação para o objeto de conexão com o banco de dados
        $conexaoMock = $this->getMockBuilder('Conexao')
                            ->disableOriginalConstructor()
                            ->getMock();
        
        // Cria uma simulação para o objeto de resultado da consulta
        $resultadoMock = $this->getMockBuilder('ResultadoConsulta')
                                ->disableOriginalConstructor()
                                ->getMock();
        
        // Define as expectativas de chamadas de métodos no objeto de conexão e resultado
        $conexaoMock->expects($this->once())
                    ->method('query')
                    ->with("SELECT * FROM usuarios WHERE id LIKE '%example%' or nome LIKE '%example%' or email LIKE '%example%' ORDER BY id DESC")
                    ->willReturn($resultadoMock);

        // Chama o código que realiza a consulta no banco de dados
        include('agendamento.php');

        // Verifica se a consulta foi executada corretamente
        $this->assertSame($resultadoMock, $result);
    }

    public function testDatabaseQueryWithoutSearchData()
    {
        // Remove o parâmetro de busca da requisição GET
        unset($_GET['search']);

        // Cria uma simulação para o objeto de conexão com o banco de dados
        $conexaoMock = $this->getMockBuilder('conexao')
                            ->disableOriginalConstructor()
                            ->getMock();
        
        // Cria uma simulação para o objeto de resultado da consulta
        $resultadoMock = $this->getMockBuilder('conexao')
                                ->disableOriginalConstructor()
                                ->getMock();
        
        // Define as expectativas de chamadas de métodos no objeto de conexão e resultado
        $conexaoMock->expects($this->once())
                    ->method('query')
                    ->with("SELECT * FROM usuarios ORDER BY id DESC")
                    ->willReturn($resultadoMock);

        // Chama o código que realiza a consulta no banco de dados
        include('agendamento.php');

        // Verifica se a consulta foi executada corretamente
        $this->assertSame($resultadoMock, $result);
    }

    

}
?>
