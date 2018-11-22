<?php
//inicia sessão
session_start();

//chama os arquivos apenas uma vez
require_once "../classes/Conexao.class.php";
require_once "../classes/Produto.class.php";
require_once "../classes/Estoque.class.php";
require_once "../classes/Referencia.class.php";
require_once "../classes/Cor.class.php";
require_once "../classes/Tipo.class.php";
require_once "../qrcode/qrlib.php";

//condição para fazer login
//pega o valor do botão
if(isset($_POST['btn_cadastra'])):

    //pega variaveis dos inputs (não entendi muito bem o porque tudo isso)
    $marca = filter_input(INPUT_POST, "marca", FILTER_SANITIZE_MAGIC_QUOTES);
    $precocompra = filter_input(INPUT_POST, "preco_compra", FILTER_SANITIZE_MAGIC_QUOTES);
    $precovenda = filter_input(INPUT_POST, "preco_venda", FILTER_SANITIZE_MAGIC_QUOTES);
    $id_fornecedor = filter_input(INPUT_POST, "id_fornecedor", FILTER_SANITIZE_MAGIC_QUOTES);
    $id_tipo = filter_input(INPUT_POST, "id_tipo", FILTER_SANITIZE_MAGIC_QUOTES);
    $cor = filter_input(INPUT_POST, "cor", FILTER_SANITIZE_MAGIC_QUOTES);
    $descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_MAGIC_QUOTES);
    $referencia = filter_input(INPUT_POST, "referencia", FILTER_SANITIZE_MAGIC_QUOTES);
    //VETOR PARA ARMAZENAR VARIOS TAMANHOS PARA SEREM INSERIDOS DE UMA SÓ VEZ
    $idtamanho = $_POST['idtamanho'];
    // ------------------ // ---------------- //
    // Insere na tabela ESTOQUES e QUANTIDADE_ESTOQUE
    $id_estoques = filter_input(INPUT_POST, "id_estoques", FILTER_SANITIZE_MAGIC_QUOTES);
    //VETOR PARA ARMAZENAR QUANTIDADES DE VARIOS TAMANHOS PARA SEREM INSERIDOS DE UMA SÓ VEZ
    $quantidade = $_POST['quantidade'];


    //cria objeto
    $p = new Produto;
    $e = new Estoque;
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

 foreach($c->Consultar_id_cor() as $id_cor){
        // echo 'idcor - '.$id_cor['idcor'];
 }

// echo 'idreferencia - '.$id_referencia['idreferencia']."<br>";
// echo 'idcor - '.$id_cor['idcor']."<br>";
// echo 'iddescricao - '.$id_descricao['iddescricao']."<br>";

// -------------------- // TERMINA pega id dos datalists ----------- //

    //Cadastra
  foreach(array_combine($idtamanho, $quantidade) as $idtamanho => $n){

    //determina o valor recebido dos inputs para as propriedades
      $p->setMarca($marca);
      $p->setPrecocompra($precocompra);
      $p->setPrecovenda($precovenda);
      $p->setId_referencia($id_referencia['idreferencia']);
      $p->setId_fornecedor($id_fornecedor);
      $p->setId_tipo($id_tipo);
      $p->setId_cor($id_cor['idcor']);
      $p->setDescricao($descricao);
      $p->setId_tamanho($idtamanho);
      $p->setId_estoques($id_estoques);

        if($p->Cadastrar()){

          foreach($p->Consultar_id_ult_produto() as $idproduto){
            // QRcode::png('PHP QR Code :)', 'qrcodes_images/test.png', 'Q', 10, 2);
            $dir = '../qrcode_images/'.$idproduto['idproduto'].$idtamanho.'.png';
            QRcode::png($idproduto['idproduto'].$idtamanho, $dir, 'Q', 6, 2);
            $barcode_img = 'qrcode_images/'.$idproduto['idproduto'].$idtamanho.'.png';
            $barcode_num = $idproduto['idproduto'].$idtamanho;
            //cria objeto - para Alterar
            $p->setBarcode_img($barcode_img);
            $p->setBarcode_num($barcode_num);
            $p->setIdproduto($idproduto['idproduto']);

            if($p->Insere_barcode()){
                // TESTE PARA VER SE VARIAVEIS ESTÃO RECEBENDO VALORES CORRETOS
                // echo "id tamanho: ".$idtamanho." - Quantidade: ".$n."<br />";
                // echo "Id estoque: ".$id_estoques."<br>";
                // echo "Id produto: ".$idproduto['idproduto']."<br>";
                // ---------------------------------------//------------------

                $e->setQuantidade($n);
                $e->setId_produto($idproduto['idproduto']);

                if($e->Cadastrar_quantidade()){
                  echo "<script>window.location='../cadastro.php';alert('Cadastro Realizado com Sucesso');</script>";
                }
                else{
                  echo 'Erro CADASTRAR QUANTIDADE EM CONTROLE_ESTOQUE: '. $e->getMessage();
                }
            }
            else{
              echo 'Erro ALTERAR PRODUTO/INSERIR BARCODE: '. $e->getMessage();
            }
          }
        }
      else{
          echo 'Erro CADASTRAR PRODUTO: '. $e->getMessage();
      }
    }
endif;


?>
