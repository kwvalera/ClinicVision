<?php

Class paciente{
    //atributos
public $cod_paciente;
public $CPF_paciente;
public $nome_paciente;
public $data_nasc_paciente;
public $telefone_paciente;
public $cod_endereco;
public $cod_plano_saude;
public $senha_paciente;
public $conn;
public $query;

//metodos construção do objeto
    public function __Construct($conn){
        $this->conn=$conn;
    }
    //metodo crud
    public function Cadastro_paciente(
    $CEP,
    $rua,
    $bairro,
    $numero,
    $complemento_endereco,
    ////
    $CPF_paciente,
    $nome_paciente,
    $data_nasc_paciente,
    $telefone_paciente,
    $cod_plano_saude,
    $nome_plano_saude,
    $senha_paciente
    )
    {
        $sql="insert into endereco(CEP,rua,bairro,numero,complemento_endereco) values(?,?,?,?,?)";
            
        $resultadoe=$this->conn->prepare($sql); 
        $resultadoe->execute(array($CEP,$rua,$bairro,$numero,$complemento_endereco));
        $cod_endereco=$this->conn->lastInsertId();
        /////
        $sql="insert into paciente(CPF_paciente,nome_paciente,data_nasc_paciente,
        telefone_paciente,cod_endereco,cod_plano_saude,senha_paciente) values(?,?,?,?,?,?,?)";
        
        $resultadop=$this->conn->prepare($sql);
        $resultadop->execute(array($CPF_paciente,$nome_paciente,$data_nasc_paciente,
        $telefone_paciente,$cod_endereco,$cod_plano_saude,$senha_paciente));
    }
    public function Logar(){
        $query="SELECT cod_paciente, CPF_paciente, nome_paciente, senha_paciente, count(*) as 'qtde' FROM paciente where CPF_paciente=? and senha_paciente=?";
		$stmt=$this->conn->prepare($query);
        $stmt->bindParam(1,$this->CPF_paciente);
        $stmt->bindParam(2,$this->senha_paciente);
		$stmt->execute();
      
		return $stmt;
    }
        public function Select(){
    }
    public function Editar(){
        
    }
    //fecha o objeto
    public function __destruction(){
        
    }
}



?>