<?php
//inicia sessão
session_start();

//chama os arquivos apenas uma vez
require_once "../classes/Conexao.class.php";
require_once "../classes/Tamanho.class.php";


//pega o valor do botão
if(isset($_POST['btn_cadastra_tamanho'])):

    //pega variaveis dos inputs (não entendi muito bem o porque tudo isso)
    $tamanho = filter_input(INPUT_POST, "tamanho", FILTER_SANITIZE_MAGIC_QUOTES);

    //cria objeto
    $cta = new Tamanho;

    //determina o valor recebido dos inputs para as propriedades
    $cta->setTamanho($tamanho);

    //Cadastra
    if($cta->Cadastrar()):
          echo "<script>window.location='../cadastro.php#produto';alert('Tamanho Inserido Com Sucesso');</script>";
    else:
        // echo "<script>window.location='../cadastro.php#produto';alert('Tamanho Ja Inserido');</script>";
        echo 'Erro CADASTRAR TAMANHO: '. $e->getMessage();
    endif;

endif;


?>
