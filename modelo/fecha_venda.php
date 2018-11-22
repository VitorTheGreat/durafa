<?php
//inicia sessão
session_start();

//chama os arquivos apenas uma vez
require_once "../classes/Conexao.class.php";
require_once "../classes/Venda.class.php";
require_once "../classes/Estoque.class.php";
require_once "../classes/Produto.class.php";



if(isset($_POST['btn_conclui_venda'])):

    $valor_pago = filter_input(INPUT_POST, "valor_pago", FILTER_SANITIZE_MAGIC_QUOTES);
    $valor_desconto = filter_input(INPUT_POST, "desconto", FILTER_SANITIZE_MAGIC_QUOTES);
    $total_desconto = filter_input(INPUT_POST, "total_desconto", FILTER_SANITIZE_MAGIC_QUOTES);
    $total = filter_input(INPUT_POST, "sub_total", FILTER_SANITIZE_MAGIC_QUOTES);
    $troco = filter_input(INPUT_POST, "troco", FILTER_SANITIZE_MAGIC_QUOTES);
    $metodo_pagamento = filter_input(INPUT_POST, "metodo_pagamento", FILTER_SANITIZE_MAGIC_QUOTES);


    //cria objeto
    $ab = new Venda;
    // $cp = new Produto;

    $ab->setValor_pago($valor_pago);
    $ab->setValor_desconto($valor_desconto);
    $ab->setPreco_total_desconto($total_desconto);
    $ab->setTotal($total);
    $ab->setTroco($troco);
    $ab->setMetodo_pagamento($metodo_pagamento);
    $ab->setIdvenda($_SESSION['idvenda']);

    //Cadastra
    if($ab->Fecha_venda()):
        unset($_SESSION['idvenda']);
          echo "<script>window.location='../index.php';alert('Venda Realizada com Sucesso!');</script>";
    else:
        echo 'Erro ao Realizar Venda: '. $e->getMessage();
    endif;

endif;



?>
