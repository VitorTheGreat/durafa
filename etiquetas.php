<?php
session_start();
include("header.php");

if(isset($_POST['btn_etiqueta'])):

$idproduto = filter_input(INPUT_POST, "idproduto", FILTER_SANITIZE_MAGIC_QUOTES);

$cp->setIdproduto($idproduto);


?>

  <div class="content-wrapper">
    <div class="container-fluid">
<div class="noprint">
      <h2>Escolha quais etiquetas Imprimir</h2>
      <?php
        $b = 1;
        while ($b <= 18) {
      ?>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="check<?=$b;?>">
          <label class="form-check-label" for="inlineCheckbox1"><?=$b;?></label>
        </div>
        <?php
          $b++;
            }
        ?>
      <hr>
</div>

    <div class="row">
          <?php
            $a = 1;
            while ($a <= 18) {
          ?>

            <?php foreach ($cp->Consulta_produto_etiqueta() as $dados) {
              $dir = 'qrcode_images/'.$dados['barcode_num'].'.png';
              QRcode::png($dados['barcode_num'], $dir, 'Q', 4, 2);
            ?>
                
            <div class="etiqueta-correction">
              <div class="etiqueta" name="<?=$a;?>">
                <table>
                  <tbody>
                    <tr>
                      <th><img class="img-responsive" src="<?=$dados['barcode_img'];?>"/></th>
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
            </div>
            <?php  }  ?>

          <?php
            $a++;
              }
        
          ?>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
<?php
endif;
include("footer.php"); ?>
