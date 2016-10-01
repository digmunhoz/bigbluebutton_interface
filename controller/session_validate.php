<?php

session_start();

  if (!isset($_SESSION['username'])) {
    die("Usuário não logado.<br>Por favor faça login antes.");
  } else {
    $username = $_SESSION['username']; 
  }

?>