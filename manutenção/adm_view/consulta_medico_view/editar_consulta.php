<?php
require('conexao.php');
require('consulta_medico_view.php');
$base=new Conexao();
    $db=$base->getConection();
    $consulta= new consulta_medico_view($db);
  
    
    @$codigo= $_GET["id"];
   
    if(isset($_POST["Editar"])){
         $consulta->status= $_POST["status"];
         $consulta->cod_consulta= $_POST["cod_consulta"];
             header("location:listar_consultas.php");

if($_POST["status"]){
    $consulta->status=1;
}else{
    $consulta->status=0;
}
       
       if ($consulta->Editar_consulta()){
        echo "Consulta Marcada";
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
        <title>Confirmar Consulta</title> 
    </head>
<body>
    <div class="header">
        <p id="home">- Marcar Consulta -</p>
        <h1>Clínica Vision</h1>
            <ul class="menu">
            <li><a href="listar_consultas.php">Consultas</a></li>
                <li><a href="cadastro_consulta.html" id="adm">Criar Nova Consulta</a></li>
                <li><a href="../../home.html">Sair</a></li>
            </ul>
    </div>
    <br><br>
    <h2>Editar Status da Consulta</h2>
    <form action= "editar_consulta.php" method="POST">
    <label>Consulta</label>
    <input type="checkbox" name="status" value="on">
    <input type="text" name="cod_consulta" value="<?php echo $codigo;?>">
    <input type="submit" name="Editar" value="Editar">
    <input type="reset" name="Cancelar" value="Cancelar">
    <br><br>
</body>
<footer>
      <p>Contato: (99) 9999-9999 / (41) 3355-5566</p>
      <p>Email: ClinicaVision@gmail.com</p>
      <p>Redes Sociais: @ClinicVision</p>
      <a href="../../sobre.html">Sobre nós</a>
</footer>     
</html>