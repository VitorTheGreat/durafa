<?php
session_start();
include("header.php");

if(isset($_POST['btn_edita'])):

$idproduto = filter_input(INPUT_POST, "idproduto", FILTER_SANITIZE_MAGIC_QUOTES);

$cp->setIdproduto($idproduto);

?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <h2>Edição do Produto</h2>
        <hr>
        
        
        
        <div class="col-xl-12 col-sm-6 mb-5" id="produto">
        <div class="alert alert-danger" role="alert">
          Lembre-se de Escolher novamente:<br>
          -TIPO<br>
          -FORNECEDOR<br>
          -ESTOQUE
        </div>
    <div class="card mx-auto mt-5">
      <div class="card-header">Alterar Produto</div>
      <div class="card-body">

<?php 
          foreach($cp->Consulta_produto_altera() as $produto){
    
          }
?>
        <form method="post" action="modelo/alterar_produto.php">
            <input name="idproduto" value="<?=$idproduto?>" hidden />
          <div class="form-group">
            <div class="form-row">

              <div class="col-md-3">
                <label for="exampleInputName">Referência</label>
                <input placeholder="Referencia" class="form-control" list="lista_referencia" name="referencia" value="<?=$produto['referencia'];?>">
                <datalist id="lista_referencia">
                  <?php foreach($cr->Consultar() as $dados){?>
                    <option value="<?php echo $dados['referencia']; ?>" />
                  <?php }?>
                </datalist>
              </div>

              <div class="col-md-3">
                <label for="exampleInputName">Marca</label>
                  <input name="marca" type="text" placeholder="Marca" class="form-control input-md" required="" value="<?=$produto['marca'];?>">
              </div>


              <div class="col-md-6">
                <label for="exampleConfirmPassword">Cor</label>
                <input placeholder="Cor" class="form-control" list="lista_cor" name="cor" value="<?=$produto['cor'];?>">
                <datalist id="lista_cor">
                  <?php foreach($cc->Consultar() as $dados){?>
                    <option value="<?php echo $dados['nome']; ?>" />
                  <?php }?>
                </datalist>
              </div>



          </div>
        </div>

          <div class="form-group">
            <div class="form-row">

              <div class="col-md-6">
                <label for="exampleInputEmail1">Tipo</label>
                  <select name="id_tipo" class="form-control" >
                    <?php foreach($ct->Consultar() as $dados){?>
                  <option value="<?php echo $dados['idtipo']; ?>"><?php echo $dados['tipo_full']; ?></option>
                    <?php }?>
                  </select>
              </div>



              <div class="col-md-6">

                <label for="exampleInputPassword1">Descrição</label>
                  <input name="descricao" type="text" placeholder="Descrição" class="form-control input-md" required="" value="<?=$produto['descricao'];?>">
              </div>


            </div>
          </div>

            <div class="form-group">
              <div class="form-row">
              <div class="col-md-3">
                <label for="exampleInputPassword1">Preço de Compra</label>
                  <input name="preco_compra" type="text" placeholder="R$" class="form-control input-md" required="" value="<?=$produto['preco_compra'];?>">
              </div>
              <div class="col-md-3">
                <label for="exampleInputPassword1">Preço de Venda</label>
                  <input name="preco_venda" type="text" placeholder="R$" class="form-control input-md" required="" value="<?=$produto['preco_venda'];?>">
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Fornecedor</label>
                  <select name="id_fornecedor" class="form-control">
                    <?php foreach($cf->Consultar_fornecedor() as $dados){?>
                    <option value="<?php echo $dados['idfornecedor']; ?>"><?php echo $dados['nome']; ?></option>
                    <?php }?>
                  </select>
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Estoques Fisico</label>
                  <select name="id_estoques" class="form-control">
                    <?php foreach($ce->Consultarestoques() as $dados){?>
                  <option value="<?php echo $dados['idestoques']; ?>"><?php echo $dados['nome_estoques']; ?></option>
                    <?php }?>
                  </select>
              </div>
            </div>
          </div>

          <button name="btn_alterar" class="btn btn-warning btn-block" type="submit">Gravar Alterações</button>
        </form>
      </div>
    </div>
</div>

        
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
<?php
endif;
include("footer.php"); ?>
