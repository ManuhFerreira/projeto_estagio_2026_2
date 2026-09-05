<?php
    require 'rb.php';
    R::setup ('mysql:host=localhost;dbname=projeto_estagio_2026_2',
        'root', '');

    $id_pessoa = $_GET['id'];

    $pessoa = R::load('tbpessoas', $id_pessoa);

    R::trash($pessoa);

    header ("Location: lista.php");
    exit;
?>