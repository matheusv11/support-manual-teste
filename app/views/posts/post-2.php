<div class="container">
  <div class="row">
    <div class="columns">
      <h1 class="center">Clonagem de Banco</h1>
      <p>
        Utilizaremos o <strong>HeidiSql</strong> para o gerenciamento de banco de dados, mas você pode se sentir livre para utilizar qualquer outro aplicativo.
      </p>
      <p>
        Você ira precisar do acesso ao banco de dados de projetos da wapstore. Pode conseguí-lo com seu padrinho ou com os demais membros do suporte.
        Os dados de acesso não podem ficar neste post por questões de <strong>segurança</strong>.
      </p>
      <p>
        Após conseguir o acesso, basta conectar-se ao banco de dados e procurar o <i>Schema</i> do cliente desejado.
      </p>
      <img src="/images/posts/2/1.png" class="m-auto block" style="border: 2px solid">
      <small class="center block">Visão no HeidiSQL</small>

      <br/>
      <p>
        Irei utilizar o schema <code>wapstore_projeto_cafebrasil</code> como exemplo. Aperte botão direito no schema desejado e vá na opção <u>Exportar banco de dados como SQL</u>. 
        Uma janela pop-up será exibida com mais informações a respeito da exportação. Siga os seguintes passos:
        <ol>
          <li>Marque a caixa <strong>Criar</strong> para Banco(s) de dados & Tabela(s).</li>
          <li>Altere o Select de Dados para Inserir.</li>
          <li>Altere a saída, selecione <strong>Servidor: Nome do seu servidor Localhost</strong></li>
          <li>Deixe o Banco de dados como <strong>[Mesmo do servidor de origem]</strong></li>
        </ol>
        <p>Após seguir a lista o resultado final deve ser esté:</p>
          <img src="/images/posts/2/2.png" class="m-auto block" style="border: 2px solid">
          <br>
        <p>
          Se tudo estiver correto basta apensar apertar em <strong>Exportar</strong> na parte inferior direita e 
          aguardar enquanto o HeidiSQL exporta todos os dados e estruturas do banco de projetos para o seu banco local.
        </p>
        <p>Com isso você terminou o processor de clonagem de banco de dados!</p>
    </div>
  </div>
</div>