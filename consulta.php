<?php
session_start();
include("header.php");

if($_SESSION['idhierarquia'] == 1){
?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Blank Page</li>
    </ol>
    <div class="row">
      <div class="col-12">
        <h1>Consulta</h1>
        <p>Pagina de Consulta</p>
      </div>
    </div>
  </div>

<!-- / COMEÇA CADASTRO FORNECEDOR -->
<div class="col-xl-12 col-sm-6 mb-5">
    <div class="card mx-auto mt-5">
      <div class="card-header">Consultar Fornecedor</div>
      <div class="card-body">
        <form method="post" action="modelo/consultar_fornecedor.php">
          <div class="form-group">
            <div class="form-row">
            <label for="Fornecedor">Fornecedor</label>
            <div class="col-md-12">
              <select name="select_nome_fornecedor" class="form-control">
                  <?php foreach($cf->Consultar() as $dados){?>
                <option value="<?php echo $dados['cnpj']; ?>"><?php echo $dados['nome']; ?></option>
                  <?php }?>
              </select>
            </div>
          </div>
          </div>
          <button name="btn_consulta" class="btn btn-outline-info btn-block" type="submit">Consultar Fornecedor</button>
        </form>
      </div>
    </div>
</div>
<!-- /.TERMINA CADASTRO FORNECEDOR -->

<!-- / COMEÇA CADASTRO PRODUTO -->
<div class="col-xl-12 col-sm-6 mb-5">
    <div class="card mx-auto mt-5">
      <div class="card-header">Consultar Produto</div>
      <div class="card-body">

              <form method="post" action="modelo/consultar_produto_refe.php">
                <div class="form-group">
                  <div class="form-row">

                    <div class="col-md-6">
                      <label for="exampleInputName">Referência</label>
                        <input name="referencia" type="text" placeholder="Referencia" class="form-control input-md">
                    </div>

                  </div>
                </div>
                <button type="submit" class="btn btn-outline-info btn-lg btn-block" name="btn_consulta_produto">Checar Referência</button>
              </form>

               <br>

              <form method="post" action="modelo/consultar_produto_descr.php">
                <div class="form-group">
                  <div class="form-row">

                    <div class="col-md-6">
                      <label for="exampleInputLastName">Descrição</label>
                      <input class="form-control" name="descricao" type="text" aria-describedby="nameHelp" placeholder="Descrição">
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-outline-info btn-lg btn-block" name="btn_consulta_produto">Checar Descrição</button>
              </form>



      </div>
    </div>
</div>
<!-- /.TERMINA CADASTRO PRODUTO -->

<!-- / COMEÇA CADASTRO LOJA -->
<div class="col-xl-12 col-sm-6 mb-5">
    <div class="card mx-auto mt-5">
      <div class="card-header">Consultar Loja</div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">First name</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter first name">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Last name</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" placeholder="Enter last name">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input class="form-control" id="exampleConfirmPassword" type="password" placeholder="Confirm password">
              </div>
            </div>
          </div>
          <a class="btn btn-info btn-block" href="login.html">Consultar Loja</a>
        </form>
      </div>
    </div>
</div>
<!-- /.TERMINA CADASTRO LOJA -->

<!-- / COMEÇA CADASTRO USUARIO -->
<div class="col-xl-12 col-sm-6 mb-5">
    <div class="card mx-auto mt-5">
      <div class="card-header">Consultar Usuario</div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">First name</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter first name">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Last name</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" placeholder="Enter last name">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input class="form-control" id="exampleConfirmPassword" type="password" placeholder="Confirm password">
              </div>
            </div>
          </div>
          <a class="btn btn-info btn-block" href="login.html">Consultar Usuario</a>
        </form>
      </div>
    </div>
</div>
<!-- /.TERMINA CADASTRO USUARIO -->


  <!-- /.container-fluid-->
  <!-- /.content-wrapper-->
<?php
}
else{
    header("Location: index.php");
}
include("footer.php");
?>
