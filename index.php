<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
              </div>
            <div class="card-body">
              <form action="valida_login.php" method="post">
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>

                <? if (isset($_GET['login']) && $_GET['login'] == 'erro') { ?>
                  <!--Esse bloco de código será executado caso a super global $_GET possua algum valor
                  e se seu valor for 'estipulado' como um erro. Esse bloco de código IF ficará aberto
                  para poder garantir que o código HTML só será executado se essas condições forem verdadeiras,
                  isso tem a intenção de separar o código PHP do código HTML -->
                  <div class="text-danger">
                  Usuário ou senha inválido(s).
                  </div>
                  <!--Essa div será exibida caso haja um login inválido-->
                <? } ?>
                  <!--Fechamento do bloco de comando IF, foram usadas as tags curtas do PHP (<? ?>) para deixar
                  mais estético os códigos-->

                <? if (isset($_GET['login']) && $_GET['login'] == 'acesso_negado') { ?>

                    <div class="text-danger">
                    Para ter acesso a essa página favor efetuar o login.
                    </div>
                  <!--Essa div será exibida caso um acesso seja feito á alguma página sem ter sido autenticado antes
                  ou caso a sessão não tenha sido iniciada-->

                <? } ?>

                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>