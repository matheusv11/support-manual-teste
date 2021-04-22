<div class="container">
  <div class="row">
    <div class="twelve columns">
      <div class="post-container">
        <h1 class="center">Clonagem de cliente</h1>
        <p class="center">
          Utilize o comando <code>wapstore sources -l</code> para listar todos os clientes que podem ser clonados.
        </p>
        <div class="image-content">
          <img src="/images/posts/1/1.png" alt="resultado">
          <small>Você terá este resultado no console</small>
        </div>
        <br>
        <p>
          Após selecionar uma hash, utilize o comando <code>wapstore clone cliente/site</code> para clonar o cliente em seu local.
        </p>
        <p>
          Você pode vir a ter problemas de permissão no projeto, então é necessário executar o comando chmod para atualizar as permissões dos arquivos recem clonados.
          <code>sudo chmod 777 -R site</code>
        </p>
        <p>
          Após a configuração de permissões da pasta, entre no diretório através do comando <code>cd site</code>.
          Você agora precisa compilar o core do cliente para começar a fazer suas alterações.
          Como é a primeira compilação Utilize o comando <code>wapstore build --core</code> que irá gerar a bin e arquivos necessários.
        </p>
        <p>
          Por fim, você apenas precisa configurar o arquivo de conexão com o banco de dados. Este é o <strong>db.php.</strong> Dentro dele você encontrará a seguinte estrutura:
          <br>
          <br>
          <code class="code-block">
            $localDataBase = [<br>
            &nbsp;&nbsp;&nbsp;&nbsp;'host'=>'localhost',<br>
            &nbsp;&nbsp;&nbsp;&nbsp;'user'=>'',<br>
            &nbsp;&nbsp;&nbsp;&nbsp;'pass'=>'',<br>
            &nbsp;&nbsp;&nbsp;&nbsp;'name'=>''<br>
            ];
          </code>
          <br>
          Você deve configurá-lo com os dados do seu banco local. Caso esteja utilizando a imagem do docker que a webart disponibiliza, o seu arquivo deverá ficar assim:
          <br>
          <br>
          <code class="code-block">
            $localDataBase = [<br>
            &nbsp;&nbsp;&nbsp;&nbsp;'host'=>'db',<br>
            &nbsp;&nbsp;&nbsp;&nbsp;'user'=>'root',<br>
            &nbsp;&nbsp;&nbsp;&nbsp;'pass'=>'toor',<br>
            &nbsp;&nbsp;&nbsp;&nbsp;'name'=>'banco_cliente'<br>
            ];
          </code>
          <br>
          Tudo pronto, você já está alinhado para começar a desenvolver suas demandas. Caso não tenha o banco de dados alinhado e configurado, siga este <a href="javascript:voif(0)">post</a>.
        </p>
      </div>
    </div>
  </div>
</div>