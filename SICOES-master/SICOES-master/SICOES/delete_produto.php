<?php
session_start();

include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){

    $result_produto = "Delete FROM produto WHERE id_produto='$id'";
    $resultado_produto = mysqli_query($con, $result_produto);
    if(mysqli_affected_rows($con)){
        $_SESSION['msg'] = "<p style='color:blue;'>Produto apagado com sucesso</p>";
        header("Location: consultas.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Produto não foi </p>";
        header("Location: consultas.php");
    }
}else{
    $_SESSION['msg'] = "<p style='color:red;'>Necessario selecionar um produto </p>";
    header("Location: consultas.php");
}
?>