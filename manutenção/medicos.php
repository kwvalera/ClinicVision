<?php

Class medicos{
    //atributos
public $cod_medico;
public $nome_medico;
public $CRM_medico;
public $especialidade_medico;
public $formacao_medico;
public $complemento_medico;
public $conn;
public $query;

//metodos construção do objeto
    public function __Construct($conn){
        $this->conn=$conn;
    }
    //metodo crud
    public function cadastro_medico()
    {

    }
    public function Logar(){
        
    }
    public function listar_medicos(){
        $query="SELECT * FROM `medico` WHERE 1";
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