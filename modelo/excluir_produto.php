<?php
//inicia sessão
session_start();

//chama os arquivos apenas uma vez
require_once "../classes/Conexao.class.php";
require_once "../classes/Produto.class.php";
require_once "../classes/Estoque.class.php";

//condição para fazer login
//pega o valor do botão
if(isset($_POST['btn_exclui'])):
    //pega variaveis dos inputs (não entendi muito bem o porque tudo isso)
    $idproduto = filter_input(INPUT_POST, "idproduto", FILTER_SANITIZE_MAGIC_QUOTES);

    //cria objeto
    $ee = new Estoque;
    $ep = new Produto;
    //determina o valor recebido dos inputs para as propriedades
    $ee->setId_produto($idproduto);
    $ep->setIdproduto($idproduto);

    //Cadastra
    if($ee->Excluir()):
//        echo "<script>window.location='../index.php';alert('Produto Exlcuido do estoque com Sucesso');</script>";
//        header("Location: sucesso.php");
        if($ep->Excluir()){
            echo "<script>window.location='../index.php';alert('Produto Exlcuido com Sucesso');</script>";
        }
        else{
            echo 'Erro ao excluir Produto: '. $e->getMessage();
        }
    else:
        echo 'Erro ao excluir produto do Estoque: '. $e->getMessage();
    endif;

endif;

?>
