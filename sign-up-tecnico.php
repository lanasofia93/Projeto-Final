<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Cadastre um novo técnico</title>

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
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style3.css" rel="stylesheet">
  </head>
  <body class="body-wrapper" data-spy="scroll" data-target=".privacy-nav">
    <section class="user-login section">
      <div class="container">
        <div class="row">
          <div class="col-3" style="display: hidden"></div>
          <div class="col-6">
            <div class="block">
              <!-- Image -->
              <!-- <div class="image align-self-center"><img class="img-fluid" src="images/Login/sign-up.jpg" alt="desk-image">
              </div> -->
              <!-- Content -->
              <div class="content text-center">
                <div class="logo">
                  <a href="dashboard.php"><img src="images/logo.png" class="logo-image" alt=""></a>
                </div>
                <div class="title-text">
                  <h3>Crie uma conta nova de técnico</h3>
                </div>
                <form action="./php/cadastro-tecnico.php" method="POST">
                  <!-- Name -->
                  <input class="form-control main" type="text" name="nome" placeholder="Seu Nome" required>
                  <!-- Username -->
                  <input class="form-control main" type="text" name="usuario" placeholder="Usuário (Não deve conter espaços ou acentos)" required>
                  <!-- CPF -->
                  <input class="form-control main" type="text" name="CNPJ" placeholder="CNPJ" required>
                  <!-- Formação -->
                  <input class="form-control main" type="text" name="formacao" placeholder="Formação" required>
                  <!-- Área de Atuação -->
                  <label for="atuacao" class="atuacao">Selecione a Área de Atuação:</label>
                  <select name="atuacao" class="atuacao-select" required>
                    <option value="empty" selected>---</option>
                    <optgroup label="Hardware">
                      <option value="Manutenção de tela e afins">Manutenção de tela e afins</option>
                      <option value="Manutenção de bateria e afins">Manutenção de bateria e afins</option>
                      <option value="Manutenção de câmera e sensores">Manutenção de câmera e sensores</option>
                      <option value="Manutenção de botões, capacitores e outros módulos">Manutenção de botões, capacitores e outros módulos</option>
                      <option value="Soldagem">Soldagem</option>
                    </optgroup>
                    <optgroup label="Software">
                      <option value="Backup de contas e arquivos">Backup de contas e arquivos</option>
                      <option value="Hard reset e problemas de conta Google">Hard reset e problemas de conta Google</option>
                      <option value="ROM e reinstalação de sistema">ROM e reinstalação de sistema</option>
                      <option value="Recuperação do aparelho (tela azul, warning e etc)">Recuperação do aparelho (tela azul, warning e etc)</option>
                    </optgroup>
                    
                  </select>
                  <!-- Idade -->
                  <input class="form-control main" type="number" name="idade" min="16" placeholder="Idade" required>
                  <!-- Endereço -->
                  <input class="form-control main" type="text" name="endereco" placeholder="Endereço" required>
                  <!-- Cidade -->
                  <input class="form-control main" type="text" name="cidade" placeholder="Cidade" required>
                  <!-- Email -->
                  <input class="form-control main" type="email" name="email" placeholder="E-mail" required>
                  <!-- Telefone -->
                  <input class="form-control main" type="tel" name="telefone" placeholder="Telefone (apenas números)" required>
                  <!-- Password -->
                  <input class="form-control main" type="password" name="senha" placeholder="Senha" required>
                  <!-- Termos -->
							    <input class="new-radio" id="cliente" type="checkbox" name="termos" value="cliente" required><label class="new-label" for="cliente">Aceito os termos de uso</label>
                  <br><br>
                  <!-- Submit Button -->
                  <button class="btn btn-main-md" type="submit">Cadastrar Técnico</button>
                </form>
                <div class="new-acount">
                  <p>Já tem uma conta? <a href="sign-in.php">Entre</a></p>
                  <p>Quer se cadastrar como cliente? <a href="sign-up.php">Crie sua conta aqui</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div id="mensagem">
      <?php
      session_start();
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