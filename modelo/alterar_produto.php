<?php
//inicia sessão
session_start();

//chama os arquivos apenas uma vez
require_once "../classes/Conexao.class.php";
require_once "../classes/Produto.class.php";
require_once "../classes/Referencia.class.php";
require_once "../classes/Cor.class.php";

//condição para fazer login
//pega o valor do botão
if(isset($_POST['btn_alterar'])):
    //pega variaveis dos inputs (não entendi muito bem o porque tudo isso)
    $idproduto = filter_input(INPUT_POST, "idproduto", FILTER_SANITIZE_MAGIC_QUOTES);
    $referencia = filter_input(INPUT_POST, "referencia", FILTER_SANITIZE_MAGIC_QUOTES);
    $marca = filter_input(INPUT_POST, "marca", FILTER_SANITIZE_MAGIC_QUOTES);
    $cor = filter_input(INPUT_POST, "cor", FILTER_SANITIZE_MAGIC_QUOTES);
    $id_tipo = filter_input(INPUT_POST, "id_tipo", FILTER_SANITIZE_MAGIC_QUOTES);
    $descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_MAGIC_QUOTES);
    $preco_compra = filter_input(INPUT_POST, "preco_compra", FILTER_SANITIZE_MAGIC_QUOTES);
    $preco_venda = filter_input(INPUT_POST, "preco_venda", FILTER_SANITIZE_MAGIC_QUOTES);
    $id_fornecedor = filter_input(INPUT_POST, "id_fornecedor", FILTER_SANITIZE_MAGIC_QUOTES);
    $id_estoque = filter_input(INPUT_POST, "id_estoques", FILTER_SANITIZE_MAGIC_QUOTES);

    //cria objeto
    $p = new Produto;
    $r = new Referencia;
    $c = new Cor;

// pega IDs dos datalists
    $r->setReferencia($referencia);
    $c->setNome($cor);

// SE REFERENCIA NÂO EXISTIR CADASTRAR NOVA E ENTÃO PEGAR SEU ID
// SE EXISTIR PEGAR ID DIRETO
if($r->Consultar_id_referencia()){
  foreach($r->Consultar_id_referencia() as $id_referencia) {
         // echo 'idreferencia - '.$id_referencia['idreferencia'];
  }
}
else{
  if($r->Cadastrar()){
    foreach($r->Consultar_id_referencia() as $id_referencia) {
           // echo 'idreferencia - '.$id_referencia['idreferencia'];
    }   
  }
  else{
    echo 'Erro CADASTRAR REFERENCIA '. $e->getMessage();
  }
}

//COR
if($c->Consultar_id_cor()){
 foreach($c->Consultar_id_cor() as $id_cor){
        // echo 'idcor - '.$id_cor['idcor'];
 }
}
else{
  if($c->Cadastrar()){
 foreach($c->Consultar_id_cor() as $id_cor){
        // echo 'idcor - '.$id_cor['idcor'];
 }  
  }
  else{
    echo 'Erro Ao escolher/cadastrar COR '. $e->getMessage();
  }
}


    //determina o valor recebido dos inputs para as propriedades
    $p->setIdproduto($idproduto);
    $p->setId_referencia($id_referencia['idreferencia']);
    $p->setMarca($marca);
    $p->setId_cor($id_cor['idcor']);
    $p->setId_tipo($id_tipo);
    $p->setDescricao($descricao);
    $p->setPrecocompra($preco_compra);
    $p->setPrecovenda($preco_venda);
    $p->setId_fornecedor($id_fornecedor);
    $p->setId_estoques($id_estoque);


//Cadastra
if($p->Alterar()):
        echo "<script>window.location='../editar_produto.php';alert('Alterado com Sucesso meu Consagrado!');</script>";
//        header("Location: sucesso.php");
    else:
        echo 'Erro: '. $e->getMessage();
    endif;

endif;

?>
