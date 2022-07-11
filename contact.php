<?php
  session_start();

  $logado = $_SESSION['logado'] ?? NULL;

  if (!$logado) {
    header("Location: sign-in.php");
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Contate-nos</title>
    <!-- Mobile Specific Metas
    ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Bootstrap App Landing Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Small Apps Template v1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />
    <!-- PLUGINS CSS STYLE -->
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="plugins/slick/slick.css">
    <link rel="stylesheet" href="plugins/slick/slick-theme.css">
    <link rel="stylesheet" href="plugins/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="plugins/aos/aos.css">
    <!-- CUSTOM CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style3.css" rel="stylesheet">
  </head>
  <body class="body-wrapper" data-spy="scroll" data-target=".privacy-nav">
    <nav class="navbar main-nav navbar-expand-lg px-2 px-sm-0 py-2 py-lg-0">
      <div class="container">
        <a class="navbar-brand" href="index.html">Small Phones</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="ti-menu"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Início</a>
            </li>
            <li class="nav-item @@team">
              <a class="nav-link" href="team.php">Equipe</a>
            </li>
            <li class="nav-item active @@contact">
              <a class="nav-link" href="contact.php">Contatos</a>
            </li>
            <li class="nav-item @@about">
              <a class="nav-link" href="profile.php">Perfil</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <section class="section page-title">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 m-auto">
            <!-- Page Title -->
            <h1>Entre em contato conosco</h1>
            <!-- Page Description -->
            <p>Está com algum problema em seu aparelho celular? Não perca tempo e entre em contato com a gente! Nossos técnicos estão sempre a postos para te atender e resolver o seu problema.</p>
          </div>
        </div>
        <br><br><br>
        <div class="row">
          <div class="col-12">
            <h2 class="mb-5 text-center">Nos conte o que aconteceu</h2>
          </div>
          <div class="col-12">
            <form action="./php/atendimento.php" method="POST">
              <div class="row">
                <!-- Nome -->
                <div class="col-md-6 mb-2">
                  <input class="form-control main" type="text" name="nomeRemetente" placeholder="Nome" required>
                </div>
                <!-- Email -->
                <div class="col-md-6 mb-2">
                  <input class="form-control main" type="email" name="emailRemetente" placeholder="E-mail" required>
                </div>
                <!-- Endereço -->
                <div class="col-md-6 mb-2">
                  <input class="form-control main" type="text" name="endereco" placeholder="Endereço" required>
                </div>
                <!-- Cidade -->
                <div class="col-md-6 mb-2">
                  <input class="form-control main" type="text" name="cidade" placeholder="Cidade" required>
                </div>
                <!-- Assunto -->
                <div class="col-md-6 mb-2">
                  <input class="form-control main" type="text" name="titulo" placeholder="Assunto" required>
                </div>
                <!-- Técnico -->
                <div class="col-md-6 mb-2">
                  <label for="tecnico">Escolha um técnico:</label>
                  <select name="tecnico" class="select-contact">
                    <option value="empty">---</option>
                    <?php
                      include_once "./php/escolha-tecnico.php";
                    ?>
                  </select>
                </div>
                <!-- Marca -->
                <div class="col-md-6 mb-2">
                  <input class="form-control main" type="text" name="marca" placeholder="Marca do aparelho" required>
                </div>
                <!-- Modelo -->
                <div class="col-md-6 mb-2">
                  <input class="form-control main" type="text" name="modelo" placeholder="Modelo" required>
                </div>
                <!-- Mensagem -->
                <div class="col-md-12 mb-2">
                  <textarea class="form-control main" name="descricao" rows="10" maxlength="5000" placeholder="Seu Relato"></textarea>
                </div>
                <!-- Botão de Enviar -->
                <div class="col-12 text-right">
                  <button class="btn btn-main-md">Enviar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <footer>
      <div class="footer-main">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-12 m-md-auto align-self-center">
              <div class="block">
                <a href="index.html"><img src="images/logo.png" class="logo-image" alt="footer-logo"></a>
                <!-- Social Site Icons -->
                <ul class="social-icon list-inline">
                  <li class="list-inline-item">
                    <a href="https://www.facebook.com/"><i class="ti-facebook"></i></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="https://twitter.com/"><i class="ti-twitter"></i></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="https://www.instagram.com/"><i class="ti-instagram"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6 mt-5 mt-lg-0">
              <div class="block-2">
                <!-- heading -->
                <h6>Recursos</h6>
                <!-- links -->
                <ul>
                  <li><a href="reportar-bugs.html">Reportar Bugs</a></li>
                  <li><a href="sign-up.html">Cadastrar</a></li>
                  <li><a href="sign-in.php">Entrar</a></li>
                  <li><a href="dashboard.php">Administrador</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6 mt-5 mt-lg-0">
              <div class="block-2">
                <!-- heading -->
                <h6>Companhia</h6>
                <!-- links -->
                <ul>
                  <li><a href="profile.php">Sobre</a></li>
                  <li><a href="contact.html">Contatos</a></li>
                  <li><a href="team.php">Equipe</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center bg-dark py-4">
        <small class="text-secondary">Copyright &copy; <script>document.write(new Date().getFullYear())</script>. Designed &amp; Developed by Small Phones</small class="text-secondary">
      </div>
    </footer>
    
    <div id="mensagem">
      <?php
      echo $_SESSION['mensagem'];
      unset($_SESSION['mensagem']);
      ?>
    </div>
    <script src="js/mensagem.js"></script>
    <!-- To Top -->
    <div class="scroll-top-to">
      <i class="ti-angle-up"></i>
    </div>
    <!-- JAVASCRIPTS -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/bootstrap.min.js"></script>
    <script src="plugins/slick/slick.min.js"></script>
    <script src="plugins/fancybox/jquery.fancybox.min.js"></script>
    <script src="plugins/syotimer/jquery.syotimer.min.js"></script>
    <script src="plugins/aos/aos.js"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g"></script>
    <script src="plugins/google-map/gmap.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>