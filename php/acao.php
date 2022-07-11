<?php
  include_once "carregar-banco-de-dados.php";
  $con = mysqli_connect($_SESSION['BDhost'], $_SESSION['BDuser'], $_SESSION['BDpassword'], $_SESSION['BDname']);


  $iniciado = (int)isset($_GET['change']);
  $cancelado = (int)isset($_GET['cancel']);
  $maisTempo = (int)isset($_GET['moreTime']);
  $concluido = (int)isset($_GET['complete']);
  $IDAtendimento = $_GET['id'];
  $IDTecnico = $_SESSION['IDTecnico'];
  $_SESSION['IDAtendimentoEmail'] = $IDAtendimento;
  $_SESSION['IDTecnicoEmail'] = $IDTecnico;


  if ($iniciado === 1) {
    $query = mysqli_query($con, "UPDATE Atendimento SET aceito = 1, ID_tecnico = '$IDTecnico', status = 'Em Andamento', data_prazo = ADDDATE(CURDATE(), INTERVAL 7 DAY) WHERE ID = '$IDAtendimento'");
    unset($iniciado);
    unset($_GET['change']);
    header("Location: ../app-profile.php");
  } else if ($cancelado === 1) {
    $query = mysqli_query($con, "UPDATE Atendimento SET aceito = 0, status = 'Cancelado', ID_tecnico = NULL, data_prazo = NULL WHERE ID = '$IDAtendimento'");
    unset($cancelado);
    unset($_GET['cancel']);
    header("Location: ../app-profile.php");
  } else if ($maisTempo === 1) {
    $query = mysqli_query($con, "UPDATE Atendimento SET prazo = 1 WHERE ID = '$IDAtendimento'");
    unset($maisTempo);
    unset($_GET['moreTime']);
    header("Location: ../app-profile.php");
  } else if ($concluido === 1) {
    $query = mysqli_query($con, "UPDATE Atendimento SET concluido = 1, status = 'Concluído' WHERE ID = '$IDAtendimento'");
    unset($concluido);
    unset($_GET['complete']);
    header("Location: ../app-profile.php");
  }

  // <<==========================================================================>>

  $aceitar = (int)isset($_GET['accept']);
  $negar = (int)isset($_GET['recuse']);

  if ($aceitar === 1) {
    $query = mysqli_query($con, "UPDATE Atendimento SET data_prazo = ADDDATE(data_prazo, INTERVAL 7 DAY), adiado = 1 WHERE ID = '$IDAtendimento'");
    unset($aceitar);
    unset($_GET['accept']);
    header("Location: ../profile.php");
  } else if ($negar === 1) {
    unset($negar);
    unset($_GET['recuse']);
    header("Location: ../profile.php");
  }
  
  // <<==========================================================================>>

  $deleteProfilePhoto = (int)isset($_GET['deleteProfilePhoto']);
  $deleteProfilePhotoTecnico = (int)isset($_GET['deleteProfilePhotoTecnico']);
  $imagem = "../images2/" . $_SESSION['imagem'];
  $imagemTecnico = "../images2/" . $_SESSION['imagemTecnico'];

  if ($deleteProfilePhoto === 1) {
    $query = mysqli_query($con, "UPDATE Usuario SET imagem = 'user-profile.png'");
    if (file_exists($imagem)) {
      unlink($imagem);
      unset($imagem);
      unset($deleteProfilePhoto);
      include_once "recarregar-sessoes.php";
      header("Location: ../profile.php");
    }
  }

  if ($deleteProfilePhotoTecnico === 1) {
    $query = mysqli_query($con, "UPDATE Tecnico SET imagem = 'user-profile.png'");
    if (file_exists($imagemTecnico)) {
      unlink($imagemTecnico);
      unset($imagemTecnico);
      unset($deleteProfilePhotoTecnico);
      include_once "recarregar-sessoes.php";
      header("Location: ../app-profile.php");
    }
  }

?>