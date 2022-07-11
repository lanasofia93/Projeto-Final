<?php
  session_start();

  $usuario = $_POST['usuario'];
  $senha = $_POST['senha'];
  $account = $_POST['account'];
  include_once "carregar-banco-de-dados.php";
  $con = mysqli_connect($_SESSION['BDhost'], $_SESSION['BDuser'], $_SESSION['BDpassword'], $_SESSION['BDname']);

  if ($account == "cliente") {
    $dadosEncontrados = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM Usuario WHERE usuario = '$usuario'"));

    if ($usuario === $dadosEncontrados['usuario'] && $senha === $dadosEncontrados['senha']) {
      $_SESSION['mensagem'] = "<div class='alerta success' role='alert'>Usuário logado!</div>";
      $_SESSION['logado'] = True;
      $_SESSION['usuario'] = $usuario;
      $_SESSION['nome'] = $dadosEncontrados['nome'];
      $_SESSION['email'] = $dadosEncontrados['email'];
      $_SESSION['idade'] = $dadosEncontrados['idade'];
      $_SESSION['endereco'] = $dadosEncontrados['endereco'];
      $_SESSION['cidade'] = $dadosEncontrados['cidade'];
      $_SESSION['ID_user'] = $dadosEncontrados['ID'];
      $_SESSION['imagem'] = $dadosEncontrados['imagem'];
      $_SESSION['telefone'] = $dadosEncontrados['telefone'];
      header("Location: ../contact.php");
    } else {
      $_SESSION['mensagem'] = "<div class='alerta error' role='alert'>Usuário ou senha incorretos! Tente novamente</div>";
      header("Location: ../sign-in.php");
    }
  } else if ($account == "tecnico") {
    $dadosEncontrados = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM Tecnico WHERE usuario = '$usuario'"));

    if ($usuario === $dadosEncontrados['usuario'] && $senha === $dadosEncontrados['senha']) {
      $_SESSION['mensagem'] = "<div class='alerta success' role='alert'>Usuário logado!</div>";
      $_SESSION['logadoTecnico'] = True;
      $_SESSION['usuarioTecnico'] = $usuario;
      $_SESSION['nomeTecnico'] = $dadosEncontrados['nome'];
      $_SESSION['emailTecnico'] = $dadosEncontrados['email'];
      $_SESSION['idadeTecnico'] = $dadosEncontrados['idade'];
      $_SESSION['enderecoTecnico'] = $dadosEncontrados['endereco'];
      $_SESSION['cidadeTecnico'] = $dadosEncontrados['cidade'];
      $_SESSION['IDTecnico'] = $dadosEncontrados['matricula'];
      $_SESSION['formacaoTecnico'] = $dadosEncontrados['formacao'];
      $_SESSION['imagemTecnico'] = $dadosEncontrados['imagem'];
      $_SESSION['telefoneTecnico'] = $dadosEncontrados['telefone'];
      header("Location: ../dashboard.php");
    } else {
      $_SESSION['mensagem'] = "<div class='alerta error' role='alert'>Usuário ou senha incorretos! Tente novamente</div>";
      header("Location: ../sign-in.php");
    }
  }

  mysqli_close($con);
?>