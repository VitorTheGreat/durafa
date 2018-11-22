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
        <li class="breadcrumb-item active">Tables</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Estoques</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <!-- <th scope="col">ID</th> -->
                  <th scope="col">Nome Estoque</th>
                  <th scope="col">Quantidade Produtos</th>
                  <th scope="col">#</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($ce->consulta_quantidade_produtos() as $dados){?>
                <tr>
                  <td><?php echo $dados['estoques']; ?></td>
                  <td><?php echo $dados['total_produtos']; ?></td>
                  <td><button class="btn btn-outline-info">Ver Estoque</button></td>

                </tr>
              <?php }?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
<?php include("footer.php"); ?>
