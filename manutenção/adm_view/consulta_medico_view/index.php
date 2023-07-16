<?php

include "conexao.php";
    $conn = new Conexao;
    $conn->getConection();
    header("location:listar_consultas.php");
?>