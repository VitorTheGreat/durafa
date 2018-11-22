<?php
//inicia sessão
session_start();

//chama os arquivos apenas uma vez
require_once "../classes/Conexao.class.php";
require_once "../classes/Venda.class.php";
require_once "../classes/Estoque.class.php";



if(isset($_POST['btn_exclui_item'])):

    $iditem_avulso = filter_input(INPUT_POST, "iditem_avulso", FILTER_SANITIZE_MAGIC_QUOTES);

    //cria objeto
    $ab = new Venda;


    $ab->setIditem_avulso($iditem_avulso);

    //Cadastra
    if($ab->Delete_item_avulso()):
        header("location:../venda.php");
    else:
        echo 'Erro ao Inserir Item: '. $e->getMessage();
    endif;

endif;



?>
