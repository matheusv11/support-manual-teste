<link rel="stylesheet" href="/css/posts.css">

<main>
    <div class="container">
        <div class="row">
            <div class="columns center">
                <label>Filtre pelo nome da postagem</label>
                <input type="text" id="post-filter">
            </div>
        </div>
        <div class="row">
            <table class="u-full-width">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Dificuldade</th>
                        <th style="width:150px">Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data as $key => $value) {
                    ?>
                        <tr onclick="window.location.href='postagem/<?=$value['id']?>'">
                            <td><?= $value['title'] ?></td>
                            <td><?= $value['difficulty'] ?></td>
                            <td><?= $value['create_date'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<script>
    $("#post-filter").keyup((e) => {
        let filtro = $("#post-filter").val();
        mapearPosts(filtro);
    })

    function mapearPosts(filtro) {
        filtro = filtro.toUpperCase();
        let linhas = $('tr');
        for (let i = 1; i < $('tr').length; i ++ ){
            if(linhas[i].children[0].innerText.toUpperCase().indexOf(filtro) > -1){
                linhas[i].style.display = "";
            }else{
                linhas[i].style.display = "none"
            }
        }
    }
</script>