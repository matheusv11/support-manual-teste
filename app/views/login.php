<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="/css/normalize.css">
  <link rel="stylesheet" href="/css/skeleton.css">
  <link rel="stylesheet" href="/css/login.css">
  <link rel="icon" type="/image/png" href="images/favicon.png">
  <script src="/js/jquery.min.js"></script>
  <script src="/js/carot.master.js"></script>
</head>
<body>
    <info></info>
    <div class="login-form">
        <h1>Login</h1>
        <form method="POST">
            <div class="row">
                <div class="columns">
                    <label>E-mail:</label>
                    <input type="email" name="email" required>
                </div>
            </div>
            <div class="row">
                <div class="columns">
                    <label>Senha:</label>
                    <input type="password" name="password" required>
                </div>
            </div>
            <div class="row">
                <div class="columns">
                    <br>
                    <button>Entrar</button>
                </div>
            </div>
            <div class="row">
                <div class="columns">
                    <input type="checkbox" name="remember"> Lembrar de mim
                </div>
            </div>
            <div class="row">
                <div class="columns">
                    <a href="javascript:void(0)"><small>Esqueci minha senha</small></a>
                </div>
            </div>
        </form>
    </div>
    <script src="/js/login.js"></script>
</body>