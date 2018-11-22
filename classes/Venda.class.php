<?php

class Venda extends Conexao{

//Aqui contem a tabela VENDA e tabela ITENS_VENDA

//VARIAVEIS DA TABELA ITENS_VENDA, SERVE PARA ITEM_AVULSO TAMBEM
    private $iditem_avulso;
    private $iditens_venda;
    private $id_produto;
    private $sub_total_produto;
    private $quantidade;
//VARIAVEIS DA TABELA VENDA
    private $idvenda;
    private $id_usuario;
    private $id_loja;
    private $data_venda;
    private $valor_pago;
    private $valor_desconto;
    private $preco_total_desconto;
    private $total;
    private $troco;
    private $metodo_pagamento;
//VARIAVEIS DA TABELA ITEM_AVULSO
    private $descricao;
    private $marca;
    private $preco;


    //variavel para guardar resulta das consultas(sem filtro)
    private $resultado;

    public function setIditens_venda($iditens_venda){
      $this->iditens_venda = $iditens_venda;
    }
    public function setIditem_avulso($iditem_avulso){
      $this->iditem_avulso = $iditem_avulso;
    }
    public function setId_produto($id_produto){
      $this->id_produto = $id_produto;
    }
    public function setSub_total_produto($sub_total_produto){
      $this->sub_total_produto = $sub_total_produto;
    }
    public function setQuantidade($quantidade){
      $this->quantidade = $quantidade;
    }
//-------------------//--------------------------//
    public function setIdvenda($idvenda){
      $this->idvenda = $idvenda;
    }
    public function setId_usuario($id_usuario){
      $this->id_usuario = $id_usuario;
    }
    public function setId_loja($id_loja){
      $this->id_loja = $id_loja;
    }
    public function setData_venda($data_venda){
      $this->data_venda = $data_venda;
    }
    public function setValor_pago($valor_pago){
      $this->valor_pago = $valor_pago;
    }
    public function setValor_desconto($valor_desconto){
      $this->valor_desconto = $valor_desconto;
    }
    public function setPreco_total_desconto($preco_total_desconto){
      $this->preco_total_desconto = $preco_total_desconto;
    }
    public function setTroco($troco){
      $this->troco = $troco;
    }
    public function setTotal($total){
      $this->total = $total;
    }
    public function setMetodo_pagamento($metodo_pagamento){
      $this->metodo_pagamento = $metodo_pagamento;
    }
//-------------------//---------------------
    public function setDescricao($descricao){
      $this->descricao = $descricao;
    }
    public function setMarca($marca){
      $this->marca = $marca;
    }
    public function setPreco($preco){
      $this->preco = $preco;
    }
    public function setResultado($resultado){
        $this->resultado = $resultado;
    }



    public function getIditens_venda(){
        return $this->iditens_venda;
    }
    public function getIditem_avulso(){
        return $this->iditem_avulso;
    }
    public function getId_produto(){
        return $this->id_produto;
    }
    public function getSub_total_produto(){
        return $this->sub_total_produto;
    }
    public function getQuantidade(){
        return $this->quantidade;
    }
//-------------//--------------------//
    public function getIdvenda(){
    return  $this->idvenda;
    }
    public function getId_usuario(){
    return  $this->id_usuario;
    }
    public function getId_loja(){
    return  $this->id_loja;
    }
    public function getData_venda(){
    return  $this->data_venda;
    }
    public function getValor_pago(){
    return  $this->valor_pago;
    }
    public function getValor_desconto(){
    return  $this->valor_desconto;
    }
    public function getPreco_total_desconto(){
    return  $this->preco_total_desconto;
    }
    public function getTotal(){
    return  $this->total;
    }
    public function getTroco(){
    return  $this->troco;
    }
    public function getMetodo_pagamento(){
    return  $this->metodo_pagamento;
    }
//--------------------//---------------------//
    public function getDescricao(){
    return  $this->descricao;
    }
    public function getMarca(){
    return  $this->marca;
    }
    public function getPreco(){
    return  $this->preco;
    }

    public function getResultado(){
        return $this->resultado;
    }


    public function abre_venda(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        //comando SQL
        $cadastra = $pdo->prepare("INSERT INTO venda (id_usuario_venda,id_loja_venda, data_venda) VALUES(?, ?, now());");

        $cadastra->bindValue(1, $this->getId_usuario());
        $cadastra->bindValue(2, $this->getId_loja());
        if ($cadastra->execute()):
            return true;
        else:
            echo 'Erro: '. $e->getMessage();
            return false;
        endif;
    }

    public function abre_venda_avulsa(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        //comando SQL
        $cadastra = $pdo->prepare("INSERT INTO venda_avulsa (id_usuario_vendaavulsa,id_loja_vendaavulsa, data_venda) VALUES(?, ?, now());");

        $cadastra->bindValue(1, $this->getId_usuario());
        $cadastra->bindValue(2, $this->getId_loja());
        if ($cadastra->execute()):
            return true;
        else:
            echo 'Erro: '. $e->getMessage();
            return false;
        endif;
    }

    public function fecha_venda(){

      //conexão com o banco via PDO
      $pdo = parent::getDB();

      //comando SQL
      $altera = $pdo->prepare("UPDATE venda
                                SET valor_pago = ?, valor_desconto = ?, preco_total_desconto = ?,
                                    total = ?, troco = ?, metodo_pagamento = ?
                                WHERE idvenda = ?;");

      $altera->bindValue(1, $this->getValor_pago());
      $altera->bindValue(2, $this->getValor_desconto());
      $altera->bindValue(3, $this->getPreco_total_desconto());
      $altera->bindValue(4, $this->getTotal());
      $altera->bindValue(5, $this->getTroco());
      $altera->bindValue(6, $this->getMetodo_pagamento());
      $altera->bindValue(7, $this->getIdvenda());
      if ($altera->execute()):
          return true;
      else:
          echo 'Erro: '. $e->getMessage();
          return false;
      endif;

    }

    public function fecha_venda_avulsa(){

      //conexão com o banco via PDO
      $pdo = parent::getDB();

      //comando SQL
      $altera = $pdo->prepare("UPDATE venda_avulsa
                                SET valor_pago = ?, valor_desconto = ?, preco_total_desconto = ?,
                                    total = ?, troco = ?, metodo_pagamento = ?
                                WHERE idvenda_avulsa = ?;");

      $altera->bindValue(1, $this->getValor_pago());
      $altera->bindValue(2, $this->getValor_desconto());
      $altera->bindValue(3, $this->getPreco_total_desconto());
      $altera->bindValue(4, $this->getTotal());
      $altera->bindValue(5, $this->getTroco());
      $altera->bindValue(6, $this->getMetodo_pagamento());
      $altera->bindValue(7, $this->getIdvenda_avulsa());
      if ($altera->execute()):
          return true;
      else:
          echo 'Erro: '. $e->getMessage();
          return false;
      endif;

    }


    public function insere_item(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        //comando SQL
        $cadastra = $pdo->prepare("INSERT INTO itens_venda (id_produto_itenvenda, id_venda_itenvenda, sub_total_produto, quantidade) VALUES(?, ?, ?, ?);");

        $cadastra->bindValue(1, $this->getId_produto());
        $cadastra->bindValue(2, $this->getIdvenda());
        $cadastra->bindValue(3, $this->getSub_total_produto());
        $cadastra->bindValue(4, $this->getQuantidade());

        try {
          $cadastra->execute();
          return true;
        } catch (\PDOException $e) {
          // $e->getMessage();
          // echo $e;
        }

        // if ($cadastra->execute()):
        //     return true;
        // else:
        //     echo 'Erro: '. $e->getMessage();
        //
        //     return false;
        // endif;
    }

    public function insere_item_avulso(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        //comando SQL
        $cadastra = $pdo->prepare("INSERT INTO item_avulso (id_venda_itemavulso, descricao, marca, preco, sub_total, quantidade) VALUES(?, ?, ?, ?, ?, ?);");

        $cadastra->bindValue(1, $this->getIdvenda());
        $cadastra->bindValue(2, $this->getDescricao());
        $cadastra->bindValue(3, $this->getMarca());
        $cadastra->bindValue(4, $this->getPreco());
        $cadastra->bindValue(5, $this->getSub_total_produto());
        $cadastra->bindValue(6, $this->getQuantidade());

        try {
          $cadastra->execute();
          return true;
        } catch (\PDOException $e) {
          // $e->getMessage();
          // echo $e;
        }


        // if ($cadastra->execute()):
        //     return true;
        // else:
        //     echo 'Erro: '. $e->getMessage();
        //     return false;
        // endif;
    }

    public function consultar_id_ult_venda(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        $consultar = $pdo->query("SELECT idvenda FROM venda ORDER BY idvenda DESC LIMIT 1;");
        $consultar->execute();
        while($result = $consultar->fetch(PDO::FETCH_ASSOC)){
             $result2[] = $this->resultadoConsulta($result);
        }
        return $result2;

    }

    public function consultar_id_ult_venda_avulsa(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        $consultar = $pdo->query("SELECT idvenda_avulsa FROM venda_avulsa ORDER BY idvenda_avulsa DESC LIMIT 1;");
        $consultar->execute();
        while($result = $consultar->fetch(PDO::FETCH_ASSOC)){
             $result2[] = $this->resultadoConsulta($result);
        }
        return $result2;

    }

    public function consultar_id_ult_itensvenda(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        $consultar = $pdo->query("SELECT iditens_venda FROM itens_venda ORDER BY iditens_venda DESC LIMIT 1;");
        $consultar->execute();
        while($result = $consultar->fetch(PDO::FETCH_ASSOC)){
             $result2[] = $this->resultadoConsulta($result);
        }
        return $result2;

    }    
    
    public function relatorio_venda_mensal(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        $consultar = $pdo->query("SELECT 
                                        u.nome as usuario, 
                                        l.nome_loja as loja, 
                                        v.data_venda,
                                        v.total,
                                        v.preco_total_desconto,
                                        v.valor_pago,
                                        v.troco
                                    FROM venda v
                                    INNER JOIN usuario u ON (v.id_usuario_venda = u.idusuario)
                                    INNER JOIN loja l ON (v.id_loja_venda = l.idloja)
                                    WHERE MONTH(data_venda) = MONTH(CURDATE());;");
        $consultar->execute();
        while($result = $consultar->fetch(PDO::FETCH_ASSOC)){
             $result2[] = $this->resultadoConsulta($result);
        }
        return $result2;

    }
    
        public function total_venda_mensal(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        $consultar = $pdo->query("SELECT SUM(preco_total_desconto) AS total, MONTH(data_venda) AS mes FROM venda
                                        WHERE MONTH(data_venda) = MONTH(CURDATE());");
        $consultar->execute();
        while($result = $consultar->fetch(PDO::FETCH_ASSOC)){
             $result2[] = $this->resultadoConsulta($result);
        }
        return $result2;

    }
    
    
        public function total_venda_dia(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        $consultar = $pdo->query("SELECT SUM(preco_total_desconto) as total, DATE_FORMAT(data_venda, '%d/%m/%Y') as data_venda FROM venda WHERE DATE(`data_venda`) = CURDATE();");
        $consultar->execute();
        while($result = $consultar->fetch(PDO::FETCH_ASSOC)){
             $result2[] = $this->resultadoConsulta($result);
        }
        return $result2;
        
        //essa condição serve para não deixar a variavel result2 sem valor, pois PHP mostra o erro de UNDEFINED VARIABLE para o id_usuario
          //assim ele não mostra o erro e eu consigo fazer um alert para o usuario, pois a variavel está sempre preenchida
          if(empty($result2)){
            $result2 = false;
          }else{
          return $result2;
          }

    }        
    
    
        public function relatorio_diario_venda(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        $consultar = $pdo->query("SELECT  u.nome as usuario, 
                                            l.nome_loja as loja, 
                                            v.data_venda,
                                            v.total,
                                            v.preco_total_desconto,
                                            v.valor_pago,
                                            v.troco FROM venda v
                                    INNER JOIN usuario u ON (v.id_usuario_venda = u.idusuario)
                                    INNER JOIN loja l ON (v.id_loja_venda = l.idloja)
                                    WHERE DATE(`data_venda`) = CURDATE();");
        $consultar->execute();
        while($result = $consultar->fetch(PDO::FETCH_ASSOC)){
             $result2[] = $this->resultadoConsulta($result);
        }
       // return $result2;
            
          //essa condição serve para não deixar a variavel result2 sem valor, pois PHP mostra o erro de UNDEFINED VARIABLE para o id_usuario
          //assim ele não mostra o erro e eu consigo fazer um alert para o usuario, pois a variavel está sempre preenchida
          if(empty($result2)){
            $result2 = false;
          }else{
          return $result2;
          }

    }


    public function consulta_itensvenda(){

          //conexão com o banco via PDO
          $pdo = parent::getDB();

          $consulta = $pdo->prepare("SELECT p.barcode_num, p.descricao, p.preco_venda, i.quantidade, i.sub_total_produto, v.idvenda FROM itens_venda i
                                      INNER JOIN produto p ON (i.id_produto_itenvenda = p.idproduto)
                                      INNER JOIN venda v ON (i.id_venda_itenvenda = v.idvenda)
                                      WHERE i.id_venda_itenvenda = ?;");
          $consulta->bindValue(1, $this->getIdvenda());
          $consulta->execute();
          while($result = $consulta->fetch(PDO::FETCH_ASSOC)){
               $result2[] = $this->resultadoConsulta($result);
          }

          //essa condição serve para não deixar a variavel result2 sem valor, pois PHP mostra o erro de UNDEFINED VARIABLE para o id_usuario
          //assim ele não mostra o erro e eu consigo fazer um alert para o usuario, pois a variavel está sempre preenchida
          if(empty($result2)){
            $result2 = false;
          }else{
          return $result2;
          }
    }

    public function consulta_itensvenda_avulsa(){

          //conexão com o banco via PDO
          $pdo = parent::getDB();

          $consulta = $pdo->prepare("SELECT ia.iditem_avulso, ia.descricao, ia.preco, ia.marca, ia.quantidade, ia.sub_total, v.idvenda FROM item_avulso ia
                                      INNER JOIN venda v ON (ia.id_venda_itemavulso = v.idvenda)
                                      WHERE ia.id_venda_itemavulso = ?;");
          $consulta->bindValue(1, $this->getIdvenda());
          $consulta->execute();
          while($result = $consulta->fetch(PDO::FETCH_ASSOC)){
               $result2[] = $this->resultadoConsulta($result);
          }

          //essa condição serve para não deixar a variavel result2 sem valor, pois PHP mostra o erro de UNDEFINED VARIABLE para o id_usuario
          //assim ele não mostra o erro e eu consigo fazer um alert para o usuario, pois a variavel está sempre preenchida
          if(empty($result2)){
            $result2 = false;
          }else{
          return $result2;
          }
    }

      public function delete_item(){

                //conexão com o banco via PDO
                $pdo = parent::getDB();

                $excluir = $pdo->prepare("DELETE FROM itens_venda WHERE id_produto_itenvenda = ?;");
                $excluir->bindValue(1, $this->getId_produto());
                if($excluir->execute()):
                    return true;
                else:
                    echo 'Erro: '. $e->getMessage();
                endif;
      }

      public function delete_item_avulso(){

                //conexão com o banco via PDO
                $pdo = parent::getDB();

                $excluir = $pdo->prepare("DELETE FROM item_avulso WHERE iditem_avulso = ?;");
                $excluir->bindValue(1, $this->getIditem_avulso());
                if($excluir->execute()):
                    return true;
                else:
                    echo 'Erro: '. $e->getMessage();
                endif;
      }

      private function resultadoConsulta($result) {

          $this->setResultado($result);
          return $this->getResultado();

      }


}

?>
