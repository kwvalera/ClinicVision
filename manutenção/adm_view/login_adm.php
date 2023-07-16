<?php
//incluo as classes
    include_once 'conexao.php';
    include_once 'adm.php';
//crio o objeto

if(!isset($_POST["Logar"])){
    session_start();
    $base=new Conexao();
$db=$base->getConection();
$acessar=new adm($db);
$acessar->CPF_adm=$_POST["CPF_adm"];
$acessar->senha_adm=$_POST["senha_adm"];
    $stmt=$acessar->Logar();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
    if($qtde>=1){ 
        $_SESSION['usuario']=$nome_adm;
        $_SESSION['cod_adm']=$cod_adm;
        //echo " usuario ".$_SESSION['usuario'];
        header('Location:consulta_medico_view\listar_consultas.php');
    }else{
        unset($_SESSION['usuario']);
        echo "usuario inválido";
    }
    }
    }else{
        echo "botão vazio";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../home.css">
    <title>Login Administrador - Clínica Vision</title>
</head>
<body>
    <div class="header">
        <p id="home">- Login Administrador -</p>
        <h1>Clínica Vision</h1>
            <ul class="menu">
                <li><a href="../home.html">Home</a></li>
                <li><a href="../listar_plano_saude.php">Plano de Saúde</a></li>
                <li><a href="../listar_medicos.php">Médicos</a></li>
                <li><a href="../consulta_blank.html">Consultas</a></li>
                <li><a href="../paciente_view/login_paciente.php">Login</a></li>
            </ul>
    </div>
    <div id="form_login">
        <form action="login_adm.php" method="POST">
        <br><h2>Login Administrador</h2><br>
        <label>CPF:</label>
        <input type="text" name="CPF_adm">
        <label>Senha:</label>
        <input type="password" name="senha_adm">
        <input type="submit" name="logar" value="Logar">
    </div>
        <a href="cadastro_adm.html" class="center" id="adm">Criar Conta</a><br>
</body>
    <footer>
        <p>Contato: (99) 9999-9999 / (41) 3355-5566</p>
        <p>Email: ClinicaVision@gmail.com</p>
        <p>Redes Sociais: @ClinicVision</p>
        <a href="../sobre.html">Sobre nós</a>
    </footer>
</html>
