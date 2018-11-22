<?php
//inicia sessão
session_start();

//chama os arquivos apenas uma vez
require_once "../classes/Conexao.class.php";
require_once "../classes/Usuario.class.php";

//condição para fazer login
//pega o valor do botão
if(isset($_POST['btn_cadastra'])):
    //pega variaveis dos inputs (não entendi muito bem o porque tudo isso)
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_MAGIC_QUOTES);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_MAGIC_QUOTES);
    $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_MAGIC_QUOTES);
    $idhierarquia = filter_input(INPUT_POST, "id_hierarquia", FILTER_SANITIZE_MAGIC_QUOTES);

    //cria objeto
    $u = new Usuario;
    //determina o valor recebido dos inputs para as propriedades
    $u->setNome($nome);
    $u->setEmail($email);
    $u->setSenha($senha);
    $u->setHierarquia($idhierarquia);

    //Cadastra
    if($u->Cadastrar()):
        echo "<script>window.location='../cadastro.php';alert('Cadastro Realizado com Sucesso');</script>";
//        header("Location: sucesso.php");
    else:
        echo 'Erro: '. $e->getMessage();
    endif;

endif;

?>
