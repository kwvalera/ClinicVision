<?php
//clinica_project (nome banco)
class Conexao{
    //variaveis
    var $host="localhost";
    var $base="clinica_project";
    var $username="id19998639_kaw_v";
    var $password="";
    public $conn;
    //metodo de conexao
    public function getConection(){
        $this->conn=null;
        try{
            $this->conn=new PDO("mysql:host=".$this->host.";dbname=".$this->base,$this->username,$this->password);
        }
        catch(PDOException $exception){
            echo "Erro conexão: ".$exception->getMessage();
        }
        if($this->conn){
        }
        return $this->conn;
    }
}

?>