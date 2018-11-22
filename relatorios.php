<?php
session_start();
include("header.php");


foreach($cv->Total_venda_dia() as $total){
    
}
foreach($cv->Total_venda_mensal() as $total_mensal){
    
}

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
        
        
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#diario" aria-expanded="false" aria-controls="collapseExample">
    Relatório Diario
  </button>  
        
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#mensal" aria-expanded="false" aria-controls="collapseExample">
    Relatório Mensal
  </button>
        
<div class="collapse" id="diario">
  <div class="card card-body">
        
        
      <h1 class="text-center">Relatório Diário</h1>
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
  </div>
</div>

<div class="collapse" id="mensal">
  <div class="card card-body">
      <h1 class="text-center">Relatório Mensal</h1>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-body">
        <!-- Example DataTables Card-->

            <div class="table-responsive table-sm">
                <div class="alert alert-warning" role="alert">
                    <b>Mês: <?=$total_mensal['mes']; ?> Total Mês: R$<?=$total_mensal['total']; ?></b>
                </div>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <!-- <th scope="col">ID</th> -->
                    <th scope="col">Usuario</th>
                    <th scope="col">Loja</th>
                    <th scope="col">Data</th>
                    <th scope="col">Total</th>
                    <th scope="col">Total c/ Desconto</th>
                    <!-- <th scope="col">barcode_num</th> -->
                    <th scope="col">Valor Pago</th>
                    <th scope="col">Troco</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($cv->Relatorio_venda_mensal() as $geral){
                  ?>
                          <tr>
                            <!-- <td><?php //echo $dados['idproduto']; ?></td> -->
                            <td><?php echo $geral['usuario']; ?></td>
                            <td><?php echo $geral['loja']; ?></td>
                            <td><?php echo $geral['data_venda']; ?></td>
                            <td><?php echo $geral['total']; ?></td>
                            <td><?php echo $geral['preco_total_desconto']; ?></td>
                            <!-- <td><?php //echo $dados['barcode_num']; ?></td> -->
                            <td><?php echo $geral['valor_pago']; ?></td>
                            <td><?php echo $geral['troco']; ?></td>
                          </tr>
                <?php }

                    ?>
                </tbody>
              </table>
            </div>
        </div>
    </div>  
  </div>
</div>        
              
        
        
        
        
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
<?php include("footer.php"); ?>
