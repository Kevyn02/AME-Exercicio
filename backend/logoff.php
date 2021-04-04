<?php
  // Continua uma sessão existente
  session_start();
  // Libera as variáveis na sessão
  session_unset();
  // Destrói a sessão
  session_destroy();
  // Redireciona para a pagina de login
  header('Location: ../pages/');
