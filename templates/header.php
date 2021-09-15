<?php

include_once("config/url.php");
include_once("config/process.php");

//Quando carregar a página limpa a mensagem da sessão de quando atualiza,deleta,cria contato
if(isset($_SESSION["msg"])) {
    $printMsg = $_SESSION["msg"];
    $_SESSION["msg"] = "" ;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css" integrity="sha512-6KY5s6UI5J7SVYuZB4S/CZMyPylqyyNZco376NM2Z8Sb8OxEdp02e1jkKk/wZxIEmjQ6DRCEBhni+gpr9c4tvA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=$BASE_URL?>css/style.css"> <!--linkando CSS no PHP-->
    <title>Agenda de Contatos</title>
</head>
<body>
    <header>
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="<?= $BASE_URL?>index.php"> <!--Leva sempre a home ao clicar no logo-->
                <img src="<?=$BASE_URL ?>img/agenda.png" width="50px" alt="Agenda">
            </a>

            <div>
                <div class="navbar-nav">
                    <a class="nav-link active" id="home-link" href="<?= $BASE_URL?>index.php">AGENDA</a>
                    <a class="nav-link active" id="home-link" href="<?= $BASE_URL?>create.php">ADICIONAR CONTATO</a>
                </div>
            </div>

        </nav>
    </header>