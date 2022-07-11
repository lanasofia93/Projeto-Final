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

  include_once "carregar-banco-de-dados.php";
  $con = mysqli_connect($_SESSION['BDhost'], $_SESSION['BDuser'], $_SESSION['BDpassword'], $_SESSION['BDname']);

  $dadosEncontrados = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(ID) AS ID_count FROM Usuario"));
  $contagemUsuarios = $dadosEncontrados['ID_count'];
  $dadosEncontrados = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(ID) AS ID_atend FROM Atendimento"));
  $contagemAtendimentos = $dadosEncontrados['ID_atend'];
  $dadosEncontrados = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(matricula) AS ID_tec FROM Tecnico"));
  $contagemTecnicos = $dadosEncontrados['ID_tec'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <!-- Styles -->
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="css/lib/themify-icons.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="css/lib/weather-icons.css" rel="stylesheet" />
    <link href="css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="css/lib/helper.css" rel="stylesheet">
    <link href="css/style2.css" rel="stylesheet">
    <link href="css/style3.css" rel="stylesheet">
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
    <!-- /# header -->
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
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-money color-success border-success"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Renda Total</div>
                                        <div class="stat-digit">R$1.012,00</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Clientes Ativos</div>
                                        <div class="stat-digit">
                                            <?php
                                                echo $contagemUsuarios;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-layout-grid2 color-pink border-pink"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Total de Atendimentos</div>
                                        <div class="stat-digit">
                                            <?php
                                                echo $contagemAtendimentos;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-link color-danger border-danger"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Técnicos na Companhia</div>
                                        <div class="stat-digit">
                                            <?php
                                                echo $contagemTecnicos;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# row -->
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="year-calendar"></div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Quadro de Notícias</h4>
                                </div>
                                <div class="recent-comment m-t-15">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#"><img class="media-object" src="images2/avatar/1.jpg"
                                                    alt="..."></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading color-primary">john doe</h4>
                                            <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                            <p class="comment-date">10 min ago</p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#"><img class="media-object" src="images2/avatar/2.jpg"
                                                    alt="..."></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading color-success">Mr. John</h4>
                                            <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                            <p class="comment-date">1 hour ago</p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#"><img class="media-object" src="images2/avatar/3.jpg"
                                                    alt="..."></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading color-danger">Mr. John</h4>
                                            <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                            <div class="comment-date">Yesterday</div>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#"><img class="media-object" src="images2/avatar/1.jpg"
                                                    alt="..."></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading color-primary">john doe</h4>
                                            <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                            <p class="comment-date">10 min ago</p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#"><img class="media-object" src="images2/avatar/2.jpg"
                                                    alt="..."></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading color-success">Mr. John</h4>
                                            <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                            <p class="comment-date">1 hour ago</p>
                                        </div>
                                    </div>
                                    <div class="media no-border">
                                        <div class="media-left">
                                            <a href="#"><img class="media-object" src="images2/avatar/3.jpg"
                                                    alt="..."></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading color-info">Mr. John</h4>
                                            <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                            <div class="comment-date">Yesterday</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Tarefas</h4>
                                </div>
                                <div class="todo-list">
                                    <div class="tdl-holder">
                                        <div class="tdl-content">
                                            <ul>
                                                <li>
                                                    <label>
                                                        <input type="checkbox"><i></i><span>22,Dec Publish The Final
                                                            Exam Result</span>
                                                        <a href='#' class="ti-close"></a>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" checked><i></i><span>First Jan Start Our
                                                            School</span>
                                                        <a href='#' class="ti-close"></a>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox"><i></i><span>Recently Our Maganement
                                                            Programme Start</span>
                                                        <a href='#' class="ti-close"></a>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" checked><i></i><span>Check out some
                                                            Popular courses</span>
                                                        <a href='#' class="ti-close"></a>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                        <input type="text" class="tdl-new form-control" placeholder="Escreva um novo item e aperte 'Enter'">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>Copyright &copy; <script>document.write(new Date().getFullYear())</script>. Desenvolvido por Small Phones</p>
                            </div>
                        </div>
                    </div>
                    <!-- /# row -->
                </section>
            </div>
        </div>
    </div>

    <div id="mensagem">
      <?php
      echo $_SESSION['mensagem'];
      unset($_SESSION['mensagem']);
      ?>
    </div>
    <script src="js/mensagem.js"></script>

    <!-- jquery vendor -->
    <script src="js2/lib/jquery.min.js"></script>
    <script src="js2/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="js2/lib/menubar/sidebar.js"></script>
    <script src="js2/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <script src="js2/lib/bootstrap.min.js"></script>
    <script src="js2/scripts.js"></script>
    <!-- bootstrap -->

    <script src="js2/lib/calendar-2/moment.latest.min.js"></script>
    <script src="js2/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="js2/lib/calendar-2/pignose.init.js"></script>


    <script src="js2/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="js2/lib/weather/weather-init.js"></script>
    <script src="js2/lib/circle-progress/circle-progress.min.js"></script>
    <script src="js2/lib/circle-progress/circle-progress-init.js"></script>
    <script src="js2/lib/chartist/chartist.min.js"></script>
    <script src="js2/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="js2/lib/sparklinechart/sparkline.init.js"></script>
    <script src="js2/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="js2/lib/owl-carousel/owl.carousel-init.js"></script>
    <!-- scripit init-->
    <script src="js2/dashboard2.js"></script>
</body>

</html>