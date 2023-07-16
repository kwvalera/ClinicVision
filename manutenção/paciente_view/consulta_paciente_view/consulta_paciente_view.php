<?php

Class consulta_paciente_view{
    //atributos
public $cod_consulta_marcada;
public $data_consulta;
public $cod_consulta;
public $cod_paciente;
public $status;
public $conn;
 

//metodos construção do objeto
    public function __Construct($conn){
        $this->conn=$conn;
    }
    //metodo crud
    public function Marcar_consulta(
    $cod_consulta,
    $cod_paciente
    )
    {
        $sql="insert into consulta_paciente_view(cod_consulta,cod_paciente) values(?,?)";
        $resultado=$this->conn->prepare($sql); 
        $resultado->execute(array($cod_consulta,$cod_paciente));
    }
    public function Listar_consultas_marcadas(){
        $query="SELECT c.cod_consulta_marcada,consulta_medico_view.data_consulta, c.cod_paciente FROM `consulta_paciente_view`as c 
                INNER JOIN `consulta_medico_view` ON c.`cod_consulta`= `consulta_medico_view`.`cod_consulta` WHERE 1;";
		$stmt=$this->conn->prepare($query);
		$stmt->execute();		
		return $stmt;
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
    public function Editar(){
        $query="UPDATE `consulta_medico_view` SET `status`=? WHERE `cod_consulta`=? ";
		$stmt=$this->conn->prepare($query);
		$stmt->bindParam(1,$this->status);
        $stmt->bindParam(2,$this->cod_consulta);
		if($stmt->execute()){
			return true;
		}else{return false;
		}
    }
}

?>