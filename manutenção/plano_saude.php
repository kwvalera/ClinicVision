<?php

Class plano_saude{
    //atributos
public $cod_plano_saude;
public $nome_plano_saude;
public $conn;
public $query;

//metodos construção do objeto
    public function __Construct($conn){
        $this->conn=$conn;
    }
    //metodo crud
    public function cadastro_plano_saude()
    {

    }
    public function Logar(){
        
    }
    public function listar_plano_saude(){
        $query="SELECT * FROM `plano_saude` WHERE 1";
		$stmt=$this->conn->prepare($query);
		$stmt->execute();		
		return $stmt;
    }
    public function Editar(){
        
    }
    //fecha o objeto
    public function __destruction(){
        
    }
}



?>