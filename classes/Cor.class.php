<?php

class Cor extends Conexao{

    private $idcor;
    private $nome;
    private $hexadec;
    //variavel para guardar resulta das consultas(sem filtro)
    private $resultado;

    public function setIdcor($idcor){
      $this->idcor = $idcor;
    }
    public function setNome($nome){
      $this->nome = $nome;
    }
    public function setHexadec($hexadec){
      $this->hexadec = $hexadec;
    }
    public function setResultado($resultado){
        $this->resultado = $resultado;
    }

    public function getIdcor(){
        return $this->idcor;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getHexadec(){
        return $this->hexadec;
    }
    public function getResultado(){
        return $this->resultado;
    }

    public function cadastrar(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        //comando SQL
        $cadastra = $pdo->prepare("INSERT INTO cor(nome) VALUES(?);");

        $cadastra->bindValue(1, $this->getNome());
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

        $consultar = $pdo->query("SELECT * FROM cor ORDER BY nome;");
        $consultar->execute();
        while($result = $consultar->fetch(PDO::FETCH_ASSOC)){
             $result2[] = $this->resultadoConsulta($result);
        }
        return $result2;

    }

    public function consultar_id_cor(){

          //conexão com o banco via PDO
          $pdo = parent::getDB();

          $consulta = $pdo->prepare("SELECT idcor FROM cor WHERE nome = ?;");
          $consulta->bindValue(1, $this->getNome());
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
