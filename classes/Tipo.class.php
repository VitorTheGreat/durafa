<?php

class Tipo extends Conexao{

    private $idtipo;
    private $tipo;
    private $genero;
    //variavel para guardar resulta das consultas(sem filtro)
    private $resultado;

    public function setIdestoque($idtipo){
      $this->idtipo = $idtipo;
    }
    public function setTipo($tipo){
      $this->tipo = $tipo;
    }
    public function setGenero($genero){
      $this->genero = $genero;
    }
    public function setResultado($resultado){
        $this->resultado = $resultado;
    }

    public function getIdtipo(){
        return $this->idtipo;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function getGenero(){
        return $this->genero;
    }
    public function getResultado(){
        return $this->resultado;
    }

    public function cadastrar(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        //comando SQL
        $cadastra = $pdo->prepare("INSERT INTO tipo(tipo, genero) VALUES(?, ?);");

        $cadastra->bindValue(1, $this->getTipo());
        $cadastra->bindValue(2, $this->getGenero());
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

          $consultar = $pdo->query("SELECT CONCAT(tipo,' ', genero) AS tipo_full, idtipo FROM tipo ORDER BY tipo_full;");
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
