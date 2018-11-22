<?php
//inicia sessão
session_start();

//chama os arquivos apenas uma vez
require_once "../classes/Conexao.class.php";
require_once "../classes/Estoque.class.php";


//pega o valor do botão
if(isset($_POST['btn_cadastra'])):

    //pega variaveis dos inputs (não entendi muito bem o porque tudo isso)
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_MAGIC_QUOTES);

    //cria objeto
    $e = new Estoque;

    //determina o valor recebido dos inputs para as propriedades
    $e->setNome_estoques($nome);

    //Cadastra
    if($e->Cadastrar_estoque()):
          echo "<script>window.location='../cadastro.php#produto';alert('Estoque Inserido Com Sucesso');</script>";
    else:
        echo 'Erro CADASTRAR ESTOQUE: '. $e->getMessage();
    endif;

endif;


?>
