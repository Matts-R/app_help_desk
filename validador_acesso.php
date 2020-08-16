<?php
// Esse arquivo foi criado para poder "propagar" sua funcionalidade para outros scripts, através do require_once(),
// evitando assim a redundância no código.

session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== 'Autenticado') {
  header('Location: index.php?login=acesso_negado');
}
// Restringindo o acesso as demais páginas caso a sessão não tenha sido iniciada ou se seu valor não for igual a 'Autenticado'
?>