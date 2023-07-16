<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="home.css">
    <title>Planos de Saúde - Clínica Vision</title>
</head>
<body>
    <div class="header">
        <p id="home">- Planos de Saúde -</p>
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
        <div class="container">
            <div class="image">
                <img src="plano_saude.jpg" alt="Amil,Sul America,Unimed,ICS,Clinipan,Paraná Clinicas,Bradesco,consultas particulares">
            </div>
            <div class="text">
            <h2>Planos de Saúde</h2>
            <?php
//incluo as classes
include_once 'conexao.php';
include_once 'plano_saude.php';
//crio o objeto
$base=new Conexao();
//pego minha conexao
$db=$base->getConection();
//crio o objeto consulta_medico_view
$cat=new plano_saude($db);
//chama o metodo Listar_consulta
$stmt=$cat->listar_plano_saude();
echo "<table border=1>";
    echo "<tr>";
        echo "<td>Código</td>";
        echo "<td>Plano de Saúde</td>";
    echo "</tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
 
            extract($row);
 
            echo "<tr>"; 
                echo "<td>{$cod_plano_saude}</td>";
                echo "<td>{$nome_plano_saude}</td>";
             echo "</tr>";
    }
    echo "</table>";
    
?>

            </div>
        </div>

    </body>

    <footer>
        <p>Contato: (99) 9999-9999 / (41) 3355-5566</p>
        <p>Email: ClinicaVision@gmail.com</p>
        <p>Redes Sociais: @ClinicVision</p>
        <a href="sobre.html">Sobre nós</a>
    </footer>     
</html>

