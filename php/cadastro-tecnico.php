<?php
  session_start();
  include_once "carregar-banco-de-dados.php";
  $con = mysqli_connect($_SESSION['BDhost'], $_SESSION['BDuser'], $_SESSION['BDpassword'], $_SESSION['BDname']);

  $nome = $_POST['nome'];
  $usuario = $_POST['usuario'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $cnpj = $_POST['CNPJ'];
  $formacao = $_POST['formacao'];
  $idade = $_POST['idade'];
  $cidade = $_POST['cidade'];
  $endereco = $_POST['endereco'];
  $telefone = $_POST['telefone'];
  $atuacao = $_POST['atuacao'];
  $dadosEncontrados = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM Tecnico WHERE usuario = '$usuario' OR CNPJ = '$cnpj'"));

  if ($atuacao == "empty") {
      $_SESSION['mensagem'] = "<div class='alerta error' role='alert'>Selecione uma área de atuação para o técnico!</div>";
      header("Location: ../sign-up-tecnico.php");
  } else if ($usuario === $dadosEncontrados['usuario'] || $cnpj == $dadosEncontrados['CNPJ']) {
      $_SESSION['mensagem'] = "<div class='alerta error' role='alert'>Usuário ou CNPJ já em uso! Por favor tente novamente</div>";
      header("Location: ../sign-up-tecnico.html");
  } else {
    if (mysqli_query($con, "INSERT INTO Tecnico (nome, usuario, email, senha, CNPJ, formacao, endereco, cidade, idade, area_atuacao, telefone) VALUES ('$nome', '$usuario', '$email', '$senha', '$cnpj', '$formacao', '$endereco', '$cidade', '$idade', '$atuacao', '$telefone')")) {
      $_SESSION['mensagem'] = "<div class='alerta success' role='alert'>Técnico cadastrado</div>";
      header("Location: ../dashboard.php");
    } else {
      $_SESSION['mensagem'] = "<div class='alerta error' role='alert'>Ocorreu um erro durante o cadastro! Por favor tente novamente</div>";
      header("Location: ../sign-up-tecnico.php");
    }
  }

  mysqli_close($con);
?>