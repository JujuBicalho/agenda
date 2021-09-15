<?php
include_once("templates/header.php");
?>

<!--Actions-->
<div class="container" id="view-contact-container">
    <!--Botão de voltar-->
    <?php include_once("templates/backbtn.html"); ?>
    <h1 id="main-title"><?=$contact["name"] ?></h1>
    <p class="bold">Telefone:</p>
    <p><?=$contact["phone"] ?><p>
    <p class="bold">Comentário:</p>
    <p><?=$contact["observations"] ?><p>
</div>

<?php
include_once("templates/footer.php");
?>