<?php
  session_start();

  if (isset($_GET['logout']) && $_GET['logout'] == 1){
    $_SESSION = array();
    session_unset();
    session_destroy();
    header('Location: index.html');
  }

  $logado = $_SESSION['logadoTecnico'] ?? NULL;

  if (!$logado) {
    header("Location: sign-in.php");
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $_SESSION['usuarioTecnico'] ?> - Meu Perfil</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="./images2/logo.svg">

    <!-- Common -->
    <link href="css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="css/lib/themify-icons.css" rel="stylesheet">
    <link href="css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="css/lib/helper.css" rel="stylesheet">
    <link href="css/style2.css" rel="stylesheet">
    <link href="css/style3.css" rel="stylesheet">
    <meta charset="utf-8">
  </head>

  <body>
    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
      <div class="nano">
        <div class="nano-content">
          <ul>
            <div class="logo"><a href="dashboard.php"><span>Painel do Administrador</span></a></div>
            <li><a href="dashboard.php"><img src="./images2/dashboard.svg" class="dashboard-icons">Dashboard</a></li>
            <li><a href="app-profile.php"><img src="./images2/user.svg" class="dashboard-icons">Perfil</a></li>
            <li><a href="meus-atendimentos.php"><img src="./images2/notas.svg" class="dashboard-icons">Meus Atendimentos</a></li>
            <li><a href="?logout=1"><img src="./images2/logout.svg" class="dashboard-icons">Sair</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- /# sidebar -->
    <div class="header">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <div class="float-left">
                      <div class="hamburger sidebar-toggle">
                          <span class="line"></span>
                          <span class="line"></span>
                          <span class="line"></span>
                      </div>
                  </div>
                  <div class="float-right">
                      <div class="dropdown dib">
                          <div class="header-icon" data-toggle="dropdown">
                              <span class="user-avatar">
                                <?php
                                  echo $_SESSION['usuarioTecnico'];
                                ?>
                              </span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <div class="content-wrap">
      <div class="main">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-8 p-r-0 title-margin-right">
              <div class="page-header">
                <div class="page-title">
                  <h1>Olá,
                    <span>
                      <?php
                        echo $_SESSION['nomeTecnico'];
                      ?>
                    </span>
                  </h1>
                </div>
              </div>
            </div>
            <!-- /# column -->
            <div class="col-lg-4 p-l-0 title-margin-left">
              <div class="page-header">
                <div class="page-title">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="alterar-perfil-tecnico.php?user=<?php echo $_SESSION['usuarioTecnico']?>">Editar Perfil</a>
                    </li>
                  </ol>
                </div>
              </div>
            </div>
            <!-- /# column -->
          </div>
          <!-- /# row -->
          <section id="main-content">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="user-profile">
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="user-photo m-b-30">
                            <?php echo "<img class='img-fluid' src='images2/{$_SESSION['imagemTecnico']}' alt='' />" ?>
                          </div>
                        </div>
                        <div class="col-lg-8">
                          <div class="user-profile-name">
                            <?php
                              echo $_SESSION['nomeTecnico'];
                            ?>
                          </div>
                          <div class="user-Location">
                            <i class="ti-location-pin"></i>
                            <?php
                              echo $_SESSION['cidadeTecnico'];
                            ?>
                          </div>
                          <div class="user-job-title">
                            <?php
                              echo $_SESSION['formacaoTecnico'];
                            ?>
                          </div>
                          <div class="ratings">
                            <h4>Avaliações</h4>
                            <div class="rating-star">
                              <span>8.9</span>
                              <i class="ti-star color-primary"></i>
                              <i class="ti-star color-primary"></i>
                              <i class="ti-star color-primary"></i>
                              <i class="ti-star color-primary"></i>
                              <i class="ti-star"></i>
                            </div>
                          </div>
                          <div class="custom-tab user-profile-tab">
                            <ul class="nav nav-tabs" role="tablist">
                              <li role="presentation" class="active">
                                <a href="" aria-controls="1" role="tab" data-toggle="tab">Informações</a>
                              </li>
                            </ul>
                            <div class="tab-content">
                              <div role="tabpanel" class="tab-pane active" id="1">
                                <div class="basic-information">
                                  <div class="email-content">
                                    <span class="contact-title">E-mail:</span>
                                    <span class="contact-email">
                                      <?php
                                        echo $_SESSION['emailTecnico'];
                                      ?>
                                    </span>
                                  </div>
                                  <div class="email-content">
                                    <span class="contact-title">Telefone:</span>
                                    <span class="contact-email">
                                      <?php
                                        echo $_SESSION['telefoneTecnico'];
                                      ?>
                                    </span>
                                  </div>
                                  <div class="birthday-content">
                                    <span class="contact-title">Idade:</span>
                                    <span class="birth-date">
                                      <?php
                                        echo $_SESSION['idadeTecnico'];
                                      ?>
                                    </span>
                                  </div>
                                  <div class="address-content">
                                    <span class="contact-title">Endereço:</span>
                                    <span class="mail-address">
                                      <?php
                                        echo $_SESSION['enderecoTecnico'];
                                      ?>
                                    </span>
                                  </div>
                                  <div class="address-content">
                                    <span class="contact-title">Cidade:</span>
                                    <span class="mail-address">
                                      <?php
                                        echo $_SESSION['cidadeTecnico'];
                                      ?>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /# row -->
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-title">
                    <h4>Atendimentos em aberto</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-hover ">
                        <thead>
                          <tr>
                            <th>Nome</th>
                            <th>Status</th>
                            <th>Data Abertura</th>
                            <th>Prazo Estimado</th>
                            <th>Cliente</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            include_once "./php/mostrar-atendimentos-tecnico.php";
                          ?>
                          <!-- <tr>
                            <td>Celular com defeito</td>
                            <td>
                              <span class="badge badge-primary">Em Andamento</span>
                            </td>
                            <td>22 de Janeiro</td>
                            <td>15 de Fevereiro</td>
                            <td>José</td>
                          </tr> -->
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /# column -->
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="footer">
                  <p>Copyright &copy; <script>document.write(new Date().getFullYear())</script>. Desenvolvido por Small Phones</p>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
    <!-- Common -->
    <script src="js2/lib/jquery.min.js"></script>
    <script src="js2/lib/jquery.nanoscroller.min.js"></script>
    <script src="js2/lib/menubar/sidebar.js"></script>
    <script src="js2/lib/preloader/pace.min.js"></script>
    <script src="js2/lib/bootstrap.min.js"></script>
    <script src="js2/scripts.js"></script>
  </body>
</html>