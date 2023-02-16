<?php
session_start();
ob_start();

include_once '../includes/config.php';
?>

<!-------------------
  SEÇÃO HTML ABERTA
-------------------->

<!doctype html>
<html lang="pt-br">
 
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
      <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
      <link rel="stylesheet" href="assets/libs/css/style.css">
      <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
      <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
      <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
      <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
      <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
      <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
      <title>Dashboard Lojista - Venus Shop</title>
  </head>

  <body>

    <header>

      <!---------- 
        Top Menu 
      ----------->

      <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
          <!-- Logo Venus Shop -->
          <a class="navbar-brand" href="index.php"><img src="../img/logo-principal.png" width="100px" heigth="30px" alt="Logo da VenusShop" title="Venus Shop"></a>
          <!-- ícone Dropdown -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Dropdown usuário -->
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
              <li class="nav-item dropdown nav-user">
                <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                  <div class="nav-user-info">
                    <h5 class="mb-0 text-white nav-user-name">Nome da Loja </h5>
                    <span class="status"></span><span class="ml-2">Ativa</span>
                  </div>
                  <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Perfil</a>
                  <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Configurações</a>
                  <a class="dropdown-item" href="#"><i class="fas fa-power-off mr-2"></i>Sair</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>

      <!------------------- 
        Left Sidebar Menu 
      -------------------->

      <!-- Cabeçalho do Menu -->
      <div class="nav-left-sidebar">
        <div class="menu-list">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav flex-column">
                <li class="nav-divider">
                  Menu
                </li>
                <!-- Categorias de Acesso -->
                <li class="nav-item ">
                  <!-- Primeiro botão -->
                  <a class="nav-link active" href="index.php"><i class="fa fa-fw fa-user-circle"></i>Painel da loja</a>
                </li>
                <!-- Segundo botão -->
                <li class="nav-item">
                  <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Sobre a loja</a>
                  <div id="submenu-2" class="collapse submenu" style="">
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a class="nav-link" href="pages/cards.html">Cards</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="pages/general.html">General</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="pages/carousel.html">Carousel</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <!-- Terceiro botão -->
                <li class="nav-item">
                  <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Pedidos</a>
                  <div id="submenu-3" class="collapse submenu" style="">
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a class="nav-link" href="pages/chart-c3.html">C3 Charts</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="pages/chart-chartist.html">Chartist Charts</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <!-- Quarto botão -->
                <li class="nav-item ">
                  <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Produtos</a>
                  <div id="submenu-4" class="collapse submenu" style="">
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a class="nav-link" href="pages/form-elements.html">Form Elements</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="pages/form-validation.html">Parsely Validations</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <!-- Quinto botão -->
                <li class="nav-item ">
                  <a class="nav-link" href="#"><i class="fa fa-fw fa-user-circle"></i>Cupons</a>
                </li>
                <!-- Sexto botão -->
                <li class="nav-item ">
                  <a class="nav-link" href="#"><i class="fa fa-fw fa-user-circle"></i>Cliente</a>
                </li>
                <li class="nav-divider"></li>
                <!-- Sétimo botão -->
                <li class="nav-item ">
                  <a class="nav-link" href="#"><i class="fa fa-fw fa-user-circle"></i>Fale com a Venus Shop</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>

    </header>


    <!-- Chamando JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
  </body>



</html>

<!----------------------
  SEÇÃO HTML ENCERRADA
----------------------->