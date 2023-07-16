<?php
include "adm.php";
include "conexao.php";
$conexao = new conexao;
$conn = $conexao->getConection();
$adm = new adm($conn);
//abro o php
//escreva na tela o nome pelo metodo post

//criar variaveis
    $CEP=$_POST["CEP"];
    $rua=$_POST["rua"];
    $bairro=$_POST["bairro"];
    $numero=$_POST["numero"];
    $complemento_endereco=$_POST["complemento_endereco"];
    ///
    $CPF_adm=$_POST["CPF_adm"];
    $nome_adm=$_POST["nome_adm"];
    $data_nasc_adm=$_POST["data_nasc_adm"];
    $telefone_adm=$_POST["telefone_adm"];
    $senha_adm=$_POST["senha_adm"];
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
if(empty($CPF_adm) || strlen($CPF_adm)!=11){
    echo "<br>campo CPF vazio ou diferente de 11 caracteres";
    $erro=1;
}
if(empty($nome_adm) || strlen($nome_adm)>60){
    echo "<br>campo Nome Completo vazio ou campo acima de 60 caracteres";
    $erro=1;
}
if(empty($data_nasc_adm)){
    echo "<br>campo Data de Nascimento vazio";
    $erro=1;
}
if(empty($telefone_adm) || strlen($telefone_adm)>14){
    echo "<br>campo Telefone vazio ou campo acima de 14 caracteres";
    $erro=1;
}
if(empty($senha_adm)){
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

$adm->Cadastro_adm(
    $CEP,
    $rua,
    $bairro,
    $numero,
    $complemento_endereco,
    ///
    $CPF_adm,
    $nome_adm,
    $data_nasc_adm,
    $telefone_adm,
    $senha_adm 
);
$conn=NULL;//fechar conexao
//fecho o php
?>