<?php
//inicia sessão
session_start();

//chama os arquivos apenas uma vez
// require_once "../classes/Conexao.class.php";
// require_once "../classes/tamanho.class.php";


//pega o valor do botão
if(isset($_POST['btn_cadastra_tamanho'])):


    //pega variaveis dos inputs (não entendi muito bem o porque tudo isso)
    // $idtamanho = filter_input_array(INPUT_POST, "idtamanho[]", FILTER_SANITIZE_MAGIC_QUOTES);
    // $quantidade = filter_input_array(INPUT_POST, "quantidade[]", FILTER_SANITIZE_MAGIC_QUOTES);

    $idtamanho = $_POST['idtamanho'];
    $quantidade = $_POST['quantidade'];

      foreach(array_combine($idtamanho, $quantidade) as $id => $n)
        {
          echo "id tamanho: ".$id." - Quantidade: ".$n."<br />";
        }


endif;


?>
