<?php
session_start();
session_destroy();

include "classes/Conexao.class.php";
include "classes/Loja.class.php";

$loja = new Loja;

$loja->setIp_loja($_SERVER['REMOTE_ADDR']);


foreach($loja->Pega_ip_loja() as $dados) {

}

//Se a sessão não for preenchida, se manter na pagina, caso contrario logar e ir para INDEX.PHP
if(isset($_SESSION['logado'])):
    header("Location: index.php");
else:
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Du Rafa Maneiro</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login - DuRafa Maneiro</div>
      <div class="card-body">

  <?php if(empty($loja->Pega_ip_loja())){ ?>
          <div class="alert alert-warning" role="alert">
            IP não registrado! - Contate um Administrador para registra-lo!
          </div>
  <?php
        }
        else{
  ?>
  <form method="post" action="modelo/loga_usuario.php">
    <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" type="email" aria-describedby="emailHelp" name="email" placeholder="Email" required autofocus>

          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" type="password" name="senha" placeholder="Senha" required>
            <p>Computador: <?php echo $dados['idloja'].' - '.$dados['nome_loja']; ?></p>
          </div>

          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>

          <button class="btn btn-primary btn-block" name="btn_entrar" type="submit">Login</button>
        </form>

  <?php
          }
  ?>
        <div class="text-center">
          <!-- <a class="d-block small mt-3" href="register.html">Register an Account</a> -->
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
<?php
	endif;
?>
