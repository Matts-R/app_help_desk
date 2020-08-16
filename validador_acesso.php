<?php
// Esse arquivo foi criado para poder "propagar" sua funcionalidade para outros scripts, através do require_once(),
// evitando assim a redundância no código.

session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== 'Autenticado') {
  /*Verificando se o campo 'autenticado' da super global $_SESSION está vazio ou se seu valor é diferente de 'Autenticado', porque 
  nesses casos o login será negado e o usuário será mandado de volta para a página de login
  */
  header('Location: index.php?login=acesso_negado');
  //Usando a função header para mandar o usuário de volta para a página de login, passando como parâmetro na URL o valor de login=acesso_negado
}
?>
