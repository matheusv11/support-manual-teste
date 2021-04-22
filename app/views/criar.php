<info></info>
<div id="top">
    <div id="preview">
    </div>
</div>

<hr />

<div class="container">
    <form method="POST">
        <div class="row">
            <div class="four columns center preview">
                <label>Titulo do post</label>
                <input type="text" name="postName" required>
            </div>
            <div class="four columns center preview">
                <label>Dificuldade</label>
                <select name="postDifficulty">
                    <option value="1">Baixa</option>
                    <option value="2">Média</option>
                    <option value="3">Alta</option>
                </select>
            </div>
            <div class="four columns center preview">
                <label>Imagem do post</label>
                <input type="text" name="imageUrl">
            </div>
        </div>
        <div class="row">
            <div class="columns center preview">
                <textarea id="postCode" name="postCode" spellcheck="false"><h1>Exemplo</h1></textarea>
            </div>
        </div>
        <div class="row">
            <div class="six columns center">
                <button id="switch" onclick="switchTopBottom()" type="button">Mudar para Baixo</button>
            </div>
            <div class="six columns center">
                <button type="submit">Criar Post</button>
            </div>
        </div>
    </form>
</div>

<hr />

<div id="bottom">
    <div id="preview">
    </div>
</div>

<script src="/js/textarea.js"></script>
<script src="/js/criar.js"></script>