<?php

    require 'connect_db.php';

    $login      = $_POST['username'];
    $password   = $_POST['password'];
    $password   = sha1($password);

    $results    = $db->query("SELECT * FROM users where login = '{$login}' and password = '{$password}'");

    $results    = $results->fetchArray();
    $login      = $results['login'];
    $fullname   = $results['name'];
    $profile    = $results['profile'];

    if(!empty($login)) {
        session_start();
        $_SESSION['username']   = $login;
        $_SESSION['fullname']   = urldecode($fullname);
        $_SESSION['profile']    = $profile;
        header("Location:../home.php");
        exit();
      } else {
        echo '<script>alert("Usuário ou senha inválidos!");</script>';
        echo '<script>window.history.back();</script>';
        exit();
      }

/*

$login = 'admin';
$password = 'admin';
$password = sha1($password);
$db = new SQLite3('db/bbb_interface.db');
$results = $db->query("SELECT login,password FROM users where login = '{$login}' and password = '{$password}'");
while ($row = $results->fetchArray()) { echo $row['login'] ; }
*/

?>