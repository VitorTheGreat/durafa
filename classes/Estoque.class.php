<?php

class Estoque extends Conexao{


// AQUI EXISTEM DUAS TABELAS!
// ESTOQUES: que são os estoques fisicos
// CONTROLE DE ESTOQUE: para fazer a manutenção do estoque por unidade

// CAMPOS DA TABELA ESTOQUES
    private $idestoques;
    private $nome_estoques;
// CAMPOS DA TABELA CONTROLE_ESOTQUE
    private $idcontroleestoque;
    private $quantidade;
    private $id_produto;
//variavel para guardar resulta das consultas(sem filtro)
    private $resultado;

    public function setIdestoques($idestoques){
      $this->idestoques = $idestoques;
    }
    public function setNome_estoques($nome_estoques){
      $this->nome_estoques = $nome_estoques;
    }
    public function setIdcontroleestoques($idcontroleestoque){
      $this->idcontroleestoque = $idcontroleestoque;
    }
    public function setQuantidade($quantidade){
      $this->quantidade = $quantidade;
    }
    public function setId_produto($id_produto){
      $this->id_produto = $id_produto;
    }
    public function setResultado($resultado){
        $this->resultado = $resultado;
    }

    public function getIdestoques(){
        return $this->idestoques;
    }
    public function getNome_estoques(){
        return $this->nome_estoques;
    }
    public function getIdcontroleestoque(){
        return $this->idcontroleestoque;
    }
    public function getQuantidade(){
        return $this->quantidade;
    }
    public function getId_produto(){
        return $this->id_produto;
    }
    public function getResultado(){
        return $this->resultado;
    }


    public function cadastrar_estoque(){


        //conexão com o banco via PDO
        $pdo = parent::getDB();

        //comando SQL
        $cadastra = $pdo->prepare("INSERT INTO estoques(nome_estoques) VALUES(?);");
        // 'INSERT INTO tabela(numero) VALUES (%s)', implode( '), (' , $valores ) );
        // $cadastra = $pdo->prepare('INSERT INTO controle_estoque(quantidade, id_estoques, id_produto, id_tamanho) VALUES (%s)', implode( '), (' , $valores ) );

        $cadastra->bindValue(1, $this->getNome_estoques());
        if ($cadastra->execute()):
            return true;
        else:
            echo 'Erro: '. $e->getMessage();
            return false;
        endif;
    }

    public function cadastrar_quantidade(){


        //conexão com o banco via PDO
        $pdo = parent::getDB();

        //comando SQL
        $cadastra = $pdo->prepare("INSERT INTO controle_estoque(quantidade, id_produto_controle) VALUES(?, ?);");
        // 'INSERT INTO tabela(numero) VALUES (%s)', implode( '), (' , $valores ) );
        // $cadastra = $pdo->prepare('INSERT INTO controle_estoque(quantidade, id_estoques, id_produto, id_tamanho) VALUES (%s)', implode( '), (' , $valores ) );

        $cadastra->bindValue(1, $this->getQuantidade());
        $cadastra->bindValue(2, $this->getId_produto());
        if ($cadastra->execute()):
            return true;
        else:
            echo 'Erro: '. $e->getMessage();
            return false;
        endif;
    }


    public function alterar(){}

        public function excluir(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        $excluir = $pdo->prepare("DELETE FROM controle_estoque WHERE id_produto_controle = ?;");
        $excluir->bindValue(1, $this->getId_produto());
        if($excluir->execute()):
            return true;
        else:
            echo 'Erro: '. $e->getMessage();
        endif;

    }
    

      public function consultarestoques(){

          //conexão com o banco via PDO
          $pdo = parent::getDB();

          $consultar = $pdo->query("SELECT * FROM estoques ORDER BY nome_estoques;");
          $consultar->execute();
          while($result = $consultar->fetch(PDO::FETCH_ASSOC)){
               $result2[] = $this->resultadoConsulta($result);
          }
          return $result2;

      }

      public function consulta_quantidade_produtos(){

          //conexão com o banco via PDO
          $pdo = parent::getDB();

          $consultar = $pdo->query("SELECT sum(ce.quantidade) as total_produtos, e.nome_estoques as estoques FROM controle_estoque ce
                                      INNER JOIN produto p ON (ce.id_produto_controle = p.idproduto)
                                      INNER JOIN estoques e ON (p.id_estoques_produto = e.idestoques)
                                      GROUP BY p.id_estoques_produto;");
          $consultar->execute();
          while($result = $consultar->fetch(PDO::FETCH_ASSOC)){
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
