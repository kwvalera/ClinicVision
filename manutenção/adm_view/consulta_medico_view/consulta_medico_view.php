<?php

Class consulta_medico_view{
    //atributos
public $cod_consulta;
public $data_consulta;
public $status;
public $cod_medico;
public $conn;
 

//metodos construção do objeto
    public function __Construct($conn){
        $this->conn=$conn;
    }
    //metodo crud
    public function Cadastro_consulta(
    $data_consulta,
    $status,
    $cod_medico
    )
    {
        $sql="insert into consulta_medico_view(data_consulta,status,cod_medico) values(?,?,?)";
        $resultado=$this->conn->prepare($sql); 
        $resultado->execute(array($data_consulta,$status,$cod_medico));
    }
    public function Listar_consulta(){
        $query="SELECT c.cod_consulta,c.data_consulta,c.status,medico.nome_medico FROM `consulta_medico_view`as c 
        INNER JOIN `medico` ON c.`cod_medico`= `medico`.`cod_medico`;";
		$stmt=$this->conn->prepare($query);
		$stmt->execute();		
		return $stmt;
    }
    public function Editar_consulta(){
      //  echo "<br>acessou editar consulta";
        $query="UPDATE `consulta_medico_view` SET `status`=? WHERE `cod_consulta`=? ";
		$stmt=$this->conn->prepare($query);
		$stmt->bindParam(1,$this->status);
        $stmt->bindParam(2,$this->cod_consulta);
		if($stmt->execute()){
			return true;
		}else{return false;
		}
    }
    //fecha o objeto
    public function Excluir(){
        echo "entrou no excluir id=".$this->cod_consulta;
        $query="DELETE FROM `consulta_medico_view` WHERE `cod_consulta`=? ";
		$stmt=$this->conn->prepare($query);
		$stmt->bindParam(1,$this->cod_consulta);
       	if($stmt->execute()){
			return true;
		}
        else{
            return false;
		}
    }
}

?>