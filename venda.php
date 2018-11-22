<?php
session_start();
include("header.php");

$cv->setIdvenda($_SESSION['idvenda']);

//variavel total (total da compra) vai aqui para não mostrar erro de undefined variable para o usuario
$total = 0;

if(empty($_SESSION['idvenda'])){
  echo "<script>window.location='index.php';alert('Para acessar, abra uma venda na página principal');</script>";
}
else{
?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Vendas</li>
    </ol>
    <div class="row">
      <div class="col-12">
        <h1 class="text-center">Venda</h1>
        <!-- <p>Aqui você fará Vendas</p> -->


    <div class="col-xl-12 col-sm-6 mb-5">

      <p>ID VENDA: <?php echo $_SESSION['idvenda']; ?> </p>

              <p><b>Produto cadastrado</b></p>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-3">
                    <form method="post" action="modelo/insere_itenvenda.php">
                      <label for="exampleInputName">Código do Produto</label>
                      <input autofocus type="number" placeholder="Código" class="form-control" list="lista_produto" name="barcode_num">
                      <datalist id="lista_produto">
                        <?php foreach($cp->Consultar_venda() as $dados){?>
                          <option value="<?php echo $dados['barcode_num']; ?>" />
                        <?php }?>
                      </datalist>
                    </div>
                    <div class="col-md-3">
                      <label for="exampleInputName">Quantidade</label>
                      <input placeholder="Quantidade" type="number" value="1" class="form-control" name="quantidade">
                    </div>
                    <div class="button-down col-md-6">
                      <button class="btn btn-primary " name="btn_insere_item" type="submit">Inserir</button>
                    </div>
                  </form>
                </div>
              </div>

              <p><b>Produto não cadastrado</b></p>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-3">
                    <form method="post" action="modelo/insere_item_avulso.php">
                      <label for="exampleInputName">Descrição</label>
                      <input type="text" placeholder="Descrição" class="form-control" list="lista_produto" name="descricao" required>
                    </div>
                    <div class="col-md-3">
                      <label for="exampleInputName">Marca</label>
                      <input placeholder="Marca" type="text" class="form-control" name="marca" required>
                    </div>
                    <div class="col-md-3">
                      <label for="exampleInputName">Preço Venda</label>
                      <input placeholder="Preço Venda" type="text" class="form-control" name="preco" required>
                    </div>
                    <div class="col-md-1">
                      <label for="exampleInputName">Quantidade</label>
                      <input placeholder="QTD" type="number" class="form-control" name="quantidade" required value="1">
                    </div>
                    <div class="button-down col-md-6">
                      <button class="btn btn-primary " name="btn_insere_item" type="submit">Inserir</button>
                    </div>
                  </form>
                </div>
              </div>

              <p>Itens de venda</p>

              <!-- COMEÇA LISTA ITENS AVULSOS -->
              <div class="table-responsive table-sm">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Descrição</th>
                      <th>Marca</th>
                      <th>Preço Unitário</th>
                      <th>Quantidade</th>
                      <th>Preço Total</th>
                      <th>Excluir</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php

                      if(empty($cv->Consulta_itensvenda_avulsa())) {?>
                        <div class="alert alert-info" role="alert">
                          Insira um Item sem cadastro!
                        </div>

                    <?php }
                      else{

                      foreach ($cv->Consulta_itensvenda_avulsa() as $dados) {

                        $total += $dados['sub_total'];

                     ?>
                    <tr>
                      <form action="modelo/delete_itenvenda_avulso.php" method="post">
                      <input type="hidden" name="iditem_avulso" value="<?=$dados['iditem_avulso'];?>">
                      <td><?=$dados['descricao']; ?></td>
                      <td><?=$dados['marca'];?></td>
                      <td><?=$dados['preco']; ?></td>
                      <td><?=$dados['quantidade']; ?></td>
                      <td><?=$dados['sub_total'];?></td>
                      <td><button type="submit" name="btn_exclui_item" class="btn btn-danger">-</button></td>
                    </form>
                    </tr>

            </table>
                  <?php }
                    } ?>
<!-- TERMINA LISTA DE VENDAS AVULSOS -->

<!-- COMEÇA LISTA DE ITENS CADASTRADOS -->

              <div class="table-responsive table-sm">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Código do Produto</th>
                      <th>Produto</th>
                      <th>Preço Unitário</th>
                      <th>Quantidade</th>
                      <th>Preço Total</th>
                      <th>Excluir</th>
                    </tr>
                  </thead>

                  <tbody>

                    <?php

                      if(empty($cv->Consulta_itensvenda())) {?>
                        <div class="alert alert-info" role="alert">
                          Insira um Item para venda cadastrado!
                        </div>

                    <?php }
                      else{

                      foreach ($cv->Consulta_itensvenda() as $dados) {

                        $total += $dados['sub_total_produto'];

                     ?>
                    <tr>
                      <form action="modelo/delete_itenvenda.php" method="post">
                      <input type="hidden" name="barcode_num" value="<?=$dados['barcode_num']; ?>">
                      <td><?=$dados['barcode_num']; ?></td>
                      <td><?=$dados['descricao'];?></td>
                      <td><?=$dados['preco_venda']; ?></td>
                      <td><?=$dados['quantidade']; ?></td>
                      <td><?=$dados['sub_total_produto'];?></td>
                      <td><button type="submit" name="btn_exclui_item" class="btn btn-danger">-</button></td>
                    </form>
                    </tr>
                  <?php }
                    } ?>
                    <!-- TERMINA LISTA DE VENDAS DE ITENS CADASTRADOS -->
                    <tr>
                      <td class="text-center" colspan="5"> ------------ // ------------ </td>
                    </tr>
                    <form action="modelo/fecha_venda.php" method="post">
                        <tr>
                          <td colspan="2"></td>
                          <th colspan="2">Modo Pagamento</th>
                          <th>
                            <select class="custom-select" name="metodo_pagamento" >
                              <option value="Cartão de Crédito">Cartão de Crédito</option>
                              <option value="Cartão de Crédito 2x">Cartão de Crédito 2x</option>
                              <option value="Cartão de Crédito 3x">Cartão de Crédito 3x</option>
                              <option value="Cartão de Débito">Cartão de Débito</option>
                              <option value="Dinheiro">Dinheiro</option>
                            </select>
                          </th>
                        </tr>
                        <tr>
                          <td colspan="2"></td>
                          <th colspan="2">SubTotal</th>
                          <input type="hidden" name="sub_total" value="<?=$total;?>" id="subtotal">
                          <th><?=$total; ?></th>
                        </tr>
                        <tr>
                          <td colspan="2"></td>
                          <th colspan="2">Desconto (digite o valor)
                          </th>
                          <th>
                            <div class="input-group">
                                <input type="hidden" name="desconto" id="desconto">
                                <input disabled placeholder="Dinheiro" class="col-md-3 form-control" id="mostra_desconto">
                                <input placeholder="Porcentagem"  class="col-md-3 form-control" type="number" name="desconto_porcentagem" id="desconto_porcentagem">
                              </div>
                            <button type="button" onclick="calcula_desconto_porcentagem()" class="btn btn-info btn-sm">Calcular</button>
                          </th>

                          <tr>
                            <td colspan="2"></td>
                            <th colspan="2">Total</th>
                            <input type="hidden" name="total_desconto" id="total_desconto">
                            <th><div id="mostra_total"></div></th>
                          </tr>

                          <tr>
                            <td colspan="2"></td>
                            <th colspan="2">Valor Pago</th>
                            <th>
                              <input placeholder="Valor Pago" class="form-control" name="valor_pago" id="valor_pago">
                              <button type="button" onclick="calcula_troco()" class="btn btn-info btn-sm">Calcular</button>
                            </th>
                          </tr>
                          <tr>
                            <td colspan="2"></td>
                            <th colspan="2">Troco</th>
                            <input type="hidden" name="troco" id="troco">
                            <th><div id="mostra_troco"></div></th>
                          </tr>
                        </tr>
                      </tbody>

                    </table>
                  </div>

                      <button class="btn btn-danger" name="btn_fecha_venda" type="submit">Cancelar</button>
                      <button class="btn btn-primary" name="btn_conclui_venda" type="submit">Concluir</button>

                  </form>
        </div>
    </div>







      </div>
    </div>
  </div>
  <!-- /.container-fluid-->
  <!-- /.content-wrapper-->
<?php

include("footer.php");

}

?>
