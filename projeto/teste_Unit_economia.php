<?php
use PHPUnit\Framework\TestCase;

class MyTest extends TestCase
{
    public function testEconomiaMensal()
    {
        $_POST['consumo_med'] = 300; // exemplo de consumo médio de energia
        $_POST['preco_energia'] = 0.5; // exemplo de preço da energia
        $_POST['capacidade_solar'] = 200; // exemplo de capacidade solar
        $_POST['preco_instal'] = 5000; // exemplo de preço de instalação
        $_POST['custo_disp'] = 50; // exemplo de custo de disponibilidade
        $_POST['imposto'] = 20; // exemplo de imposto
        $_POST['tx_iluminacao'] = 10; // exemplo de taxa de iluminação


        ob_start();
        include 'teste_Unit_economia.php';
        ob_end_clean();

        $expected = "Com energia solar, você pode economizar R$120.00 por mês."; // exemplo de resultado esperado

        $this->expectOutputString("<script>alert('$expected');</script>");
    }
}




