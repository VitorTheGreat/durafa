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
        <h1>Alterar</h1>
        <p>Pagina para Alterar Informações</p>
      </div>
    </div>
  </div>

<!-- / COMEÇA CADASTRO FORNECEDOR -->
<div class="col-xl-12 col-sm-6 mb-5">
    <div class="card mx-auto mt-5">
      <div class="card-header">Alterar Fornecedor</div>
      <div class="card-body">
        <form method="post" action="modelo/alterar_fornecedor.php">

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">Fornecedor</label>
                <select id="idAdmin" name="select_nome_fornecedor" class="form-control">
                    <?php foreach($cf->Consultar_fornecedor() as $dados){?>
                  <option value="<?php echo $dados['cnpj']; ?>"><?php echo $dados['nome']; ?></option>
                    <?php }?>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Novo Nome</label>
                <input name="nome" type="text" placeholder="Nome" class="form-control input-md" required="">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">CNPJ</label>
                <input name="cnpj" type="text" placeholder="CNPJ" class="form-control input-md" required="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputEmail">E-mail</label>
                <input name="email" type="text" placeholder="E-mail" class="form-control input-md" required="">
              </div>
              <div class="col-md-6">
                <label for="exampleInputEmail1">Telefone</label>
                <input name="telefone" type="text" placeholder="Telefone" class="form-control input-md" required="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleConfirmPassword">Endereço</label>
                <input name="endereco" type="text" placeholder="Endereço" class="form-control input-md" required="">
              </div>
            </div>
          </div>
          <button class="btn btn-warning btn-block" name="btn_altera" type="submit">Alterar Fornecedor</button>
        </form>

      </div>
    </div>
</div>
<!-- /.TERMINA CADASTRO FORNECEDOR -->

<!-- / COMEÇA CADASTRO PRODUTO -->
<div class="col-xl-12 col-sm-6 mb-5">
    <div class="card mx-auto mt-5">
      <div class="card-header">Alterar Produto</div>
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
          <a class="btn btn-warning btn-block" href="login.html">Alterar Produto</a>
        </form>
      </div>
    </div>
</div>
<!-- /.TERMINA CADASTRO PRODUTO -->

<!-- / COMEÇA CADASTRO LOJA -->
<div class="col-xl-12 col-sm-6 mb-5">
    <div class="card mx-auto mt-5">
      <div class="card-header">Alterar Loja</div>
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
          <a class="btn btn-warning btn-block" href="login.html">Alterar Loja</a>
        </form>
      </div>
    </div>
</div>
<!-- /.TERMINA CADASTRO LOJA -->

<!-- / COMEÇA CADASTRO USUARIO -->
<div class="col-xl-12 col-sm-6 mb-5">
    <div class="card mx-auto mt-5">
      <div class="card-header">Alterar Usuario</div>
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
          <a class="btn btn-warning btn-block" href="login.html">Alterar Usuario</a>
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
