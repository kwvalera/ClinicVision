<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="home.css">
    <title>Médicos - Clínica Vision</title>
</head>
<body>
    <div class="header">
        <p id="home">- Médicos -</p>
        <h1>Clínica Vision</h1>
            <ul class="menu">
                <li><a href="home.html">Home</a></li>
                <li><a href="listar_plano_saude.php">Plano de Saúde</a></li>
                <li><a href="listar_medicos.php">Médicos</a></li>
                <li><a href="consulta_blank.html">Consultas</a></li>
                <li><a href="paciente_view/login_paciente.php">Login</a></li>
            </ul>
    </div>
<br>
<h2>Médicos da Clínica</h2>
<?php
//incluo as classes
include_once 'conexao.php';
include_once 'medicos.php';
//crio o objeto
$base=new Conexao();
//pego minha conexao
$db=$base->getConection();
//crio o objeto consulta_medico_view
$cat=new medicos($db);
//chama o metodo Listar_consulta
$stmt=$cat->listar_medicos();
echo "<table class='table'>";
    echo "<tr>";
        echo "<td>Código</td>";
        echo "<td>Médico</td>";
        echo "<td>CRM</td>";
        echo "<td>Especialidade</td>";
        echo "<td>Formação</td>";
        echo "<td>Complemento</td>";
    echo "</tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
 
            extract($row);
 
            echo "<tr>"; 
                echo "<td>{$cod_medico}</td>";
                echo "<td>{$nome_medico}</td>";
                echo "<td>{$CRM_medico}</td>";
                echo "<td>{$especialidade_medico}</td>";
                echo "<td>{$formacao_medico}</td>";
                echo "<td>{$complemento_medico}</td>";
             echo "</tr>";
    }
    echo "</table>";
    
?>
<br><br>
    </body>

    <footer>
        <p>Contato: (99) 9999-9999 / (41) 3355-5566</p>
        <p>Email: ClinicaVision@gmail.com</p>
        <p>Redes Sociais: @ClinicVision</p>
        <a href="sobre.html">Sobre nós</a>
    </footer>     
</html>