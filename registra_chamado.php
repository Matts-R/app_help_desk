<?php

session_start();

$texto =
  $_SESSION['id'] .
  '#' .
  $_POST['titulo'] .
  '#' .
  $_POST['categoria'] .
  '#' .
  $_POST['descricao'] .
  '#' .
  PHP_EOL;
// Editando a saída contendo o texto do chamado para que possa ficar mais legível

$arquivo_chamado = fopen('../../app_help_desk/chamado.txt', 'a');
// Criando um arquivo para poder armazenar os dados do chamado
//Esse arquivo está em outro diretório, para dessa maneira poder "proteger" os dados sensíveis da aplicação

fwrite($arquivo_chamado, $texto);
// Anexando a string com o chamado editado ao arquivo

fclose($arquivo_chamado);
//Fechando a conexão com o arquivo

header('Location: abrir_chamado.php');
?>
