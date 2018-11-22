<?php
//inicia sessão
session_start();

//chama os arquivos apenas uma vez
require_once "../classes/Conexao.class.php";
require_once "../classes/Usuario.class.php";
require_once "../classes/Loja.class.php";

//condição para fazer login
//pega o valor do botão
if(isset($_POST['btn_entrar'])):
    //pega variaveis dos inputs (não entendi muito bem o porque tudo isso)
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_MAGIC_QUOTES);
    $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_MAGIC_QUOTES);


    //cria objeto
    $l = new Usuario;
    $loja = new Loja;


    //determina o valor recebido dos inputs para as propriedades
    $l->setEmail($email);
    $l->setSenha($senha);
    $loja->setIp_loja($_SERVER['REMOTE_ADDR']);

    foreach($loja->Pega_ip_loja() as $dados) {
      $_SESSION['idloja'] = $dados['idloja'];
      $_SESSION['nome_loja'] = $dados['nome_loja'];
    }

    //faz login
    if($l->Logar()):
        header("Location: ../index.php");
    else:
    echo "<script>window.location='../login.php';alert('Erro ao fazer Login, Cheque seus dados e tente novamente, se o erro persistir contate um Administrador');</script>";
    endif;

endif;

?>
