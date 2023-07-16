<?php
//não foi possível excluir por causa da chave estrangeira
    include_once 'conexao.php';
    include_once 'consulta_medico_view.php';
    $conn= new Conexao();
    $bd=$conn->getConection();
    $consulta=new consulta_medico_view($bd);
    $consulta->cod_consulta=$_GET["id"];
    echo "codigo=".$consulta->cod_consulta;
   // echo "<script>alert('Deseja excluir o registro?');</script>";
    if($consulta->Excluir()){
        echo "Excluido com sucesso.";
    }else{
        echo "Erro ao excluir";
    }
?>