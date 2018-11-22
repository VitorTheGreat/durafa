<?php
//inicia sessão
session_start();

//chama os arquivos apenas uma vez
require_once "../classes/Conexao.class.php";
require_once "../classes/Fornecedor.class.php";

//condição para fazer login
//pega o valor do botão
if(isset($_POST['btn_altera'])):
    //pega variaveis dos inputs (não entendi muito bem o porque tudo isso)
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_MAGIC_QUOTES);
    $cnpj = filter_input(INPUT_POST, "select_nome_fornecedor", FILTER_SANITIZE_MAGIC_QUOTES);
    $telefone = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_MAGIC_QUOTES);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_MAGIC_QUOTES);
    $endereco = filter_input(INPUT_POST, "endereco", FILTER_SANITIZE_MAGIC_QUOTES);

    //cria objeto
    $f = new Fornecedor;
    //determina o valor recebido dos inputs para as propriedades
    $f->setNome($nome);
    $f->setCnpj($cnpj);
    $f->setTelefone($telefone);
    $f->setEmail($email);
    $f->setEndereco($endereco);

    //Cadastra
    if($f->Alterar()):
        echo "<script>window.location='../altera.php';alert('Alterado com Sucesso');</script>";
//        header("Location: sucesso.php");
    else:
        echo 'Erro: '. $e->getMessage();
    endif;

endif;

?>
