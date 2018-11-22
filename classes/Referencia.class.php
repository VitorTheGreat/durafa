<?php

class Referencia extends Conexao{


    private $idreferencia;
    private $referencia;
// variavel para consulta
    private $resultado;


    public function setIdreferencia($idreferencia){
        $this->idreferencia = $idreferencia;
    }
    public function setReferencia($referencia){
        $this->referencia = $referencia;
    }
    public function setResultado($resultado){
        $this->resultado = $resultado;
    }

    public function getIdreferencia(){
        return $this->idreferencia;
    }
    public function getReferencia(){
        return $this->referencia;
    }
    public function getResultado(){
        return $this->resultado;
    }


    public function cadastrar(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        //comando SQL
        $cadastra = $pdo->prepare("INSERT INTO referencia (referencia) VALUES(?);");

        $cadastra->bindValue(1, $this->getReferencia());
        if ($cadastra->execute()):
            return true;
        else:
            echo 'Erro: '. $e->getMessage();
            return false;
        endif;
    }

    // public function insere_barcode(){}

    public function excluir(){}


    public function consultar(){

          //conexão com o banco via PDO
          $pdo = parent::getDB();

          $consulta = $pdo->prepare("SELECT * FROM referencia;");
          $consulta->execute();
          while($result = $consulta->fetch(PDO::FETCH_ASSOC)){
               $result2[] = $this->resultadoConsulta($result);
          }
          return $result2;

    }

    public function consultar_id_referencia(){

          //conexão com o banco via PDO
          $pdo = parent::getDB();

          $consulta = $pdo->prepare("SELECT idreferencia FROM referencia WHERE referencia = ?;");
          $consulta->bindValue(1, $this->getReferencia());
          $consulta->execute();
          while($result = $consulta->fetch(PDO::FETCH_ASSOC)){
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
