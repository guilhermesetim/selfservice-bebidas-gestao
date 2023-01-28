<?php 
    // Informações do banco de dados
    $user = "root"; 
    $password = ""; // informar senha do banco da dados
    $database = "arduino"; 
    $hostname = "localhost";  // O hostname deve ser sempre localhost 

    // Conecta com o servidor de banco de dados 
    $bancoDeDados = mysqli_connect( $hostname, $user, $password,  $database ) ; 

    // Seleciona o banco de dados 
    mysqli_select_db( $bancoDeDados,$database ) ;   
?>