<?php
session_start();
include("header.php");

QRcode::png('PHP QR Code :)', 'qrcodes_images/test.png', 'Q', 10, 2);

?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Blank Page</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>TESTE QRCODE</h1>
          <p> CONTEUDO: PHP QR CODE :)</p>
          <p> arquivo gerado: test.png</p>
          <p> ECC: Q</p>
          <p> Tamanho: 10x2</p>

          <img src="qrcodes_images/test.png">
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
<?php include("footer.php"); ?>
