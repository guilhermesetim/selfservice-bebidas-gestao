<?php 
     
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $login_admin = "admin";
    $senha_admin = "senha";


    if($login == $login_admin && $senha == $senha_admin)  {
        header("location: geral.php");
    }
    else {
        header("location: falha.php"); 
    }

?>