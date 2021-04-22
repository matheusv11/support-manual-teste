<main>
    <info></info>
    <div class="container">
        <div class="row">
            <div class="columns">
                <h2 class="center">Alteração de senha</h2>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="columns center">
                <form method="POST">
                    <div class="row">
                        <div class="columns">
                            <label>Senha Atual</label>
                            <input type="password" name="old_password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="columns">
                            <label>Nova Senha</label>
                            <input type="password" name="new_password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="columns">
                            <label>Nova Senha Novamente</label>
                            <input type="password" name="new_password_verify">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="columns">
                            <button class="button button-primary">Alterar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<script src="/js/senha.js"></script>