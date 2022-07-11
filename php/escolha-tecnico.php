<?php
  session_start();
  include_once "carregar-banco-de-dados.php";
  $con = mysqli_connect($_SESSION['BDhost'], $_SESSION['BDuser'], $_SESSION['BDpassword'], $_SESSION['BDname']);

  $buscaAreas = mysqli_query($con, "SELECT area_atuacao FROM Tecnico GROUP BY area_atuacao");
    while ($row = mysqli_fetch_array($buscaAreas)) {
      echo "<optgroup label='{$row['area_atuacao']}'>";
      $buscaTecnicos = mysqli_query($con, "SELECT nome, matricula FROM Tecnico WHERE area_atuacao = '{$row['area_atuacao']}'");
      while ($row2 = mysqli_fetch_array($buscaTecnicos)) {
        echo "<option value='{$row2['matricula']}'>{$row2['nome']}</option>";
      }
      echo "</optgroup>";
    }  
?>