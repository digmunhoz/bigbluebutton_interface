<?php

if (($_POST['username'] == 'fastsupport') && ($_POST['password'] == 'fastsupport')) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    session_start();
    $_SESSION['username'] = $username;
    header("Location:../home.php");
    exit();
  } else {
    echo '<script>alert("Usuário ou senha inválidos!");</script>';
    echo '<script>window.history.back();</script>';
    exit();
  }

?>