<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../home.css">
    <title>Consultas Marcadas - Clínica Vision</title>
</head>
<body>
    <div class="header">
        <p id="home">- Consultas Marcadas -</p>
        <h1>Clínica Vision</h1>
            <ul class="menu">
                <li><a href="listar_consultas_marcadas.php">Consultas Marcadas</a></li>
                <li><a href="marcar_consulta.php" id="adm">Marcar Consulta</a></li>
                <li><a href="../../home.html">Sair</a></li>
            </ul>
    </div>
<?php
//incluo as classes
include_once 'conexao.php';
include_once 'consulta_paciente_view.php';
//crio o objeto
$base=new Conexao();
//pego minha conexao
$db=$base->getConection();
//crio o objeto consulta_medico_view
$cat=new consulta_paciente_view($db);
//chama o metodo Listar_consulta
$stmt=$cat->Listar_consultas_marcadas();
echo "<h2>Consultas Marcadas - Paciente</h2>";
echo "<table border=1>";
    echo "<tr>";
        echo "<td>Paciente</td>";
        echo "<td>Consultas</td>";
        echo "<td>Data da Consulta</td>";
    echo "</tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
 
            extract($row);
 
            echo "<tr>"; 
                echo "<td>{$cod_paciente}</td>";
                echo "<td>{$cod_consulta_marcada}</td>";
                echo "<td>{$data_consulta}</td>";
             echo "</tr>";
    }
    echo "</table>";
    
?>
<br>
<a href="marcar_consulta.php" id="adm">Marcar Consulta</a><br><br>
    </body>

    <footer>
        <p>Contato: (99) 9999-9999 / (41) 3355-5566</p>
        <p>Email: ClinicaVision@gmail.com</p>
        <p>Redes Sociais: @ClinicVision</p>
        <a href="sobre.html">Sobre nós</a>
    </footer>     
</html>
