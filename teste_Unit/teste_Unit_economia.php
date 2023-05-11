<?php

class TestEconomia extends PHPUnit_Framework_TestCase
{
    public function testCalculoEconomiaMensal()
    {
        $_POST['consumo_med'] = 300; // consumo médio de energia em kWh
        $_POST['preco_energia'] = 0.50; // preço da energia em R$/kWh
        $_POST['capacidade_solar'] = 100; // capacidade de geração solar em kWh
        $_POST['preco_instal'] = 10000; // preço de instalação do sistema em R$
        $_POST['custo_disp'] = 100; // custo de disponibilidade da rede em R$/mês
        $_POST['imposto'] = 10; // imposto em R$/mês
        $_POST['tx_iluminacao'] = 5; // taxa de iluminação pública em R$/mês
        
        ob_start();
        include('projet.php');
        $output = ob_get_clean();
        
        // verifica se a economia mensal é calculada corretamente com base nos parâmetros fornecidos
        $this->assertContains('Com energia solar, você pode economizar R$137.50 por mês.', $output);
    }
}

?>
