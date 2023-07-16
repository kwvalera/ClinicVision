<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="../../home.css">
        <title>Marcar Consulta</title> 
    </head>
    <body>
    <div class="header">
        <p id="home">- Marcar Consulta -</p>
        <h1>Clínica Vision</h1>
            <ul class="menu">
            <li><a href="listar_consultas_marcadas.php">Consultas Marcadas</a></li>
                <li><a href="marcar_consulta.php" id="adm">Marcar Consulta</a></li>
                <li><a href="../../home.html">Sair</a></li>
            </ul>
    </div>
    <div id="form_login">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
      <form action="marcar_consulta.php" method="post">
            <!--endereço-->
            <h2>Marcar Consulta</h2>
            <label>Código da Consulta:</label>
            <input type="number" name="cod_consulta">
            <label>Paciente:</label>
            <input type="number" name="cod_paciente"><br><br>
            
          <input type="submit" name="salvar" value="Marcar">
          <input type="reset" name="cancelar" value="Cancelar">
        </form>
        <?php
include "consulta_paciente_view.php";
include "conexao.php";
include "../../adm_view/consulta_medico_view/consulta_medico_view.php";
$base=new Conexao();
//pego minha conexao
$db=$base->getConection();
//crio o objeto consulta_medico_view
$cat=new consulta_medico_view($db);
//chama o metodo Listar_consulta
$stmt=$cat->Listar_consulta();
echo "<h2>Consultas Disponíveis</h2>";
echo "<table border=1>";
        echo "<tr>";
            echo "<td>Código</td>";
            echo "<td>Data da Consulta</td>";
            echo "<td>Status</td>";
            echo "<td>Médico</td>";
        echo "</tr>";
 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
 
            extract($row);
 
            echo "<tr>"; 
                echo "<td>{$cod_consulta}</td>";
                echo "<td>{$data_consulta}</td>";
                echo "<td>{$status}</td>";
                echo "<td>{$nome_medico}</td>";
	// edit and delete button is here
                
            echo "</tr>";
            echo "<style>
    a {
    color: blue;
    background-color: transparent;
    text-decoration: none;}</style>";

    //echo "<td><a href='excluir_consulta.php?id={$cod_consulta}' class='delete-object'>Delete</a></td>";
             
    }
    echo "</table>";
    $db=NULL;
$conexao = new conexao;
$conn = $conexao->getConection();
$consulta_medico_view = new consulta_paciente_view($conn);
//abro o php
//escreva na tela o nome pelo metodo post

//criar variaveis
    $cod_consulta=$_POST["cod_consulta"];
    $cod_paciente=$_POST["cod_paciente"];
$erro=0;
if(empty($cod_consulta)){
    echo "<br>campo Consulta da consulta vazio";
    $erro=1;
}
if(empty($cod_paciente)){
    echo "<br>campo Paciente vazio";
    $erro=1;
}
else{
    $status=0;
}
if($erro==1){
    //header("location:cadastro.html");//carrega a pagina
    exit;
}
else{
    header("location:editar_consulta.php");
    echo "<p>Confirmar Consulta :)</p>";
    echo "<a href='editar_consulta.php'>Confirmar</a>";
}

$consulta_medico_view->Marcar_consulta(
    $cod_consulta,
    $cod_paciente
);
$conn=NULL;//fechar conexao
//fecho o php
?>
    </body>
    <footer>
      <p>Contato: (99) 9999-9999 / (41) 3355-5566</p>
      <p>Email: ClinicaVision@gmail.com</p>
      <p>Redes Sociais: @ClinicVision</p>
      <a href="../../sobre.html">Sobre nós</a>
    </footer>     
</html>
