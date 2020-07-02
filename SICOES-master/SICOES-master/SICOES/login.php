
<?php
    include_once('./conexao.php');
    session_start();
    if(isset($_POST['btn-entrar'])):
        $erros = array();
        $login = mysqli_escape_string($con, $_POST['login']);
        $senha = mysqli_escape_string($con, $_POST['senha']);

        if(empty($login) or empty($senha)):
                $erros[] = "<li> O campo login/senha precisa ser preenchido </li>";
            else:
                $sql = "SELECT login FROM usuario WHERE login = '$login'";
                $resultado = mysqli_query($con, $sql);
            
                if(mysqli_num_rows($resultado) > 0):
                    $sql = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha'";
                    $resultado = mysqli_query($con, $sql);
                        if(mysqli_num_rows($resultado) == 1):
                            $dados = mysqli_fetch_array($resultado);
                            $_SESSION['logado'] = true;
                            $_SESSION['id_usuario'] = $dados['id'];
                            header('Location: index.html');
                        else:
                            $erros[] = "<article> Senha incorreta </article>";
                        endif;
            else:
                $erros[] = "<article> Usuário inexistente </article>";
            endif;
        endif;
endif;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="CSS/tela-login.css">
    <link rel="stylesheet" type="text/css" href="CSS/main.css">
    <link rel="stylesheet" type="text/css" href="./CSS/slick.css" />
    <title>Login - SICOES</title>
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

    <form class="form" method="POST" action="">
        <div class="card">
            <div class="card-top">
                <img class="imglogin" src="./img/login.png" alt="" />
                <h2 class="title">Painel de controle</h2>
                <p>Gerencie seu próprio negócio</p>
            </div>
            <div class="card-grupo">
                <label>Usuário</label>
                <input type="text" name="login" placeholder="Digite aqui a sua chave de usuário." required>
            </div>

            <div class="card-grupo">
                <label>Senha</label>
                <input type="password" name="senha" placeholder="Digite aqui a sua senha." required>
            </div>
        
            <div class="card-grupo">
                <label><input type="checkbox" name="lembrar-senha">Lembre-me</label>
            </div>

            <div class="card-grupo btn">
                <button type="submit" name="btn-entrar">ACESSAR</button>
            </div>              
            <?php
                if(!empty($erros)):
                    foreach($erros as $erro):
                        print $erro;
                    endforeach;
                endif;
            ?>
    </form>
</body>

</html>