<?php
  include_once "carregar-banco-de-dados.php";
  $con = mysqli_connect($_SESSION['BDhost'], $_SESSION['BDuser'], $_SESSION['BDpassword'], $_SESSION['BDname']);

  $nome = $_POST['nomeTecnico'];
  $email = $_POST['emailTecnico'];
  $formacao = $_POST['formacaoTecnico'];
  $idade = $_POST['idadeTecnico'];
  $endereco = $_POST['enderecoTecnico'];
  $cidade = $_POST['cidadeTecnico'];
  $IDTecnico = $_SESSION['IDTecnico'];
  $telefone = $_POST['telefoneTecnico'];
  $imagem = $_FILES['imagemTecnico']['name'];
  $arquivo_tmp = $_FILES['imagemTecnico']['tmp_name'];
  $destino = "../images2/" . $_FILES['imagemTecnico']['name'];
  $dadosEncontrados = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM Tecnico WHERE matricula = '$IDTecnico'"));

  if ($dadosEncontrados['matricula'] === $_SESSION['IDTecnico']) {
    if (move_uploaded_file($arquivo_tmp, $destino)) {
      if (mysqli_query($con, "UPDATE Tecnico SET nome = '$nome', formacao = '$formacao', imagem = '$imagem', email = '$email', idade = '$idade', endereco = '$endereco', cidade = '$cidade', telefone = '$telefone' WHERE matricula = '$IDTecnico'")) {
        include_once "recarregar-sessoes.php";
        header("Location: ../app-profile.php");
      }
    } else if (mysqli_query($con, "UPDATE Tecnico SET nome = '$nome', formacao = '$formacao', email = '$email', idade = '$idade', endereco = '$endereco', cidade = '$cidade', telefone = '$telefone' WHERE matricula = '$IDTecnico'")) {
      include_once "recarregar-sessoes.php";
      header("Location: ../app-profile.php");
    }
  }

  mysqli_close($con);
?>