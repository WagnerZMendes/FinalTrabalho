<?php

    include_once('./conexao.php');

    $nome = isset($_POST['nome'])?$_POST['nome']:"";
    $data = isset($_POST['data'])?$_POST['data']:"";
    $quantidade = isset($_POST['quantidade'])?$_POST['quantidade']:"";

    $sql = "INSERT INTO produto (nome,data,quantidade)VALUES('$nome','$data','$quantidade')";
    $salvar = mysqli_query($con,$sql);

    $linhas = mysqli_affected_rows($con);

    mysqli_close($con);
    header('Location: servicos.html');
    
?>