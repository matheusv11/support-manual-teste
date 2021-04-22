<section class="light">
  <div class="container">
    <div class="row">
      <div class="five columns">
        <div>
          <img src="/images/tempSupport.png" class="intro-img">
        </div>
      </div>
      <div class="seven columns">
        <h3>Um pouco sobre nós</h3>
        <p>
          <!-- Este site nasceu para auxiliar aqueles estão entrando na webart e até mesmo para aqueles que já estão nela. -->
          Muitas informações são necessárias para trabalharmos no nosso cotidiano, então acabamos por ter uma certa
          dependência das as pessoas que possuem mais conhecimento.
        </p>
        <p>A proposta deste site é disponibilizar o máximo de informações possíveis a fim de propocionar uma maior independência
          para a equipe de suporte, trazendo agilidade na consulta de informações e aumentando a eficiência do nosso serviço possibiliando
          uma entrega mais rápida e de melhor qualidade para o cliente final.
        </p>
        <p>
          <strong>Nós somos apoio e solução. Nós somos suporte!</strong>
        </p>
      </div>
    </div>
  </div>
</section>
<section class="dark">
  <div class="container">
    <h3 class="center">Últimas Postagens</h3>
    <div class="row">
      <?php
      foreach ($data as $key => $value) {
        echo "
        <div class='three columns light mini-content'>
          <a href='/postagem/{$value['id']}' class='clear-link'>
            <img src='{$value['imageUrl']}' alt='{$value['title']}'>
            <span><strong>{$value['title']}</strong></span>
            <span>Dificuldade: {$value['difficulty']}</span>
            <span><small>{$value['create_date']}</small></span>
          </a>
        </div>";
      }
      ?>
    </div>
    <div class="row">
      <div class="columns center" style="margin: 50px 0 0 0;">
        <a class="button button-primary" href="/postagens">Ver mais postagens</a>
      </div>
    </div>
  </div>
</section>