<?php
    require_once('../classes/conexaobd.class.php');
    
    $con = new ConexaoBD();
    $link = $con->criaConexao();
    
    $codCliente = $_GET['codCliente'];
    $query = "delete from cenario where codCliente = $codCliente";
    
    $resultado = $link->exec($query);
    
    echo $resultado;