<?php

class Produto extends Conexao{

    private $idproduto;
    private $barcode_img;
    private $barcode_num;
    private $descricao;
    private $marca;
    private $precocompra;
    private $precovenda;
    private $id_referencia;
    private $id_tamanho;
    private $id_fornecedor;
    private $id_tipo;
    private $id_cor;
    private $id_estoques;
// variavel para consulta
    private $resultado;

    public function setIdproduto($idproduto){
        $this->idproduto = $idproduto;
    }
    public function setBarcode_img($barcode_img){
        $this->barcode_img = $barcode_img;
    }
    public function setBarcode_num($barcode_num){
        $this->barcode_num = $barcode_num;
    }
    public function setMarca($marca){
        $this->marca = $marca;
    }
    public function setPrecocompra($precocompra){
        $this->precocompra = $precocompra;
    }
    public function setPrecovenda($precovenda){
        $this->precovenda = $precovenda;
    }
    public function setId_referencia($id_referencia){
        $this->id_referencia = $id_referencia;
    }
    public function setId_tamanho($id_tamanho){
        $this->id_tamanho = $id_tamanho;
    }
    public function setId_fornecedor($id_fornecedor){
        $this->id_fornecedor = $id_fornecedor;
    }
    public function setId_tipo($id_tipo){
        $this->id_tipo = $id_tipo;
    }
    public function setId_cor($id_cor){
        $this->id_cor = $id_cor;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    public function setId_estoques($id_estoques){
        $this->id_estoques = $id_estoques;
    }
    public function setResultado($resultado){
        $this->resultado = $resultado;
    }

    public function getIdproduto(){
        return $this->idproduto;
    }
    public function getBarcode_img(){
        return $this->barcode_img;
    }
    public function getBarcode_num(){
        return $this->barcode_num;
    }
    public function getMarca(){
        return $this->marca;
    }
    public function getPrecocompra(){
        return $this->precocompra;
    }
    public function getPrecovenda(){
        return $this->precovenda;
    }
    public function getId_referencia(){
        return $this->id_referencia;
    }
    public function getId_tamanho(){
        return $this->id_tamanho;
    }
    public function getId_fornecedor(){
        return $this->id_fornecedor;
    }
    public function getId_tipo(){
        return $this->id_tipo;
    }
    public function getId_cor(){
        return $this->id_cor;
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public function getId_estoques(){
        return $this->id_estoques;
    }
    public function getResultado(){
        return $this->resultado;
    }


    public function cadastrar(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        //comando SQL
        $cadastra = $pdo->prepare("INSERT INTO produto(marca,preco_venda,preco_compra,descricao,id_estoques_produto,id_referencia_produto,id_tamanho_produto,id_fornecedor_produto,id_tipo_produto,id_cor_produto)
                                    VALUES(?,?,?,?,?,?,?,?,?,?);");

        $cadastra->bindValue(1, $this->getMarca());
        $cadastra->bindValue(2, $this->getPrecovenda());
        $cadastra->bindValue(3, $this->getPrecocompra());
        $cadastra->bindValue(4, $this->getDescricao());
        $cadastra->bindValue(5, $this->getId_estoques());
        $cadastra->bindValue(6, $this->getId_referencia());
        $cadastra->bindValue(7, $this->getId_tamanho());
        $cadastra->bindValue(8, $this->getId_fornecedor());
        $cadastra->bindValue(9, $this->getId_tipo());
        $cadastra->bindValue(10, $this->getId_cor());
        if ($cadastra->execute()):
            return true;
        else:
            echo 'Erro: '. $e->getMessage();
            return false;
        endif;
    }

    // public function insere_barcode(){}

    public function insere_barcode(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();


        //comando SQL
        $altera = $pdo->prepare("UPDATE produto SET barcode_img = ?, barcode_num = ? WHERE idproduto = ?;");

        $altera->bindValue(1, $this->getBarcode_img());
        $altera->bindValue(2, $this->getBarcode_num());
        $altera->bindValue(3, $this->getIdproduto());
        if ($altera->execute()):
            return true;
        else:
            echo 'Erro: '. $e->getMessage();
            return false;
        endif;
    }

    public function excluir(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        $excluir = $pdo->prepare("DELETE FROM produto WHERE idproduto = ?;");
        $excluir->bindValue(1, $this->getIdproduto());
        if($excluir->execute()):
            return true;
        else:
            echo 'Erro: '. $e->getMessage();
        endif;

    }
    
    public function alterar(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        //comando SQL
        $altera = $pdo->prepare("UPDATE produto
                                            SET
                                            descricao = ?,
                                            marca = ?,
                                            preco_venda = ?,
                                            preco_compra = ?,
                                            id_estoques_produto = ?,
                                            id_referencia_produto = ?,
                                            id_fornecedor_produto = ?,
                                            id_tipo_produto = ?,
                                            id_cor_produto = ?
                                            WHERE idproduto = ?;");

        $altera->bindValue(1, $this->getDescricao());
        $altera->bindValue(2, $this->getMarca());
        $altera->bindValue(3, $this->getPrecovenda());
        $altera->bindValue(4, $this->getPrecocompra());
        $altera->bindValue(5, $this->getId_estoques());
        $altera->bindValue(6, $this->getId_referencia());
        $altera->bindValue(7, $this->getId_fornecedor());
        $altera->bindValue(8, $this->getId_tipo());
        $altera->bindValue(9, $this->getId_cor());
        $altera->bindValue(10, $this->getIdproduto());
        if ($altera->execute()):
            return true;
        else:
            echo 'Erro: '. $e->getMessage();
            return false;
        endif;
    }


    public function consultar_id_ult_produto(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        $consultar = $pdo->query("SELECT idproduto FROM produto ORDER BY idproduto DESC LIMIT 1;");
        $consultar->execute();
        while($result = $consultar->fetch(PDO::FETCH_ASSOC)){
             $result2[] = $this->resultadoConsulta($result);
        }
        return $result2;

    }

    
        public function consultar_todos_produtos(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        $consultaProduto = $pdo->prepare("SELECT
                                                ce.quantidade,
                                                e.nome_estoques,
                                                p.idproduto,
                                                p.marca,
                                                p.preco_venda as preco,
                                                p.barcode_num,
                                                p.descricao,
                                                r.referencia,
                                                t.tamanho,
                                                f.nome as fornecedor,
                                                CONCAT(tp.tipo,' ', tp.genero) AS tipo_full,
                                                c.nome as cor
                                                FROM controle_estoque ce
                                                INNER JOIN produto p ON (ce.id_produto_controle = p.idproduto)
                                                INNER JOIN estoques e ON (p.id_estoques_produto = e.idestoques)
                                                INNER JOIN tamanho t ON (p.id_tamanho_produto = t.idtamanho)
                                                INNER JOIN fornecedor f ON (p.id_fornecedor_produto = f.idfornecedor)
                                                INNER JOIN tipo tp ON (p.id_tipo_produto = tp.idtipo)
                                                INNER JOIN cor c ON (p.id_cor_produto = c.idcor)
                                                INNER JOIN referencia r ON (p.id_referencia_produto = r.idreferencia)
                                                ORDER BY p.id_estoques_produto; ");
        $consultaProduto->execute();
        while($result = $consultaProduto->fetch(PDO::FETCH_ASSOC)){
             $result2[] = $this->resultadoConsulta($result);
        }
        return $result2;

    }
    


    public function consultar_produto_em_estoque(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        $consultaProduto = $pdo->prepare("SELECT
                                                ce.quantidade,
                                                e.nome_estoques,
                                                p.idproduto,
                                                p.marca,
                                                p.preco_venda as preco,
                                                p.barcode_num,
                                                p.descricao,
                                                r.referencia,
                                                t.tamanho,
                                                f.nome as fornecedor,
                                                CONCAT(tp.tipo,' ', tp.genero) AS tipo_full,
                                                c.nome as cor
                                                FROM controle_estoque ce
                                                INNER JOIN produto p ON (ce.id_produto_controle = p.idproduto)
                                                INNER JOIN estoques e ON (p.id_estoques_produto = e.idestoques)
                                                INNER JOIN tamanho t ON (p.id_tamanho_produto = t.idtamanho)
                                                INNER JOIN fornecedor f ON (p.id_fornecedor_produto = f.idfornecedor)
                                                INNER JOIN tipo tp ON (p.id_tipo_produto = tp.idtipo)
                                                INNER JOIN cor c ON (p.id_cor_produto = c.idcor)
                                                INNER JOIN referencia r ON (p.id_referencia_produto = r.idreferencia)
                                                WHERE ce.quantidade > 0
                                                ORDER BY p.id_estoques_produto; ");
        $consultaProduto->execute();
        while($result = $consultaProduto->fetch(PDO::FETCH_ASSOC)){
             $result2[] = $this->resultadoConsulta($result);
        }
        return $result2;

    }

    public function consultar_zero_produtos(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        $consultaProduto = $pdo->prepare("SELECT
                                                ce.quantidade,
                                                e.nome_estoques,
                                                p.idproduto,
                                                p.marca,
                                                p.preco_venda as preco,
                                                p.barcode_num,
                                                p.descricao,
                                                r.referencia,
                                                t.tamanho,
                                                f.nome as fornecedor,
                                                CONCAT(tp.tipo,' ', tp.genero) AS tipo_full,
                                                c.nome as cor
                                                FROM controle_estoque ce
                                                INNER JOIN produto p ON (ce.id_produto_controle = p.idproduto)
                                                INNER JOIN estoques e ON (p.id_estoques_produto = e.idestoques)
                                                INNER JOIN tamanho t ON (p.id_tamanho_produto = t.idtamanho)
                                                INNER JOIN fornecedor f ON (p.id_fornecedor_produto = f.idfornecedor)
                                                INNER JOIN tipo tp ON (p.id_tipo_produto = tp.idtipo)
                                                INNER JOIN cor c ON (p.id_cor_produto = c.idcor)
                                                INNER JOIN referencia r ON (p.id_referencia_produto = r.idreferencia)
                                                WHERE ce.quantidade <= 0
                                                ORDER BY p.id_estoques_produto; ");
        $consultaProduto->execute();
        while($result = $consultaProduto->fetch(PDO::FETCH_ASSOC)){
             $result2[] = $this->resultadoConsulta($result);
        }
        return $result2;

    }

    
    public function consulta_produto_altera(){

      //conexão com o banco via PDO
      $pdo = parent::getDB();

      $consultar = $pdo->prepare("SELECT
                                        ce.quantidade,
                                        e.nome_estoques,
                                        p.idproduto,
                                        p.marca,
                                        p.preco_venda,
                                        p.preco_compra,
                                        p.barcode_num,
                                        p.descricao,
                                        r.referencia,
                                        t.tamanho,
                                        f.nome as fornecedor,
                                        CONCAT(tp.tipo,' ', tp.genero) AS tipo_full,
                                        c.nome as cor
                                        FROM controle_estoque ce
                                        INNER JOIN produto p ON (ce.id_produto_controle = p.idproduto)
                                        INNER JOIN estoques e ON (p.id_estoques_produto = e.idestoques)
                                        INNER JOIN tamanho t ON (p.id_tamanho_produto = t.idtamanho)
                                        INNER JOIN fornecedor f ON (p.id_fornecedor_produto = f.idfornecedor)
                                        INNER JOIN tipo tp ON (p.id_tipo_produto = tp.idtipo)
                                        INNER JOIN cor c ON (p.id_cor_produto = c.idcor)
                                        INNER JOIN referencia r ON (p.id_referencia_produto = r.idreferencia)
                                      WHERE p.idproduto = ?; ");
      $consultar->bindValue(1, $this->getIdproduto());
      $consultar->execute();
      while($result = $consultar->fetch(PDO::FETCH_ASSOC)){
           $result2[] = $this->resultadoConsulta($result);
      }
      return $result2;

    }
    
    
    public function consulta_produto_etiqueta(){

      //conexão com o banco via PDO
      $pdo = parent::getDB();

      $consultar = $pdo->prepare("SELECT
                                      ce.quantidade,
                                      p.idproduto,
                                      p.marca,
                                      p.preco_venda as preco,
                                      p.barcode_num,
                                      p.barcode_img,
                                      r.referencia,
                                      t.tamanho,
                                      CONCAT(tp.tipo,' ', tp.genero) AS tipo_full,
                                      c.nome as cor
                                      FROM controle_estoque ce
                                      INNER JOIN produto p ON (ce.id_produto_controle = p.idproduto)
                                      INNER JOIN tamanho t ON (p.id_tamanho_produto = t.idtamanho)
                                      INNER JOIN tipo tp ON (p.id_tipo_produto = tp.idtipo)
                                      INNER JOIN cor c ON (p.id_cor_produto = c.idcor)
                                      INNER JOIN referencia r ON (p.id_referencia_produto = r.idreferencia)
                                      WHERE p.idproduto = ?; ");
      $consultar->bindValue(1, $this->getIdproduto());
      $consultar->execute();
      while($result = $consultar->fetch(PDO::FETCH_ASSOC)){
           $result2[] = $this->resultadoConsulta($result);
      }
      return $result2;

    }

    public function consulta_produto_venda(){

      //conexão com o banco via PDO
      $pdo = parent::getDB();

      $consultar = $pdo->prepare("SELECT idproduto, preco_venda FROM produto WHERE barcode_num = ? ; ");
      $consultar->bindValue(1, $this->getBarcode_num());
      $consultar->execute();
      while($result = $consultar->fetch(PDO::FETCH_ASSOC)){
           $result2[] = $this->resultadoConsulta($result);
      }
      return $result2;

    }


    // consulta para tela de vendas
    public function consultar_venda(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        $consultaProduto = $pdo->prepare("SELECT p.barcode_num, c.quantidade FROM produto p
                                          INNER JOIN controle_estoque c ON (c.id_produto_controle = p.idproduto)
                                          WHERE c.quantidade > 0;");
        $consultaProduto->execute();
        while($result = $consultaProduto->fetch(PDO::FETCH_ASSOC)){
             $result2[] = $this->resultadoConsulta($result);
        }
        return $result2;

    }

    //consulta para tela de edita produta
    public function consultar_produto_edit(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        $consultaProduto = $pdo->prepare("SELECT
                                                ce.quantidade,
                                                e.nome_estoques,
                                                p.idproduto,
                                                p.marca,
                                                p.preco_venda as preco,
                                                p.barcode_num,
                                                p.descricao,
                                                r.referencia,
                                                t.tamanho,
                                                f.nome as fornecedor,
                                                CONCAT(tp.tipo,' ', tp.genero) AS tipo_full,
                                                c.nome as cor,
                                                FROM controle_estoque ce
                                                INNER JOIN produto p ON (ce.id_produto_controle = p.idproduto)
                                                INNER JOIN estoques e ON (p.id_estoques_produto = e.idestoques)
                                                INNER JOIN tamanho t ON (p.id_tamanho_produto = t.idtamanho)
                                                INNER JOIN fornecedor f ON (p.id_fornecedor_produto = f.idfornecedor)
                                                INNER JOIN tipo tp ON (p.id_tipo_produto = tp.idtipo)
                                                INNER JOIN cor c ON (p.id_cor_produto = c.idcor)
                                                INNER JOIN referencia r ON (p.id_referencia_produto = r.idreferencia)
                                                WHERE p.idproduto = ?
                                                ORDER BY p.id_estoques_produto; ");
        $consultaProduto->bindValue(1, $this->getIdproduto());
        $consultaProduto->execute();
        while($result = $consultaProduto->fetch(PDO::FETCH_ASSOC)){
             $result2[] = $this->resultadoConsulta($result);
        }
        return $result2;

    }


    private function resultadoConsulta($result) {

        $this->setResultado($result);
        return $this->getResultado();

    }
}


?>
