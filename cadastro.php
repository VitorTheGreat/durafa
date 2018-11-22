<?php
session_start();
include("header.php");

if($_SESSION['idhierarquia'] == 1){
?>


<!-- <form name="form1" method="post">
    ...
</form>
<form name="form2" method="post">   ...
</form>
<input type="button" value="Fomu1" onClick="document.form1.submit()">
<input type="button" value="Fomu2" onClick="document.form2.submit()">
Só tem um detalhe cara, você não pode colocar um form dentro do outro, não em tags, pois acontece o seguinte:
<form>  abre o 1º form
  <form> não abre o 2º form , aqui o html não reconhece a tag, pois já foi aberta
  </form> aqui você acaba de matar o html. Se não reconheceu o 2º form, advinha qual você fechou?
</form> esta tag ficará sobrandoÉ isso ae! Para fazer comunicação entre os forms, use funções, elas podem estar até fora dos forms:
function qualquer($var_de_entrada){   $var_de_entrada.='juntar as strings';   return $var_de_entrada;}
<form name="form" method="post">
   if(nanana){	  $dados='Eu vou';	  function qualquer($dados);	  echo $dados; //imprimirá Eu vou juntar as strings   }
 </form> -->

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
        <h1>Cadastro</h1>
        <p>Pagina de Cadastro</p>
      </div>
    </div>
  </div>

<!-- MODALS -  CONTEM CAMPOS PARA INSERIR NOVOS DADOS NO BANCO SEM PRECISAR MUDAR DE PAGINA -->
<!-- Modal tipo-->
<div class="modal fade" id="tipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Criar Novo Tipo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="modelo/cadastra_tipo.php">
          <div class="input-group mb-3">
              <input type="text" name="tipo" id="tipo" class="form-control" placeholder="Modelo" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <select name="genero" id="genero" class="form-control">
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                <option value="Unisex">Unisex</option>
              </select>
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit" name="btn_cadastra_tipo"><i class="fa fa-plus"></i></button>
              </div>
          </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>


<!-- Modal tamanho-->
<div class="modal fade" id="tamanho" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Criar Novo tamanho</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="modelo/cadastra_tamanho.php">
            <div class="input-group mb-3">
                <input type="text" name="tamanho" id="tamanho" class="form-control" placeholder="Novo Tamanho" required>
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit" name="btn_cadastra_tamanho"><i class="fa fa-plus"></i></button>
                </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<!-- Modal cor-->
<div class="modal fade" id="cor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Criar Nova cor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="modelo/cadastra_cor.php">
            <div class="input-group mb-3">
                <input type="text" name="nome_cor" id="nome_cor" class="form-control" placeholder="Nova Cor" required>
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit" name="btn_cadastra_cor"><i class="fa fa-plus"></i></button>
                </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<!-- // TERMINA MOLDAS -->


<!-- / COMEÇA CADASTRO PRODUTO -->

<div class="col-xl-12 col-sm-6 mb-5" id="produto">
    <div class="card mx-auto mt-5">
      <div class="card-header">Cadastro Produto</div>
      <div class="card-body">

        <!-- <div class="card border-dark ">
          <div class="card-header">Checar Produto</div>
            <div class="card-body">

              <form>
                <div class="form-group">
                  <div class="form-row">

                    <div class="col-md-6">

                      <label for="exampleInputName">Referência</label>
                      <input placeholder="Referencia" class="form-control" list="lista_referencia" name="lista_referencia">
                      <datalist id="lista_referencia">
                        <?php //foreach($cr->Consultar() as $dados){?>
                          <option value="<?php //echo $dados['referencia']; ?>">
                        <?php// }?>
                      </datalist>
                    </div>

                    <div class="col-md-6">
                      <label for="exampleInputLastName">Descrição</label>
                      <input placeholder="Descrição" class="form-control" list="lista_descr" name="lista_descr">
                      <datalist id="lista_descr">
                        <?php //foreach($cd->Consultar() as $dados){?>
                          <option value="<?php //echo $dados['descr']; ?>">
                        <?php //}?>
                      </datalist>
                    </div>

                  </div>
                </div>
                <button type="submit" class="btn btn-outline-info btn-lg btn-block">Copiar</button>
              </form>

            </div>
        </div>
        <br> -->

        <form method="post" action="modelo/cadastra_produto.php">

          <div class="form-group">
            <div class="form-row">

              <div class="col-md-3">
                <label for="exampleInputName">Referência</label>
                <input placeholder="Referencia" class="form-control" list="lista_referencia" name="referencia">
                <datalist id="lista_referencia">
                  <?php foreach($cr->Consultar() as $dados){?>
                    <option value="<?php echo $dados['referencia']; ?>" />
                  <?php }?>
                </datalist>
              </div>

              <div class="col-md-3">
                <label for="exampleInputName">Marca</label>
                  <input name="marca" type="text" placeholder="Marca" class="form-control input-md" required="">
              </div>


              <div class="col-md-5">
                <label for="exampleConfirmPassword">Cor</label>
                <input placeholder="Cor" class="form-control" list="lista_cor" name="cor">
                <datalist id="lista_cor">
                  <?php foreach($cc->Consultar() as $dados){?>
                    <option value="<?php echo $dados['nome']; ?>" />
                  <?php }?>
                </datalist>
              </div>

                <div class="button-down col-md-1">
                  <!-- Button trigger modal cor-->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cor">
                    Novo
                  </button>
                </div>


          </div>
        </div>

          <div class="form-group">
            <div class="form-row">

              <div class="col-md-5">
                <label for="exampleInputEmail1">Tipo</label>
                  <select name="id_tipo" class="form-control">
                    <?php foreach($ct->Consultar() as $dados){?>
                  <option value="<?php echo $dados['idtipo']; ?>"><?php echo $dados['tipo_full']; ?></option>
                    <?php }?>
                  </select>
              </div>

              <div class="button-down col-md-1">
                <!-- Button trigger modal TIPO-->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tipo">
                  Novo
                </button>
              </div>

              <div class="col-md-5">

                <label for="exampleInputPassword1">Descrição</label>
                  <input name="descricao" type="text" placeholder="Descrição" class="form-control input-md" required="">
              </div>


            </div>
          </div>


          <div class="form-group">
            <div class="form-row">

                          <div class="col-md-12">
                                <label for="exampleInputEmail1">Tamanho</label>
                              <div class="input-group input-group-sm mb-3">
                              <?php foreach($cta->Consultar() as $dados){?>
                                <div class="input-group-prepend">
                                  <input name="idtamanho[]" id="id_tamanho" value="<?php echo $dados['idtamanho']; ?>" hidden>
                                  <span class="input-group-text" id="inputGroup-sizing-sm"><?php echo $dados['tamanho']; ?></span>
                                </div>
                                  <input type="number" name="quantidade[]" id="quantidade_tamanho" value="0" class="form-control" aria-label="Small" placeholder="QTD" aria-describedby="inputGroup-sizing-sm">
                                <?php }?>
                              </div>
                          </div>

                    <div class="button-down">
                      <!-- Button trigger modal descricao-->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tamanho">
                        Novo Tamanho
                      </button>
                    </div>

            </div>
          </div>

            <div class="form-group">
              <div class="form-row">
              <div class="col-md-3">
                <label for="exampleInputPassword1">Preço de Compra</label>
                  <input name="preco_compra" type="text" placeholder="R$" class="form-control input-md" required="">
              </div>
              <div class="col-md-3">
                <label for="exampleInputPassword1">Preço de Venda</label>
                  <input name="preco_venda" type="text" placeholder="R$" class="form-control input-md" required="">
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

          <button name="btn_cadastra" class="btn btn-primary btn-block" type="submit">Cadastrar Produto</button>
        </form>
      </div>
    </div>
</div>
<!-- /.TERMINA CADASTRO PRODUTO -->



<!-- / COMEÇA CADASTRO FORNECEDOR -->
<div class="col-xl-12 col-sm-6 mb-5">
    <div class="card mx-auto mt-5">
      <div class="card-header">Cadastro Fornecedor</div>
      <div class="card-body">

        <form method="post" action="modelo/cadastra_fornecedor.php">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Nome</label>
                <input name="nome" type="text" placeholder="Nome do Fornecedor" class="form-control input-md" required="">
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
          <button class="btn btn-primary btn-block" name="btn_cadastra" type="submit">Cadastrar Fornecedor</button>
        </form>
      </div>
    </div>
</div>
<!-- /.TERMINA CADASTRO FORNECEDOR -->

<!-- / COMEÇA CADASTRO ESTOQUES -->
<div class="col-xl-12 col-sm-6 mb-5">
    <div class="card mx-auto mt-5">
      <div class="card-header">Cadastro Estoques</div>
      <div class="card-body">

        <form method="post" action="modelo/cadastra_estoque.php">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">Nome Estoque</label>
                <input name="nome" type="text" placeholder="Nome do Estoque" class="form-control input-md" required="">
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-block" name="btn_cadastra" type="submit">Cadastrar Estoque</button>
        </form>
      </div>
    </div>
</div>
<!-- /.TERMINA CADASTRO ESTOQUES -->


<!-- / COMEÇA CADASTRO USUARIO -->
<div class="col-xl-12 col-sm-6 mb-5">
    <div class="card mx-auto mt-5">
      <div class="card-header">Cadastro Usuario</div>
      <div class="card-body">
        <form method="post" action="modelo/cadastra_usuario.php">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <label for="exampleInputName">Nome</label>
                <input class="form-control" type="text" aria-describedby="nameHelp" placeholder="Nome" name="nome" required>
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">E-mail</label>
                <input class="form-control"type="text" aria-describedby="nameHelp" placeholder="E-mail" name="email" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Senha</label>
                <input class="form-control" type="password" placeholder="Senha" name="senha" required>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Nivel</label>
                  <select name="id_hierarquia" class="form-control">
                    <?php foreach($cu->consultar_hierarquia() as $dados){?>
                  <option value="<?php echo $dados['idhierarquia']; ?>"><?php echo $dados['nivel']; ?></option>
                    <?php }?>
                  </select>
              </div>
            </div>
          </div>
          <button type="submit" name="btn_cadastra" class="btn btn-primary btn-block">Cadastrar Usuario</button>
        </form>
      </div>
    </div>
</div>
<!-- /.TERMINA CADASTRO USUARIO -->

<!-- / COMEÇA CADASTRO LOJA -->
<!--
<div class="col-xl-12 col-sm-6 mb-5">
    <div class="card mx-auto mt-5">
      <div class="card-header">Cadastro Loja</div>
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
          <a class="btn btn-primary btn-block" href="login.html">Cadastrar Loja</a>
        </form>
      </div>
    </div>
</div>
-->
<!-- /.TERMINA CADASTRO LOJA -->


</div>

  <!-- /.container-fluid-->
  <!-- /.content-wrapper-->

<?php
}
else{
    header("Location: index.php");
}
include("footer.php");
?>
