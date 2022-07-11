<?php
  include_once "carregar-banco-de-dados.php";
  $con = mysqli_connect($_SESSION['BDhost'], $_SESSION['BDuser'], $_SESSION['BDpassword'], $_SESSION['BDname']);

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $idade = $_POST['idade'];
  $endereco = $_POST['endereco'];
  $cidade = $_POST['cidade'];
  $ID = $_SESSION['ID_user'];
  $telefone = $_POST['telefone'];
  $imagem = $_FILES['imagem']['name'];
  $arquivo_tmp = $_FILES['imagem']['tmp_name'];
  $destino = "../images2/" . $_FILES['imagem']['name'];
  $dadosEncontrados = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM Usuario WHERE ID = '$ID'"));

  
  if ($dadosEncontrados['ID'] === $_SESSION['ID_user']) {
    if (move_uploaded_file($arquivo_tmp, $destino)) {
      if (mysqli_query($con, "UPDATE Usuario SET nome = '$nome', imagem = '$imagem', email = '$email', idade = '$idade', telefone = '$telefone', endereco = '$endereco', cidade = '$cidade' WHERE ID = '$ID'")) {
        include_once "recarregar-sessoes.php";
        header("Location: ../profile.php");
      }
    } else if (mysqli_query($con, "UPDATE Usuario SET nome = '$nome', email = '$email', idade = '$idade', telefone = '$telefone', endereco = '$endereco', cidade = '$cidade' WHERE ID = '$ID'")) {
      include_once "recarregar-sessoes.php";
      header("Location: ../profile.php");
    }
  }

  mysqli_close($con);
?>