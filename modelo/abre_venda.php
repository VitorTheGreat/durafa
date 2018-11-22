<?php
//inicia sessão
session_start();

//chama os arquivos apenas uma vez
require_once "../classes/Conexao.class.php";
require_once "../classes/Venda.class.php";


//pega o valor do botão
if(isset($_POST['btn_abre_venda'])):


    //cria objeto
    $ab = new Venda;

    //determina o valor recebido dos inputs para as propriedades
    $ab->setId_usuario($_SESSION['idusuario']);
    $ab->setId_loja($_SESSION['idloja']);

    //Cadastra
    if($ab->Abre_venda()):
          // echo "<script>window.location='../cadastro.php#produto';alert('Descricao Inserida Com Sucesso');</script>";
          foreach($ab->consultar_id_ult_venda() as $dados){
              $_SESSION['idvenda'] = $dados['idvenda'];
          }
          header('location:../venda.php');
    else:
        echo 'Erro ao ABRIR VENDA: '. $e->getMessage();
    endif;

endif;


?>
