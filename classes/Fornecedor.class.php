<?php

class Fornecedor extends Conexao{

    private $nome;
    private $cnpj;
    private $telefone;
    private $email;
    private $endereco;
    //variavel para guardar resulta das consultas(sem filtro)
    private $resultado;

    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setCnpj($cnpj){
        $this->cnpj = $cnpj;
    }
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
    public function setResultado($resultado){
        $this->resultado = $resultado;
    }

    public function getNome(){
        return $this->nome;
    }
    public function getCnpj(){
        return $this->cnpj;
    }
    public function getTelefone(){
        return $this->telefone;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getEndereco(){
        return $this->endereco;
    }
    public function getResultado(){
        return $this->resultado;
    }

    public function cadastrar(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        //comando SQL
        $cadastra = $pdo->prepare("INSERT INTO fornecedor(nome, cnpj, telefone, email, endereco) VALUES(?, ?, ?, ?, ?);");

        $cadastra->bindValue(1, $this->getNome());
        $cadastra->bindValue(2, $this->getCnpj());
        $cadastra->bindValue(3, $this->getTelefone());
        $cadastra->bindValue(4, $this->getEmail());
        $cadastra->bindValue(5, $this->getEndereco());
        if ($cadastra->execute()):
            return true;
        else:
            echo 'Erro: '. $e->getMessage();
            return false;
        endif;
    }

    public function alterar(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        //comando SQL
        $altera = $pdo->prepare("UPDATE fornecedor SET nome = ?, telefone = ?, email = ?, endereco = ? WHERE cnpj = ?;");

        $altera->bindValue(1, $this->getNome());
        $altera->bindValue(2, $this->getTelefone());
        $altera->bindValue(3, $this->getEmail());
        $altera->bindValue(4, $this->getEndereco());
        $altera->bindValue(5, $this->getCnpj());
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

        $excluir = $pdo->prepare("DELETE FROM fornecedor WHERE cnpj = ?;");
        $excluir->bindValue(1, $this->getCnpj());
        if($excluir->execute()):
            return true;
        else:
            echo 'Erro: '. $e->getMessage();
        endif;

    }

    public function consultarCnpj(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        $consultarCnpj = $pdo->prepare("SELECT * FROM fornecedor WHERE cnpj = ?;");
        $consultarCnpj->bindValue(1, $this->getCnpj());
        $consultarCnpj->execute();
        while($result = $consultarCnpj->fetch(PDO::FETCH_ASSOC)){
             $result2[] = $this->resultadoConsulta($result);
        }
        return $result2;

    }

    public function consultar_fornecedor(){

        //conexão com o banco via PDO
        $pdo = parent::getDB();

        $consultar = $pdo->query("SELECT * FROM fornecedor ORDER BY nome;");
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
