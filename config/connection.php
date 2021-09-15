<?php

$host = "localhost";
$dbname = "agenda";
$user = "root";
$pass = "";

//Para exibir erro caso algo dê errado na conexão com o banco de dados
try {

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    //Para o software e exibe um erro caso tenha
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


}catch(PDOException $e) {
    //Aqui vai mostrar o erro
    $error = $e->getMessage();
    echo "Erro: $error";
}

