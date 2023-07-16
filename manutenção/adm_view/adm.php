<?php

Class adm{
    //atributos
public $cod_adm;
public $CPF_adm;
public $nome_adm;
public $data_nasc_adm;
public $telefone_adm;
public $cod_endereco;
public $senha_adm;
public $conn;
 

//metodos construção do objeto
    public function __Construct($conn){
        $this->conn=$conn;
    }
    //metodo crud
    public function Cadastro_adm(
    $CEP,
    $rua,
    $bairro,
    $numero,
    $complemento_endereco,
    ////
    $CPF_adm,
    $nome_adm,
    $data_nasc_adm,
    $telefone_adm,
    $senha_adm
    )
    {
        $sql="insert into endereco(CEP,rua,bairro,numero,complemento_endereco) values(?,?,?,?,?)";
            
        $resultadoe=$this->conn->prepare($sql); 
        $resultadoe->execute(array($CEP,$rua,$bairro,$numero,$complemento_endereco));
        $cod_endereco=$this->conn->lastInsertId();
        /////
        $sql="insert into adm(CPF_adm,nome_adm,data_nasc_adm,
        telefone_adm,cod_endereco,senha_adm) values(?,?,?,?,?,?)";
        
        $resultadop=$this->conn->prepare($sql);
        $resultadop->execute(array($CPF_adm,$nome_adm,$data_nasc_adm,
        $telefone_adm,$cod_endereco,$senha_adm));
    }
    public function Logar(){
        $query="SELECT cod_adm, CPF_adm, nome_adm, senha_adm, count(*) as 'qtde' FROM adm where CPF_adm=? and senha_adm=?";
		$stmt=$this->conn->prepare($query);
        $stmt->bindParam(1,$this->CPF_adm);
        $stmt->bindParam(2,$this->senha_adm);
		$stmt->execute();		
		return $stmt;
    }
    public function Listar(){

    }
    public function Editar(){
        
    }
    //fecha o objeto
    public function __destruction(){
        
    }
}

?>