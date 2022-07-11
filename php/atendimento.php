<?php
  session_start();
  include_once "carregar-banco-de-dados.php";
  $con = mysqli_connect($_SESSION['BDhost'], $_SESSION['BDuser'], $_SESSION['BDpassword'], $_SESSION['BDname']);

  $nomeRemetente = $_POST['nomeRemetente'];
  $emailRemetente = $_POST['emailRemetente'];
  $endereco = $_POST['endereco'];
  $cidade = $_POST['cidade'];
  $titulo = $_POST['titulo'];
  $descricao = $_POST['descricao'];
  $IDTecnico = $_POST['tecnico'];
  $marca = $_POST['marca'];
  $modelo = $_POST['modelo'];
  $IDRemetente = $_SESSION['ID_user'];

  if ($IDTecnico == "empty") {
    header("Location: ../contact.php");
  } else if (mysqli_query($con, "INSERT INTO Atendimento (ID_tecnico, ID_remetente, nome_remetente, email_remetente, titulo, marca, modelo, descricao, endereco, cidade, data_abertura) VALUES ('$IDTecnico', '$IDRemetente', '$nomeRemetente', '$emailRemetente', '$titulo', '$marca', '$modelo', '$descricao', '$endereco', '$cidade', CURDATE())")) {
    header("Location: ../index.html");
  } else {
    header("Location: ../contact.php");
  }
?>