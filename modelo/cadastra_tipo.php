<?php
//inicia sessão
session_start();

//chama os arquivos apenas uma vez
require_once "../classes/Conexao.class.php";
require_once "../classes/Tipo.class.php";


//pega o valor do botão
if(isset($_POST['btn_cadastra_tipo'])):

    //pega variaveis dos inputs (não entendi muito bem o porque tudo isso)
    $tipo = filter_input(INPUT_POST, "tipo", FILTER_SANITIZE_MAGIC_QUOTES);
    $genero = filter_input(INPUT_POST, "genero", FILTER_SANITIZE_MAGIC_QUOTES);

    //cria objeto
    $t = new Tipo;

    //determina o valor recebido dos inputs para as propriedades
    $t->setTipo($tipo);
    $t->setGenero($genero);

    //Cadastra
    if($t->Cadastrar()):
          echo "<script>window.location='../cadastro.php#produto';alert('Tipo Inserido Com Sucesso');</script>";
    else:
        echo 'Erro CADASTRAR TIPO: '. $e->getMessage();
    endif;

endif;


?>
