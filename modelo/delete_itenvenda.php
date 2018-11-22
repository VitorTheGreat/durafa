<?php
//inicia sessão
session_start();

//chama os arquivos apenas uma vez
require_once "../classes/Conexao.class.php";
require_once "../classes/Venda.class.php";
require_once "../classes/Estoque.class.php";
require_once "../classes/Produto.class.php";



if(isset($_POST['btn_exclui_item'])):

    $barcode_num = filter_input(INPUT_POST, "barcode_num", FILTER_SANITIZE_MAGIC_QUOTES);

    //cria objeto
    $ab = new Venda;
    $cp = new Produto;

    $cp->setBarcode_num($barcode_num);

    foreach($cp->Consulta_produto_venda() as $dados) {
        // $id_produto = $dados['idproduto'];
    }

    $ab->setId_produto($dados['idproduto']);

    //Cadastra
    if($ab->Delete_item()):
        header("location:../venda.php");
    else:
        echo 'Erro ao Inserir Item: '. $e->getMessage();
    endif;

endif;



?>
