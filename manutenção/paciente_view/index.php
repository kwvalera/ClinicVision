<?php

include "conexao.php";
    $conn = new Conexao;
    $conn->getConection();
echo "<a href=consulta_paciente_view\listar_consultas_marcadas.php>Entrar</a";
?>