<?php

class Loja extends Conexao{

    private $idloja;
    private $nome_loja;
    private $ip_loja;
    private $resultado;

    public function setIdloja($idloja){
        $this->idloja = $idloja;
    }
    public function setNome_loja($nome_loja){
        $this->nome_loja = $nome_loja;
    }
    public function setIp_loja($ip_loja){
        $this->ip_loja = $ip_loja;
    }
    public function setResultado($resultado){
        $this->resultado = $resultado;
    }
    public function getIdloja(){
        return $this->idloja;
    }
    public function getNome_loja(){
        return $this->nome_loja;
    }
    public function getIp_loja(){
        return $this->ip_loja;
    }
    public function getResultado(){
        return $this->resultado;
    }

    // public function cadastrar(){
    //
    //     //conexão com o banco via PDO
    //     $pdo = parent::getDB();
    //
    //     //comando SQL
    //     $cadastra = $pdo->prepare("");
    //
    //     $cadastra->bindValue(1, );
    //     $cadastra->bindValue(2, );
    //     $cadastra->bindValue(3, );
    //     $cadastra->bindValue(4, );
    //     $cadastra->bindValue(5, );
    //     if ($cadastra->execute()):
    //         return true;
    //     else:
    //         echo 'Erro: '. $e->getMessage();
    //         return false;
    //     endif;
    // }

    public function alterar(){}

    public function excluir(){}

    public function consultar_loja(){

          //conexão com o banco via PDO
          $pdo = parent::getDB();

          $consultar = $pdo->query("SELECT idloja, nome_loja FROM loja ORDER BY nome_loja;");
          $consultar->execute();
          while($result = $consultar->fetch(PDO::FETCH_ASSOC)){
               $result2[] = $this->resultadoConsulta($result);
          }
          return $result2;

      }

      public function pega_ip_loja(){

            //conexão com o banco via PDO
            $pdo = parent::getDB();

            $consultar = $pdo->prepare("SELECT idloja, nome_loja FROM loja WHERE ip_loja = ?;");
            $consultar->bindValue(1, $this->getIp_loja());
            $consultar->execute();
            while($result = $consultar->fetch(PDO::FETCH_ASSOC)){
                 $result2[] = $this->resultadoConsulta($result);
            }

            // preenche variavel para não deixar e evitar erro de UNDEFINED VARIABLE
            if(empty($result2)){
              $result2 = false;
            }else{
            return $result2;
            }
            return $result2;

        }


      private function resultadoConsulta($result) {

          $this->setResultado($result);
          return $this->getResultado();

      }
}

?>
