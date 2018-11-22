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
        <h1>Excluir</h1>
        <p>Pagina para Excluir informações</p>
      </div>
    </div>
  </div>

<!-- / COMEÇA CADASTRO FORNECEDOR -->
<div class="col-xl-12 col-sm-6 mb-5">
    <div class="card mx-auto mt-5">
      <div class="card-header">Excluir Fornecedor</div>
      <div class="card-body">
        <form method="post" action="modelo/excluir_fornecedor.php">
          <div class="form-group">
            <div class="form-row">
              <label class="col-md-4 control-label" for="idAdmin">Fornecedor</label>
              <div class="col-md-12">
                <select name="select_nome_fornecedor" class="form-control">
                    <?php foreach($cf->Consultar_fornecedor() as $dados){?>
                  <option value="<?php echo $dados['cnpj']; ?>"><?php echo $dados['nome']; ?></option>
                    <?php }?>
                </select>
              </div>
            </div>
          </div>
          <button class="btn btn-danger btn-block" name="btn_exclui" type="submit">Excluir Fornecedor</button>
        </form>
      </div>
    </div>
</div>
<!-- /.TERMINA CADASTRO FORNECEDOR -->

<!-- / COMEÇA CADASTRO PRODUTO -->
<div class="col-xl-12 col-sm-6 mb-5">
    <div class="card mx-auto mt-5">
      <div class="card-header">Excluir Produto</div>
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
          <a class="btn btn-danger btn-block" href="login.html">Excluir Produto</a>
        </form>
      </div>
    </div>
</div>
<!-- /.TERMINA CADASTRO PRODUTO -->

<!-- / COMEÇA CADASTRO LOJA -->
<div class="col-xl-12 col-sm-6 mb-5">
    <div class="card mx-auto mt-5">
      <div class="card-header">Excluir Loja</div>
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
          <a class="btn btn-danger btn-block" href="login.html">Excluir Loja</a>
        </form>
      </div>
    </div>
</div>
<!-- /.TERMINA CADASTRO LOJA -->

<!-- / COMEÇA CADASTRO USUARIO -->
<div class="col-xl-12 col-sm-6 mb-5">
    <div class="card mx-auto mt-5">
      <div class="card-header">Excluir Usuario</div>
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
          <a class="btn btn-danger btn-block" href="login.html">Excluir Usuario</a>
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
