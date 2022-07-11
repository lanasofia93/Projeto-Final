<?php
  session_start();

  include_once "carregar-banco-de-dados.php";
  $con = mysqli_connect($_SESSION['BDhost'], $_SESSION['BDuser'], $_SESSION['BDpassword'], $_SESSION['BDname']);

  $usuario = $_SESSION['usuario'];
  $dadosRecarregados = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM Usuario WHERE usuario = '$usuario'"));
  $_SESSION['nome'] = $dadosRecarregados['nome'];
  $_SESSION['email'] = $dadosRecarregados['email'];
  $_SESSION['idade'] = $dadosRecarregados['idade'];
  $_SESSION['endereco'] = $dadosRecarregados['endereco'];
  $_SESSION['cidade'] = $dadosRecarregados['cidade'];
  $_SESSION['imagem'] = $dadosRecarregados['imagem'];
  $_SESSION['telefone'] = $dadosRecarregados['telefone'];

  $usuarioTecnico = $_SESSION['usuarioTecnico'];
  $dadosRecarregadosTecnico = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM Tecnico WHERE usuario = '$usuarioTecnico'"));
  $_SESSION['nomeTecnico'] = $dadosRecarregadosTecnico['nome'];
  $_SESSION['emailTecnico'] = $dadosRecarregadosTecnico['email'];
  $_SESSION['formacaoTecnico'] = $dadosRecarregadosTecnico['formacao'];
  $_SESSION['idadeTecnico'] = $dadosRecarregadosTecnico['idade'];
  $_SESSION['enderecoTecnico'] = $dadosRecarregadosTecnico['endereco'];
  $_SESSION['cidadeTecnico'] = $dadosRecarregadosTecnico['cidade'];
  $_SESSION['imagemTecnico'] = $dadosRecarregadosTecnico['imagem'];
  $_SESSION['telefoneTecnico'] = $dadosRecarregadosTecnico['telefone'];
?>