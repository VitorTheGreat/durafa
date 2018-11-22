<?php
session_start();
include("header.php");

?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Produtos</li>
      </ol>

      <h1 class="text-center">Produtos</h1>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="display:none;" scope="col">ID</th>
                  <th scope="col">REF</th>
                  <th scope="col">Estoque</th>
                  <th scope="col">Quantidade</th>
                  <th style="display:none;" scope="col">QUANTIDADE</th>
                  <th scope="col">tamanho</th>
                  <!-- <th scope="col">barcode_num</th> -->
                  <th scope="col">marca</th>
                  <th scope="col">Preço</th>
                  <!-- <th scope="col">fornecedor</th> -->
                  <th scope="col">Tipo</th>
                  <th scope="col">cor</th>
                  <th scope="col">descricao</th>
                  <th scope="col">#</th>

                </tr>
              </thead>
              <tbody>


                  <?php foreach($cp->Consultar_produto_em_estoque() as $dados){?>
                            <tr>
                            <form method="post" action="etiquetas.php">
                              <!-- <td><?php //echo $dados['idproduto']; ?></td> -->
                              <td style="display:none;"><input type="hidden" name="idproduto" value="<?=$dados['idproduto'];?>"></td>
                              <td><?=$dados['referencia']; ?></td>
                              <td><?=$dados['nome_estoques']; ?></td>
                              <td><?=$dados['quantidade']; ?></td>
                              <td style="display:none;"><input type="hidden" name="quantidade" value="<?=$dados['quantidade'];?>"></td>
                              <td><?=$dados['tamanho']; ?></td>
                              <!-- <td><?php //echo $dados['barcode_num']; ?></td> -->
                              <td><?=$dados['marca']; ?></td>
                              <td><?=$dados['preco']; ?></td>
                              <!-- <td><?php //echo $dados['fornecedor']; ?></td> -->
                              <td><?=$dados['tipo_full']; ?></td>
                              <td><?=$dados['cor']; ?></td>
                              <td><?=$dados['descricao']; ?></td>
                              <td><button type="submit" class="btn btn-outline-dark btn-sm" name="btn_etiqueta"><i class="fa fa-tags"></i></button></td>
                            </form>
                            </tr>

                  <?php }  ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
      </div>
      <a class="btn btn-outline-danger" href="produtos_zero.php">Produtos em Falta</a>


    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
<?php include("footer.php"); ?>
