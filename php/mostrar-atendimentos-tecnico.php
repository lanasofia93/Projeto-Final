<?php
  session_start();
  include_once "carregar-banco-de-dados.php";
  $con = mysqli_connect($_SESSION['BDhost'], $_SESSION['BDuser'], $_SESSION['BDpassword'], $_SESSION['BDname']);

  $IDTecnico = $_SESSION['IDTecnico'];
  $dadosEncontrados = mysqli_query($con, "SELECT * FROM Atendimento WHERE ID_tecnico = '$IDTecnico' ORDER BY aceito AND data_prazo DESC");

  while ($row = mysqli_fetch_array($dadosEncontrados)) {
    $IDCliente = $row['ID_remetente'];
    $dadosCliente = mysqli_fetch_assoc(mysqli_query($con, "SELECT telefone FROM Usuario WHERE ID = '$IDCliente'"));

    $botaoAceitar = "<a href='./php/acao.php?change=1&id={$row['ID']}'><span class='badge badge-primary'>Aceitar</span></a>";
    $botaoCancelar = "<a href='./php/acao.php?cancel=1&id={$row['ID']}'><span class='badge badge-danger'>Cancelar</span></a>";
    $botaoPrazo = "<a href='./php/acao.php?moreTime=1&id={$row['ID']}'><span class='badge badge-primary'>Aumentar Prazo</span></a>";
    $botaoConcluir = "<a href='./php/acao.php?complete=1&id={$row['ID']}'><span class='badge badge-success'>Concluir</span></a>";
    $botaoWpp = "<a href='https://wa.me/{$dadosCliente['telefone']}' target='_blank'><span class='badge badge-success'>Entrar em contato</span></a>";

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
      <td>{$row['nome_remetente']}</td>
      <td>";

    if ($row['aceito'] == 0) {
      echo $botaoAceitar;
    } else if ($row['aceito'] == 1 && $row['concluido'] == 0) {
      echo $botaoWpp;
      echo $botaoCancelar;
      if ($row['prazo'] == 0) echo $botaoPrazo;
      echo $botaoConcluir;
    }

    echo "</td>
    </tr>
    ";
  }
?>