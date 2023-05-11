<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    private $conexao;

    public function setUp(): void
    {
        session_start();

        $this->conexao = new mysqli('localhost', 'usuario', 'senha', 'bd-solar');

        if ($this->conexao->connect_error) {
            die("Falha na conexão: " . $this->conexao->connect_error);
        }

        if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: login.php');
            exit;
        }

        $_SESSION['email'] = 'usuario@teste.com';
        $_SESSION['senha'] = 'senha_segura';
    }

    public function testPaginaDeAgendamentos(): void
    {
        $_GET['search'] = '';

        ob_start();
        include 'pagina_de_agendamentos.php';
        $conteudo = ob_get_clean();

        $this->assertStringContainsString('<title>Agendamentos</title>', $conteudo);
        $this->assertStringContainsString('<a href="cidade.php" title="Cidades" style="color: black;">', $conteudo);
        $this->assertStringContainsString('<a href="clientes.php" title="Clientes" style="color: black;">', $conteudo);
    }

    public function testConsultaDeUsuarios(): void
    {
        $result = $this->conexao->query("SELECT * FROM usuarios");
        $this->assertTrue($result->num_rows > 0);
    }

    public function testInsercaoDeAgendamento(): void
    {
        $_POST['idCliente_FK'] = 1;
        $_POST['data_Agend'] = '2023-05-11';
        $_POST['horaInicio'] = '09:00:00';
        $_POST['horaFim'] = '11:00:00';
        $_POST['status_Inst'] = 'Pendente';

        $this->assertTrue(isset($_POST['submit']));

        $result = $this->conexao->query("SELECT * FROM instalacao WHERE idCliente_FK = 1 AND data_Agend = '2023-05-11' AND horaInicio = '09:00:00' AND horaFim = '11:00:00' AND status_Inst = 'Pendente'");
        $this->assertTrue($result->num_rows > 0);
    }

    public function tearDown(): void
    {
        $this->conexao->close();
    }
}
