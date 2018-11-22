<?php
//inicia sessão
session_start();

//chama os arquivos apenas uma vez
require_once "../classes/Conexao.class.php";
require_once "../classes/Fornecedor.class.php";

//condição para fazer login
//pega o valor do botão
if(isset($_POST['btn_exclui'])):
    //pega variaveis dos inputs (não entendi muito bem o porque tudo isso)
    $cnpj = filter_input(INPUT_POST, "select_nome_fornecedor", FILTER_SANITIZE_MAGIC_QUOTES);

    //cria objeto
    $ef = new Fornecedor;
    //determina o valor recebido dos inputs para as propriedades
    $ef->setCnpj($cnpj);

    //Cadastra
    if($ef->Excluir()):
        echo "<script>window.location='../exclui.php';alert('Fornecedor Exlcuido com Sucesso');</script>";
//        header("Location: sucesso.php");
    else:
        echo 'Erro: '. $e->getMessage();
    endif;

endif;

?>
