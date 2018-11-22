<?php

class Usuario extends Conexao{

    //Pelo que eu entendi essa código pega o valor inserido pelo usuario e guarda dentro das propriedades(variaveis)
    private $idusuario;
    private $email;
    private $senha;
    private $hierarquia;
    private $nome;
    private $resultado;

    public function setIdusuario($idusuario){
        $this->idusuario = $idusuario;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function setHierarquia($hierarquia){
        $this->hierarquia = $hierarquia;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setResultado($resultado){
        $this->resultado = $resultado;
    }
    public function getIdusuario(){
        return $this->idusuario;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getHierarquia(){
        return $this->hierarquia;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getResultado(){
        return $this->resultado;
    }


    //Aqui começa as funções da classe
    //Função para logar
    public function logar(){
        //conexão com o banco via PDO
        $pdo = parent::getDB();

        $logar = $pdo->prepare("SELECT u.idusuario , u.nome, u.email, u.senha, h.idhierarquia FROM usuario u INNER JOIN hierarquia h ON (u.id_hierarquia = h.idhierarquia) WHERE email = ? AND senha = ?;");
        $logar->bindValue(1, $this->getEmail());
        $logar->bindValue(2, $this->getSenha());
        $logar->execute();
        if ($logar->rowCount() == 1):
            $dados = $logar->fetch(PDO::FETCH_OBJ);
            $_SESSION['idusuario'] = $dados->idusuario;
            $_SESSION['usuario'] = $dados->nome;
            $_SESSION['idhierarquia'] = $dados->idhierarquia;
            // $_SESSION['idloja'] = 1;
            $_SESSION['logado'] = true;
            return true;
        else:
            return false;
        endif;
    }

    //Aqui começa função deslogar
    public static function deslogar(){
        if(isset($_SESSION['logado'])):
            unset($_SESSION['logado']);
            session_destroy();
            header("Location: login.php");
        endif;
    }

    public function cadastrar(){
                //conexão com o banco via PDO
        $pdo = parent::getDB();

        //comando SQL
        $cadastra = $pdo->prepare("INSERT INTO usuario(email, nome, senha, id_hierarquia) VALUES(?, ?, ?, ?);");

        $cadastra->bindValue(1, $this->getEmail());
        $cadastra->bindValue(2, $this->getNome());
        $cadastra->bindValue(3, $this->getSenha());
        $cadastra->bindValue(4, $this->getHierarquia());
        if ($cadastra->execute()):
            return true;
        else:
            echo 'Erro: '. $e->getMessage();
            return false;
        endif;
    }


    public function consultar_hierarquia(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        $consultar = $pdo->query("SELECT idhierarquia, nivel FROM hierarquia ORDER BY nivel;");
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
