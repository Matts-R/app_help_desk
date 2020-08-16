<?php require_once "validador_acesso.php"; ?>

<?php
$arquivo_chamado = fopen('../../app_help_desk/chamado.txt', 'r');
// Abrindo o arquivo somente para leitura
//Esse arquivo está em outro diretório, para dessa maneira poder "proteger" os dados sensíveis da aplicação

$chamados = [];
// Criando um array que conterá os chamados

while (!feof($arquivo_chamado)) {
  //Usando a função feof() para testar se o arquivo chegou no final
  $registro_chamados = fgets($arquivo_chamado);
  //Usando a função fgets() para retornar a linha atual do arquivo e atribuí-la a uma variável
  $chamados[] = $registro_chamados;
}

fclose($arquivo_chamado);

//Fechando a conexão com o arquivo
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
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
      <ul class="navbar-n">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body"> 

              <? foreach($chamados as $chamado) { ?>
                <!--Usando um laço de repetição para criar quantos forem necessários de acordo com o tamanho do array-->

                <?php
                $dados_chamado = explode('#', $chamado);
                // Criando um array com as string contidas na string $chamados

                if ($_SESSION['perfil_id'] == 1) {
                  // Verificando se o usuário é administrador ou usuário comum

                  if ($_SESSION['id'] != $dados_chamado[0]){
                    // Verificando se a super global id é mesma id do usuário que acabou de fazer o chamado

                    continue;
                    // Se o usuário não for o mesmo, o loop irá continuar sem exibir o registro de um chamado que não é dele
                  }
                }

                if (count($dados_chamado) < 3) {
                  // Checando se o array tem ao menos 3 elementos, caso não tenha, isso significa que esta faltando o título, ou categoria ou a descrição. Caso esteja faltando isso significa que ou existe algum erro no registro ou mais provavelmente que seja a última posição do arquivo, que neste caso está em branco e por isso iremos pular essa linha
                  continue;
                }
                ?>

              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?= $dados_chamado[1] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $dados_chamado[2] ?></h6>
                  <p class="card-text"><?= $dados_chamado[3] ?></p>
                  <!-- Usando as tags de impressão do PHP para simplesmente exibir o resultado -->
                </div>
              </div>
              <? } ?>
              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>