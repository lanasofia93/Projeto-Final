<?php
  session_start();

  $IDUsuario = $_SESSION['ID_user'];
  include_once "carregar-banco-de-dados.php";
  $con = mysqli_connect($_SESSION['BDhost'], $_SESSION['BDuser'], $_SESSION['BDpassword'], $_SESSION['BDname']);
  $dadosEncontrados = mysqli_query($con, "SELECT * FROM Atendimento WHERE ID_remetente = '$IDUsuario' ORDER BY aceito DESC");

  while ($row = mysqli_fetch_array($dadosEncontrados)) {
    $IDTecnico = $row['ID_tecnico'];
    $dadosTecnico = mysqli_fetch_assoc(mysqli_query($con, "SELECT nome, email, telefone FROM Tecnico WHERE matricula = '$IDTecnico'"));
    $nomeTecnico = $dadosTecnico['nome'];
    $emailTecnico = $dadosTecnico['email'];
    
    $botaoAceitar = "<a href='./php/acao.php?accept=1&id={$row['ID']}'><span class='badge badge-success'>Aceitar Prazo</span></a>";
    $botaoNegar = "<a href='./php/acao.php?recuse=1&id={$row['ID']}'><span class='badge badge-danger'>Negar Prazo</span></a>";
    $botaoWpp = "<a href='https://wa.me/{$dadosTecnico['telefone']}' target='_blank'><span class='badge badge-success'>Entrar em contato</span></a>";


    if ($row['aceito'] == 1) {
      $condicional = "badge-primary";
      if ($row['concluido'] == 1) {
        $condicional = "badge-success";
      }
    } else if ($row['aceito'] == 0) {
      $condicional = "badge-danger";
    }

    echo "
    <tr>
      <td>{$row['titulo']}</td>
      <td>
        <span class='badge " . $condicional . "'>{$row['status']}</span>
      </td>
      <td>{$row['data_abertura']}</td>
      <td>{$row['data_prazo']}</td>
      <td>{$nomeTecnico}</td>
      <td>{$emailTecnico}</td>
      <td>";

    if ($row['status'] !== "Cancelado" && $row['status'] !== "Concluído") {
      echo $botaoWpp;
    }

    if ($row['prazo'] == 1 && $row['adiado'] == 0) {
      echo $botaoAceitar;
      echo $botaoNegar;
    }

    echo "</td>
    </tr>
    ";
  }
?>