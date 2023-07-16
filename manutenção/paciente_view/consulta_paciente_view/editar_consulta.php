<?php
require('../conexao.php');
require('consulta_paciente_view.php');
$base=new Conexao();
    $db=$base->getConection();
    $consulta= new consulta_paciente_view($db);
  
    
    @$codigo= $_GET["cod_consulta"];
   
    if(isset($_POST["Editar"])){
         $consulta->status= $_POST["status"];
         $consulta->cod_consulta= $_POST["cod_consulta"];
if($_POST["status"]){
    $consulta->status=1;
}else{
    $consulta->status=0;
}
       
       if ($consulta->Editar()){
        echo "Consulta Marcada";
        header("location:listar_consultas_marcadas.php");
    }
       else{
        echo "Erro na Marcação";
       }
    }
      
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="../../home.css">
    <title>Confirmar</title>
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
        <h2>Confirmar/Desmarcar Consulta</h2>
        <form action= "editar_consulta.php" method="POST">
        <label>Consulta</label>
        <input type="checkbox" name="status" value="on">
        <label>Código da Consulta</label>
        <input type="text" name="cod_consulta" value="<?php echo $codigo;?>">
        <input type="submit" name="Editar" value="Marcar">
        <input type="reset" name="Cancelar" value="Cancelar">
        <br><br></form>
    </div>    
</body>
    <footer>
        <p>Contato: (99) 9999-9999 / (41) 3355-5566</p>
        <p>Email: ClinicaVision@gmail.com</p>
        <p>Redes Sociais: @ClinicVision</p>
        <a href="../../sobre.html">Sobre nós</a>
    </footer>     
</html>