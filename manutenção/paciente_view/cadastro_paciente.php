<?php
include "paciente.php";
include "conexao.php";
$conexao = new conexao;
$conn = $conexao->getConection();
$paciente = new paciente($conn);
//abro o php
//escreva na tela o nome pelo metodo post

//criar variaveis
    $CEP=$_POST["CEP"];
    $rua=$_POST["rua"];
    $bairro=$_POST["bairro"];
    $numero=$_POST["numero"];
    $complemento_endereco=$_POST["complemento_endereco"];
    ///
    $CPF_paciente=$_POST["CPF_paciente"];
    $nome_paciente=$_POST["nome_paciente"];
    $data_nasc_paciente=$_POST["data_nasc_paciente"];
    $telefone_paciente=$_POST["telefone_paciente"];
    $cod_plano_saude=$_POST["cod_plano_saude"];
    $senha_paciente=$_POST["senha_paciente"];
$erro=0;
if(empty($CEP) || strlen($CEP)>8){
    echo "<br>campo CEP vazio ou campo acima de 8 caracteres";
    $erro=1;
}
if(empty($rua) || strlen($rua)>40){
    echo "<br>campo Rua vazio ou campo acima de 40 caracteres";
    $erro=1;
}
if(empty($bairro) || strlen($bairro)>20){
    echo "<br>campo Bairro vazio ou campo acima de 20 caracteres";
    $erro=1;
}
if(empty($CPF_paciente) || strlen($CPF_paciente)!=11){
    echo "<br>campo CPF vazio ou diferente de 11 caracteres";
    $erro=1;
}
if(empty($nome_paciente) || strlen($nome_paciente)>60){
    echo "<br>campo Nome Completo vazio ou campo acima de 60 caracteres";
    $erro=1;
}
if(empty($data_nasc_paciente)){
    echo "<br>campo Data de Nascimento vazio";
    $erro=1;
}
if(empty($telefone_paciente) || strlen($telefone_paciente)>14){
    echo "<br>campo Telefone vazio ou campo acima de 14 caracteres";
    $erro=1;
}
if(empty($senha_paciente)){
    echo "<br>campo Senha vazio";
    $erro=1;
}
if($erro==1){
    //header("location:cadastro.html");//carrega a pagina
    exit;
}
else{
    echo "<p>Conta Criada :)</p>";
    echo "<a href=../home.html>Voltar</a>";
}

$paciente->Cadastro_paciente(
    $CEP,
    $rua,
    $bairro,
    $numero,
    $complemento_endereco,
    ///
    $CPF_paciente,
    $nome_paciente,
    $data_nasc_paciente,
    $telefone_paciente,
    $cod_plano_saude,
    $senha_paciente 
);
$conn=NULL;//fechar conexao
//fecho o php
?>