<?php
//inicia sessão
session_start();

//chama os arquivos apenas uma vez
require_once "../classes/Conexao.class.php";
require_once "../classes/Venda.class.php";
require_once "../classes/Estoque.class.php";



//pega o valor do botão
if(isset($_POST['btn_insere_item'])):

    //pega variaveis dos inputs (não entendi muito bem o porque tudo isso)
    $descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_MAGIC_QUOTES);
    $marca = filter_input(INPUT_POST, "marca", FILTER_SANITIZE_MAGIC_QUOTES);
    $preco = filter_input(INPUT_POST, "preco", FILTER_SANITIZE_MAGIC_QUOTES);
    $quantidade = filter_input(INPUT_POST, "quantidade", FILTER_SANITIZE_MAGIC_QUOTES);

    //cria objeto
    $ab = new Venda;


    $sub_total_produto = $preco*$quantidade;

    //determina o valor recebido dos inputs para as propriedades
    $ab->setIdvenda($_SESSION['idvenda']);
    $ab->setDescricao($descricao);
    $ab->setMarca($marca);
    $ab->setPreco($preco);
    $ab->setSub_total_produto($sub_total_produto);
    $ab->setQuantidade($quantidade);

    //Cadastra
    if($ab->Insere_item_avulso()):

        header("location:../venda.php");
    else:
      // echo 'Erro ao Inserir Item: '. $e->getMessage();
      echo "<script>window.location='../venda.php';alert('Erro ao inserir Produto verifique todos os campos!');</script>";
    endif;

endif;



?>
