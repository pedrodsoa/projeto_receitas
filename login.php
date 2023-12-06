<?php
$email = $_POST['email_login'];
$entrar = $_POST['entrar'];
$senha = md5($_POST['senha_login']);
$connect = mysqli_connect('localhost','root','pedro12345678');
$db = mysqli_select_db($connect, 'trabalho_interdisciplinar');
  if (isset($entrar)) {

    $verifica = mysqli_query($connect, "SELECT * FROM usuario WHERE email =
    '$email' AND senha = '$senha'") or die("erro ao selecionar");


if (mysqli_num_rows($verifica)<=0){
        echo $senha;
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='login.html';</script>";
        die();
      }else{  
        echo"<script language='javascript' type='text/javascript'>
        alert('Bem vindo.');window.location
        .href='index.html';</script>";
      }
  }
?>