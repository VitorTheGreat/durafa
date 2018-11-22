<?php
//inicia sessão
session_start();

//chama os arquivos apenas uma vez
require_once "../classes/Conexao.class.php";
require_once "../classes/Cor.class.php";


//pega o valor do botão
if(isset($_POST['btn_cadastra_cor'])):

    //pega variaveis dos inputs (não entendi muito bem o porque tudo isso)
    $nome = filter_input(INPUT_POST, "nome_cor", FILTER_SANITIZE_MAGIC_QUOTES);

    //cria objeto
    $c = new Cor;

    //determina o valor recebido dos inputs para as propriedades
    $c->setNome($nome);

    //Cadastra
    if($c->Cadastrar()):
          echo "<script>window.location='../cadastro.php#produto';alert('Cor Inserida Com Sucesso');</script>";
    else:
        echo 'Erro CADASTRAR COR: '. $e->getMessage();
    endif;

endif;


?>
