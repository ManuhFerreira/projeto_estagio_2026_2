<?php
    session_start();

    if(!isset($_SESSION['logado']) || $_SESSION['logado'] !== true){
        header("Location: formulario.php");
        exit;
    }

    require 'conexaoBD.php';

    $id_pessoa = $_GET['id'];

    $pessoa = R::load('tbpessoas', $id_pessoa);

    R::trash($pessoa);

    header ("Location: lista.php");
    exit;
?>