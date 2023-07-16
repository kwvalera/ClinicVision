<?php
include "consulta_medico_view.php";
include "conexao.php";
$conexao = new conexao;
$conn = $conexao->getConection();
$consulta_medico_view = new consulta_medico_view($conn);
//abro o php
//escreva na tela o nome pelo metodo post

//criar variaveis
    $data_consulta=$_POST["data_consulta"];
    $status=$_POST["status"];
    $cod_medico=$_POST["cod_medico"];
$erro=0;
if(empty($data_consulta)){
    echo "<br>campo Data e Horário da consulta vazio";
    $erro=1;
}
if(empty($cod_medico)){
    echo "<br>campo Médico vazio";
    $erro=1;
}
if($status){
    $status=1;
}else{
    $status=0;
}
if($erro==1){
    exit;
}
else{
    header("location:listar_consultas.php");
}

$consulta_medico_view->Cadastro_consulta(
    $data_consulta,
    $status,
    $cod_medico
);
$conn=NULL;//fechar conexao
//fecho o php
?>