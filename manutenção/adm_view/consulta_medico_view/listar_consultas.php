<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../home.css">
    <title>Consultas - Clínica Vision</title>
</head>
<body>
    <div class="header">
        <p id="home">- Consultas -</p>
        <h1>Clínica Vision</h1>
            <ul class="menu">
            <li><a href="listar_consultas.php">Consultas</a></li>
                <li><a href="cadastro_consulta.html" id="adm">Criar Nova Consulta</a></li>
                <li><a href="../../home.html">Sair</a></li>
            </ul>
    </div>
<?php
//incluo as classes
include_once 'conexao.php';
include_once 'consulta_medico_view.php';
//crio o objeto
$base=new Conexao();
//pego minha conexao
$db=$base->getConection();
//crio o objeto consulta_medico_view
$cat=new consulta_medico_view($db);
//chama o metodo Listar_consulta
$stmt=$cat->Listar_consulta();
echo "<h2>Consultas</h2>";
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
                
                echo "<td><a href='editar_consulta.php?id={$cod_consulta}'>Editar</a></td>";
            echo "</tr>";
            echo "<style>
    a {
    color: blue;
    background-color: transparent;
    text-decoration: none;}</style>";

    //echo "<td><a href='excluir_consulta.php?id={$cod_consulta}' class='delete-object'>Delete</a></td>";
             
    }
    echo "</table>";
?>
<br>
<a href="cadastro_consulta.html" id="adm">Criar Consulta</a><br><br>
<!--<a href="marcar_consulta.php" id="adm">Marcar Consulta</a><br><br>-->
    </body>

    <footer>
        <p>Contato: (99) 9999-9999 / (41) 3355-5566</p>
        <p>Email: ClinicaVision@gmail.com</p>
        <p>Redes Sociais: @ClinicVision</p>
        <a href="../../sobre.html">Sobre nós</a>
    </footer>     
</html>
