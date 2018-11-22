<?php
require_once "classes/Conexao.class.php";
require_once "classes/Usuario.class.php";
require_once "classes/Fornecedor.class.php";
require_once "classes/Estoque.class.php";
require_once "classes/Cor.class.php";
require_once "classes/Tipo.class.php";
require_once "classes/Loja.class.php";
require_once "classes/Tamanho.class.php";
require_once "classes/Produto.class.php";
require_once "classes/Referencia.class.php";
require_once "classes/Venda.class.php";
// require_once "qrcode/phpqrcode.php";
include "qrcode/qrlib.php";
//require_once "classes/Produto.class.php";

// OBJETOS PARA Consultar
$ce = new Estoque;
$cf = new Fornecedor;
$cc = new Cor;
$ct = new Tipo;
$cl = new Loja;
$cta = new Tamanho;
$cp = new Produto;
$cr = new Referencia;
$cu = new Usuario;
$cv = new Venda;
// //função deslogar
// if(isset($_POST['btn_sair'])):
//         Usuario::deslogar();
// endif;

//verificação da sessão
if(isset($_SESSION['logado'])):
?>
<!DOCTYPE html>
<html lang="pt">

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
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Du Rafa Maneiro</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Home</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="produtos.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Produtos</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="fornecedores.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Fornecedores</span>
          </a>
        </li>
<!--         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Example Pages</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="login.php">Login Page</a>
            </li>
            <li>
              <a href="register.php">Registration Page</a>
            </li>
            <li>
              <a href="forgot-password.php">Forgot Password Page</a>
            </li>
            <li>
              <a href="blank.php">Blank Page</a>
            </li>
            <li>
              <a href="tables.php">Tables Page</a>
            </li>
            <li>
              <a href="charts.php">Charts Page</a>
            </li>
            <li>
              <a href="qrcode/index.php">QR Code</a>
            </li>
            <li>
              <a href="testeqrcode.php">Teste QR Code</a>
            </li>
            <li>
              <a href="etiquetas.php">Teste Etiquetas</a>
            </li>
          </ul>
        </li> -->
<!--         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Link</span>
          </a>
        </li> -->
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <!-- SEARCH BOX -->
        <!-- <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-user"></i><?php echo $_SESSION['usuario'].' - '.$_SESSION['nome_loja']; ?></a>
        </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-fw fa-sign-out"></i>Logout</a>
          </li>
      </ul>
    </div>
  </nav>
  <?php
  	else:
  		header("Location: login.php");
  	endif;
  ?>
