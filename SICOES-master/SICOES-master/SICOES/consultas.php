<?php

include_once("./conexao.php");

$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";

$sql = "select * from produto where nome like '%$filtro%'";
$consulta = mysqli_query($con,$sql);
$registros = mysqli_num_rows($consulta);

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="CSS/consultas.css">
    <link rel="stylesheet" type="text/css" href="CSS/main.css">
    <link rel="stylesheet" type="text/css" href="./CSS/slick.css" />
    <title>Consultas - SICOES</title>
</head>

<body>
    <header class="menu-inicio">
        <main>
            <div class="header-1">
                <div class="logo">
                    <img src="./img/img5.png" />
                </div>
            </div>
        </main>
    </header>

    <div class="card">
        <h2 class="title">Consultas</h2>
        <nav>
            <ul class="menu">
                <a href="./servicos.html">
                <li>Cadastro</li>
                </a>
                <a href="./consultas.php">
                    <li>Consulta</li>
                </a>
                <a href="./index.html">
                    <li>Voltar ao menu</li>
                </a>
            </ul>
        </nav>
        <section>
            <br><h1>CONSULTA DE ESTOQUE</h1><br>
            <hr>
            <form method="GET" action="">
            <br><b>Filtrar por nome</b></br> <input type="text" name="filtro" class="campo" required autofocus>
                <input type="submit" value="Pesquisar" class="btn">
            </form>           
            <?php

            while($exibirRegistros = mysqli_fetch_array($consulta)){

                $idProduto = $exibirRegistros[0];
                $nome = $exibirRegistros[1];
                $data = $exibirRegistros[2];
                $quantidade = $exibirRegistros[3];
                echo "<br>";
                echo "<article>";
                echo "ID: $idProduto<br>";
                echo "Produto: $nome<br>";
                echo "Data: $data<br>";
                echo "Quantidade: $quantidade";
                echo "<br><a href=delete_produto.php?id=".$exibirRegistros['id_produto']."'><b>Apagar</b></a></br><hr>";
                echo "</article>";
            }
            ?>
        </section>
    </div>
</body>

</html>