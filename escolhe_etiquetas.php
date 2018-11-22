<?php
session_start();
include("header.php");

if(isset($_POST['btn_etiqueta'])):

$idproduto = filter_input(INPUT_POST, "idproduto", FILTER_SANITIZE_MAGIC_QUOTES);

$cp->setIdproduto($idproduto);
?>

  <div class="content-wrapper">
    <div class="container-fluid">
    <div class="row">
            <?php foreach ($cp->Consulta_produto_etiqueta() as $dados) {?>

              <div class="etiqueta">
                <table>
                  <tbody>
                    <tr>
                      <th><img src="<?=$dados['barcode_img'];?>"/></th>
                      <td class="font_etiqueta_tamanho"><?=$dados['tamanho'];?></td>
                      <td><p class="text-center font_etiqueta">REF: <?=$dados['referencia'];?></p></td>
                    </tr>
                    <tr>
                      <th scope="row" colspan="3"><p class="numero_barcode"><?=$dados['barcode_num'];?></p></th>
                    </tr>
                    <tr>
                      <th scope="row" colspan="3" class="font_etiqueta"><?=$dados['tipo_full']." ".$dados['marca']." ".$dados['cor'];?></th>
                    </tr>
                  </tbody>
                </table>
              </div>
            <?php  }  ?>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
<?php
endif;
include("footer.php"); ?>
