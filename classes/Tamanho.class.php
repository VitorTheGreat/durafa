<?php

class Tamanho extends Conexao{

    private $idatamanho;
    private $tamanho;
    //variavel para guardar resulta das consultas(sem filtro)
    private $resultado;

    public function setIdtamanho($idatamanho){
      $this->idatamanho = $idatamanho;
    }
    public function setTamanho($tamanho){
      $this->tamanho = $tamanho;
    }
    public function setResultado($resultado){
        $this->resultado = $resultado;
    }

    public function getIdtamanho(){
        return $this->$idtamanho;
    }
    public function getTamanho(){
        return $this->tamanho;
    }
    public function getResultado(){
        return $this->resultado;
    }

    public function cadastrar(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        //comando SQL
        $cadastra = $pdo->prepare("INSERT INTO tamanho(tamanho) VALUES(?);");

        $cadastra->bindValue(1, $this->getTamanho());
        if ($cadastra->execute()):
            return true;
        else:
            echo 'Erro: '. $e->getMessage();
            return false;
        endif;
    }


    public function alterar(){}

    public function excluir(){}

      public function consultar(){

          //conexão com o banco via PDO
          $pdo = parent::getDB();

          $consultar = $pdo->query("SELECT * FROM tamanho ORDER BY tamanho;");
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
