<?php
session_start();
include("header.php");
?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <?php if($_SESSION['idhierarquia'] == 1){?>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-align-left"></i>
              </div>
              <div class="mr-5">Cadastrar</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="cadastro.php">
              <span class="float-left">Clique</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
          
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-pencil"></i>
              </div>
              <div class="mr-5">Editar Produtos</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="editar_produto.php">
              <span class="float-left">Clique</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
          
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-calendar-minus-o"></i>
              </div>
              <div class="mr-5">Excluir Produtos</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="excluir_produto.php">
              <span class="float-left">Clique</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
          
<!--
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">Alterar</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="altera.php">
              <span class="float-left">Clique</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
-->
          
          
        <!-- <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-info o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">Consultar</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="consulta.php">
              <span class="float-left">Clique</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div> -->
          
<!--
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-trash"></i>
              </div>
              <div class="mr-5">Excluir</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="exclui.php">
              <span class="float-left">Clique</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
-->
          
        <div class="col-xl-3 col-sm-6 mb-3">
        <form method="post" action="modelo/abre_venda.php">
          <div class="card text-white bg-secondary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-money"></i>
              </div>
              <div class="mr-5">Vender</div>
            </div>
              <button type="submit" name="btn_abre_venda" class="card-footer text-white clearfix small z-1" data-toggle="collapse">
                <span class="float-left">Vender</span>
              </button>
          </div>
            </form>
        </div>
          
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-dollar"></i>
              </div>
              <div class="mr-5">Relatório de Vendas</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="relatorios.php">
              <span class="float-left">Clique</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>


        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-info o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-archive"></i>
              </div>
              <div class="mr-5">Estoques</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="estoques.php">
              <span class="float-left">Clique</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
<hr>
<h1>Relatório de Vendas do Dia</h1>
<br>
<?php
foreach($cv->Total_venda_dia() as $total){
    
}
?>

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-body">
        <!-- Example DataTables Card-->

            <div class="table-responsive table-sm">
                <div class="alert alert-warning" role="alert">
                   <b> Data: <?=$total['data_venda']; ?> Total Dia: R$<?=$total['total']; ?></b>
                </div>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <!-- <th scope="col">ID</th> -->
                    <th scope="col">Usuario</th>
                    <th scope="col">Loja</th>
                    <th scope="col">Data</th>
                    <th scope="col">Total</th>
                    <th scope="col">Total c/ Desconto (Valor Final)</th>
                    <!-- <th scope="col">barcode_num</th> -->
                    <th scope="col">Valor Pago</th>
                    <th scope="col">Troco</th>
                  </tr>
                </thead>
                <tbody>
                    
                <?php

                      if(empty($cv->Relatorio_diario_venda())){ ?>
                        <div class="alert alert-info" role="alert">
                          Nenhuma venda Realizada hoje. 
                        </div>
                <?php    
                     }
                
                      
                else{    
                    
                 foreach($cv->Relatorio_diario_venda() as $dados){
                  ?>
                          <tr>
                            <!-- <td><?php //echo $dados['idproduto']; ?></td> -->
                            <td><?php echo $dados['usuario']; ?></td>
                            <td><?php echo $dados['loja']; ?></td>
                            <td><?php echo $dados['data_venda']; ?></td>
                            <td><?php echo $dados['total']; ?></td>
                            <td><?php echo $dados['preco_total_desconto']; ?></td>
                            <!-- <td><?php //echo $dados['barcode_num']; ?></td> -->
                            <td><?php echo $dados['valor_pago']; ?></td>
                            <td><?php echo $dados['troco']; ?></td>
                          </tr>
                <?php }
                      }
                    ?>
                </tbody>
              </table>
            </div>
        </div>
    </div>



<?php }else{?>
        
<!--
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-secondary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5">Transferir</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="transferi.php">
              <span class="float-left">Clique</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
-->
          
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-secondary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-money"></i>
              </div>
              <div class="mr-5">Vendas</div>
            </div>
            <form method="post" action="modelo/abre_venda.php">
              <button type="submit" name="btn_abre_venda" class="card-footer text-white clearfix small z-1" data-toggle="collapse">
                <span class="float-left">Vender</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </button>
            </form>
          </div>
        </div>
    


        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-info o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-archive"></i>
              </div>
              <div class="mr-5">Estoques</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="estoques.php">
              <span class="float-left">Clique</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
        

      <hr>
        <!-- Example DataTables Card-->

            <div class="table-responsive table-sm">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <!-- <th scope="col">ID</th> -->
                    <th scope="col">REFERÊNCIA</th>
                    <th scope="col">Estoque</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">tamanho</th>
                    <!-- <th scope="col">barcode_num</th> -->
                    <th scope="col">marca</th>
                    <th scope="col">Preço</th>
                    <!-- <th scope="col">fornecedor</th> -->
                    <th scope="col">Tipo</th>
                    <th scope="col">cor</th>
                    <th scope="col">descricao</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($cp->Consultar_produto_em_estoque() as $dados){
                  ?>
                          <tr>
                            <!-- <td><?php //echo $dados['idproduto']; ?></td> -->
                            <td><?php echo $dados['referencia']; ?></td>
                            <td><?php echo $dados['nome_estoques']; ?></td>
                            <td><?php echo $dados['quantidade']; ?></td>
                            <td><?php echo $dados['tamanho']; ?></td>
                            <!-- <td><?php //echo $dados['barcode_num']; ?></td> -->
                            <td><?php echo $dados['marca']; ?></td>
                            <td><?php echo $dados['preco']; ?></td>
                            <!-- <td><?php //echo $dados['fornecedor']; ?></td> -->
                            <td><?php echo $dados['tipo_full']; ?></td>
                            <td><?php echo $dados['cor']; ?></td>
                            <td><?php echo $dados['descricao']; ?></td>
                          </tr>
                <?php }

                    ?>
                </tbody>
              </table>
            </div>




      <?php } ?>

<?php include("footer.php"); ?>
