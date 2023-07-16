<?php

include "conexao.php";
    $conn = new Conexao;
    $conn->getConection();
    header("location:home.html");
?>