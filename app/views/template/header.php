<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Support Manual</title>
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="/css/normalize.css">
  <link rel="stylesheet" href="/css/skeleton.css">
  <link rel="stylesheet" href="/css/custom.css">
  <link rel="icon" type="/image/png" href="images/favicon.png">
  <script src="/js/jquery.min.js"></script>
  <script src="/js/carot.master.js"></script>
</head>

<body>
  <?php
  echo (isset($config['headerLight'])) ? "<nav class='navbar light'>" : "<nav class='navbar dark'>";
  ?>
  <div class="container">
    <div class="row display-flex itens-center">
      <div class="columns nine">
        <a href="/" class="clear-link display-table">
          <div class="title">Support</div>
          <div class="sub-tittle">GUIA DE SOBREVIVENCIA</div>
        </a>
      </div>
      <div class="columns three">
        <?php
        if (isset($_SESSION['user'])) {
        ?>
          <div class="access-container">
            <a href="/perfil" class="button-perfil clear-link profile-hover">Perfil</a>
            <a href="/sair" class="button-perfil clear-link logout-hover">Sair</a>
          </div>
        <?php
        }else{
        ?>
          <div class="access-container">
            <a href="/login" class="button-perfil clear-link profile-hover">Entrar</a>
          </div>
        <?php
        }?>
      </div>
    </div>
  </div>
  </nav>