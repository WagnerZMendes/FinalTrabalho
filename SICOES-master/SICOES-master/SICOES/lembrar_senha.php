<?php
if(isset($_POST["lembrar_senha"])){
$senha=$_POST["senha"];
$tempo_expiracao= 3600; //uma hora
setcookie("lembrar", $senha, $tempo_expiracao);
}
?>