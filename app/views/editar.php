<info></info>
<div id="top">
    <div id="preview">
    </div>
</div>

<hr />

<div class="container">
    <form method="POST">
        <input name="id" value="<?=$data['id']?>" type="hidden">
        <div class="row">
            <div class="four columns center preview">
                <input name="postName" value="<?=$data['title']?>" required>
            </div>
            <div class="four columns center preview">
                <select name="postDifficulty">
                
                    <option disabled>Dificuldade</option>
                    <option value="1" <?php echo ($data['difficulty'] == 1) ? "selected" : ""; ?> >Baixa</option>
                    <option value="2" <?php echo ($data['difficulty'] == 2) ? "selected" : ""; ?> >Média</option>
                    <option value="3" <?php echo ($data['difficulty'] == 3) ? "selected" : ""; ?> >Alta</option>
                </select>
            </div>
            <div class="four columns center preview">
                <input name="imageUrl" value="<?=$data['imageUrl']?>">
            </div>
        </div>
        <div class="row">
            <div class="columns center preview">
                <textarea id="postCode" name="postCode" spellcheck="false"><?=$data['content']?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="six columns center">
                <button id="switch" onclick="switchTopBottom()" type="button">Mudar para Baixo</button>
            </div>
            <div class="six columns center">
                <button type="submit">Atualizar Post</button>
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
<script src="/js/editar.js"></script>