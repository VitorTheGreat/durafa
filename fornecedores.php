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
          <i class="fa fa-table"></i> Fornecedores</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <!-- <th scope="col">ID</th> -->
                  <th scope="col">Nome</th>
                  <th scope="col">CNPJ</th>
                  <th scope="col">TELEFONE</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Endereço</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($cf->Consultar_fornecedor() as $dados){?>
                <tr>
                  <!-- <td><?php //echo $dados['idproduto']; ?></td> -->
                  <td><?php echo $dados['nome']; ?></td>
                  <td><?php echo $dados['cnpj']; ?></td>
                  <td><?php echo $dados['telefone']; ?></td>
                  <td><?php echo $dados['email']; ?></td>
                  <td><?php echo $dados['endereco']; ?></td>
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
