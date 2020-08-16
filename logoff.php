<?php
session_start(); //"Dando acesso das variáveis de sessão ao script

session_destroy(); //Destruindo todas as variáveis de sessão 

header('Location: index.php');
// E por fim redirecionando após o logoff de volta à página de login para que uma nova requisição possa ser feita,
// gerando assim novas variáveis de ambiente.

?>