<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<style>
    .modal a.close-modal {
        display: none;
    }
</style>

<main>
    <info></info>

    <div id="alert" class="modal center">
        <h4 class="center">Aviso!</h4>
        <p class="center" id="remove-message"></p>
        <div class="center">
            <input id="remove-id" type="hidden">
            <a class="button" rel="modal:close">Não</a>
            <a class="button button-primary" id="remove-post" rel="modal:close">Sim</a>
        </div>
    </div>
    <div class="container">
        <br>
        <h3>Usuário: <?= $_SESSION['user']['name'] ?></h3>
        <a href="/perfil/configuracao">Configurações</a>
        <div class="row">
            <div class="columns center">
                <br />
                <table class="u-full-width">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Data</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $value) {
                        ?>
                            <tr post-id="<?=$value['id']?>">
                                <td><?= $value['title'] ?></td>
                                <td><?= $value['create_date'] ?></td>
                                <td style="width: 45%;">
                                    <a class="button" href="/postagem/<?= $value['id'] ?>" target="_blank">Visualizar</a>
                                    <a class="button" href="/editar/<?= $value['id'] ?>">Editar</a>
                                    <a class="button" onclick="openModal(<?= $value['id'] ?>,'<?= $value['title'] ?>')">Remover</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="columns">
                        <a class="button" href="/criar">Criar novo Post</a>
                    </div>
                </div>
                <br />
            </div>
        </div>
    </div>
</main>

<script src="/js/perfil.js"></script>