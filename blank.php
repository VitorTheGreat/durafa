<?php
session_start();
include("header.php");?>

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
          <h1>Blank</h1>
          <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>
          <p>TESTE MATRIZ -- </p>
          <!-- <?php
          $produto = array
            (
            array(1,31,5),
            array(1,32,10),
            array(1,33,1),
            array(1,44,12),
            );
            // var_dump($produto);
            // echo "Linhas: " . count($matriz) . " x Colunas: " . count($matriz[0]); -- CONTA LINHAS E COLUNAS DA MATRIZ


            for ($row = 0; $row < count($produto); $row++) {
              // echo "<p><b>Row number $row</b></p>";
              echo "<ul>";
              for ($col = 0; $col < count($produto[0]); $col++) {
                echo "<li>".$produto[$row][$col]."</li>";
              }
              echo "</ul>";
            }

            echo "ID_PRODUTO: ".$produto[0][0]." TAMANHO: ".$produto[0][1]." QUANTIDADE :".$produto[0][2]."<br>";
            echo "ID_PRODUTO: ".$produto[1][0]." TAMANHO: ".$produto[1][1]." QUANTIDADE :".$produto[1][2]."<br>";
            echo "ID_PRODUTO: ".$produto[2][0]." TAMANHO: ".$produto[2][1]." QUANTIDADE :".$produto[2][2]."<br>";
            echo "ID_PRODUTO: ".$produto[3][0]." TAMANHO: ".$produto[3][1]." QUANTIDADE :".$produto[3][2]."<br>";
          ?> -->

          <div class="form-row">

            <form method="post" action="teste.php">
            <div class="col-md-6">
                <label for="exampleInputEmail1">Tamanho</label>
              <div class="input-group input-group-sm mb-3">
              <?php foreach($cta->Consultar() as $dados){?>
                <div class="input-group-prepend">
                  <input name="idtamanho[]" value="<?php echo $dados['idtamanho']; ?>" hidden>
                  <span class="input-group-text"><?php echo $dados['tamanho']; ?></span>
                </div>
                  <input type="number" name="quantidade[]" class="form-control" aria-label="Small" placeholder="QTD" aria-describedby="inputGroup-sizing-sm">
                <?php }?>
                <button type="submit" class="btn btn-primary" name="btn_cadastra_tamanho">
                  Enviar
                </button>
              </div>


          </div>
          </form>
        </div>


        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
<?php include("footer.php"); ?>
