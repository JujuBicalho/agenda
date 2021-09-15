<?php
include_once("templates/header.php");
?>
    
    <!--Mensagem de sessão-->
    <!--Para testar a mensagem da sessão <p id="msg">TESTANDO MENSAGEM</p> -->
    <div class="container">
        <?php if(isset($printMsg) && $printMsg != ""): ?>
            <p id="msg"><?=$printMsg?></p>
        <?php endif; ?>

        <h1 id="main-title">MINHA AGENDA</h1>
        <?php if(count($contacts) > 0): ?> <!--Caso o número de contato seja maior do que zero aparecerá-->
            <table class="table" id="contacts-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Comentário</th>
                    <th scope="col"></th> <!--Em branco porque são as ações da tabela-->
                </tr>
            </thead>
            <tbody>
                <?php foreach($contacts as $contact): ?> <!--Mostrar contatos-->
                    <tr class="tr_row">
                        <td scope="row" class="col-id"><?= $contact["id"] ?></td>
                        <td scope="row"><?= $contact["name"] ?></td>
                        <td scope="row"><?= $contact["phone"] ?></td>
                        <td scope="row"><?= $contact["observations"] ?></td>
                        <td class="actions"> <!--Inclusão dos ícones de edição-->
                          <a href="<?= $BASE_URL ?>show.php?id=<?= $contact["id"] ?>"><i class="fas fa-eye check-icon"></i></a> <!--Visualizar contato-->
                          <a href="<?= $BASE_URL ?>edit.php?id=<?=$contact["id"] ?>"><i class="fas fa-edit edit-icon"></i>  <!--Editar contato-->
                          <form class="delete-form" action="<?=$BASE_URL ?>config/process.php" method="POST"> <!--Deletar contato-->
                             <input type="hidden" name="type" value="delete">
                             <input type="hidden" name="id"   value="<?=$contact["id"]?>">
                               <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i>
                               </button>
                          </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        <?php else: ?> <!--Como não vai ter contato isso fará com que ele adicione-->
           <p id="empty-list-text"> Sem contatos no momento. <a href="<?=$BASE_URL?>create.php">
           Adicionar aqui</a></p>
        <?php endif; ?>
    </div>


<?php
include_once("templates/footer.php");
?>