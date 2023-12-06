<?php

$email = $_POST['email_cad'];
$senha = MD5($_POST['senha_cad']);
$nome =  $_POST['nome_cad'];
$connect = mysqli_connect('localhost','root','pedro12345678');
$db = mysqli_select_db($connect,'trabalho_interdisciplinar');
$query_select = "SELECT email FROM usuario WHERE email = '$email'";
$select = mysqli_query($connect,$query_select);
$array = mysqli_fetch_array($select, MYSQLI_NUM);
$emailarray = $array['email'];

  if($email == "" || $email == null){
    echo"<script language='javascript' type='text/javascript'>
    alert('O campo email deve ser preenchido');window.location.href='
    cadastro.html';</script>";

    }else{
      if($emailarray == $email){

        echo"<script language='javascript' type='text/javascript'>
        alert('Esse email já existe');window.location.href='
        cadastro.html';</script>";
        die();

      }else{
        $query = "INSERT INTO usuario (email,senha, nome) VALUES ('$email','$senha','$nome')";
        $insert = mysqli_query($connect,$query);

        if($insert){
          echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.
          href='../view/login.html#paralogin'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');window.location
          .href='../view/login.html'</script>";
        }
      }
    }
?>