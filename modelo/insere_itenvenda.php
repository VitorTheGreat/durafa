<?php
//inicia sessão
session_start();

//chama os arquivos apenas uma vez
require_once "../classes/Conexao.class.php";
require_once "../classes/Venda.class.php";
require_once "../classes/Estoque.class.php";
require_once "../classes/Produto.class.php";


//pega o valor do botão
if(isset($_POST['btn_insere_item'])):

    //pega variaveis dos inputs (não entendi muito bem o porque tudo isso)
    $quantidade = filter_input(INPUT_POST, "quantidade", FILTER_SANITIZE_MAGIC_QUOTES);
    $barcode_num = filter_input(INPUT_POST, "barcode_num", FILTER_SANITIZE_MAGIC_QUOTES);

    //cria objeto
    $ab = new Venda;
    $cp = new Produto;


    $cp->setBarcode_num($barcode_num);

    foreach($cp->Consulta_produto_venda() as $dados) {
        // $id_produto = $dados['idproduto'];
    }
    $sub_total_produto = $dados['preco_venda']*$quantidade;
    //determina o valor recebido dos inputs para as propriedades
    $ab->setId_produto($dados['idproduto']);
    $ab->setIdvenda($_SESSION['idvenda']);
    $ab->setSub_total_produto($sub_total_produto);
    $ab->setQuantidade($quantidade);

    //Cadastra
    if($ab->Insere_item()):
        header("location:../venda.php");
    else:
        // echo 'Erro ao Inserir Item: '. $e->getMessage();
        echo "<script>window.location='../venda.php';alert('Produto não cadastrado');</script>";
    endif;

endif;



?>
