<?php 
    //incluo as classes
        include_once '../conexao.php';
        include_once 'paciente.php';
    //crio o objeto

    if(!isset($_POST["Logar"])){
        session_start();
        $base=new Conexao();
    $db=$base->getConection();
    $acessar=new paciente($db);
    $acessar->CPF_paciente=$_POST["CPF_paciente"];
    $acessar->senha_paciente=$_POST["senha_paciente"];
    $stmt=$acessar->Logar();

 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
        if($qtde>=1){ 
        $_SESSION['usuario']=$nome_paciente;
        $_SESSION['cod_paciente']=$cod_paciente;
        //echo " usuario ".$_SESSION['usuario'];
        header('Location: consulta_paciente_view\listar_consultas_marcadas.php');  
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
    <title>Login Paciente - Clínica Vision</title>
</head>
<body>
    <div class="header">
        <p id="home">- Login Paciente -</p>
        <h1>Clínica Vision</h1>
            <ul class="menu">
                <li><a href="../home.html">Home</a></li>
                <li><a href="../listar_plano_saude.php">Plano de Saúde</a></li>
                <li><a href="../listar_medicos.php">Médicos</a></li>
                <li><a href="../consulta_blank.html">Consultas</a></li>
                <li><a href="paciente_view/login_paciente.php">Login</a></li>
            </ul>
    </div>
    <div id="form_login">
    <form action="login_paciente.php" method="POST">
        <h2>Login Paciente</h2><br>
        <label>CPF:</label>
        <input type="text" name="CPF_paciente">
        <label>Senha:</label>
        <input type="password" name="senha_paciente">
        <input type="submit" name="logar" value="Logar">
        </form>
    </div>    
        <div class="links">
        <div class="text1">
        <a href="cadastro_paciente.html" class="center" id="adm">Criar Conta</a>
        </div>
        <div class="text2">
        <a href="../adm_view/login_adm.php" class="center" id="adm">Administrador</a>
        </div>
      </div>
</body>
    <footer>
        <p>Contato: (99) 9999-9999 / (41) 3355-5566</p>
        <p>Email: ClinicaVision@gmail.com</p>
        <p>Redes Sociais: @ClinicVision</p>
        <a href="../sobre.html">Sobre nós</a>
    </footer>
</html>
