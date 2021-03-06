<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>INPRL</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <link rel="shortout icon" type="image/ico" href="favicon.ico">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate-css/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

</head>

<body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- <div id="preloader"></div> -->

  <!--==========================
  welcome Section
  ============================-->
  <?php if(!isset($_SESSION['identity'])): ?>
  <section id="welcome">
    <div class="welcome-container">
      <div class="wow fadeIn">
        <div class="welcome-logo">
          <img class="" src="assets/images/shield.png" alt="Logo INPRL">
        </div>

        <h1>INSTITUTO NACIONAL DE PREVENCIÓN DE RIESGOS LABORALES</h1>
        <h2>Trabajamos <span class="rotating">por la seguridad laboral, por la prevención de riesgos, para el bienestar del trabajador</span></h2>
        <div class="actions">
          <a href="<?= base_url ?>informacion_riesgos.html" class="btn-informacion-riesgos">Información sobre riesgos</a>
          <a href="<?= base_url ?>index.php?controller=usuario&action=signIn" class="btn-gestionar">Gestionar partes</a>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>




  <!-- <section id="welcome">
    <div class="welcome-container">
      <div class="wow fadeIn">
        <div class="welcome-logo">
          <img class="" src="assets/images/shield.png" alt="Logo INPRL">
        </div>

        <h1>INSTITUTO NACIONAL DE PREVENCIÓN DE RIESGOS LABORALES</h1>
        <h2>Trabajamos <span class="rotating">por la seguridad laboral, por la prevención de riesgos, para el bienestar del trabajador</span></h2>
        <div class="actions">
          <a href="<?= base_url ?>informacion_riesgos.html" class="btn-informacion-riesgos">Información sobre riesgos</a>
          <a href="index.php?controller=usuario&action=signIn" class="btn-gestionar">Gestionar partes</a>
        </div>
      </div>
    </div>
  </section> -->

  <!--==========================
  Sección de encabezado
  ============================-->
  <?php if(isset($_SESSION['identity'])): ?>
  <header id="header">
    <div class="container">
      <div id="logo" class="pull-left">
        <a href="<?= base_url ?>index.php?controller=usuario&action=seleccionar_accion"  title="Área privada"><img src="assets/images/shield.png" alt="Logo Inrpl" />Área privada</a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a class="color-03C4EB prc-0px">Bienvenido/a  </a>
          <a class="color-03C4EB text-uppercase plc-6px"> <?=$_SESSION['identity']->login ?> </a></li>
          <li class="menu-has-children"><a href="#header">Gestionar partes</a>
            <ul>
              <li><a href="<?= base_url ?>index.php?controller=parte&action=parteNuevo">Nuevo parte</a></li>
              <li><a href="<?= base_url ?>index.php?controller=parte&action=seleccionarParteEditar">Modificar  / Eliminar partes</a></li>
              <li><a href="<?= base_url ?>index.php?controller=parte&action=buscarPartesForm">Buscar partes</a></li>
              <li><a href="<?= base_url ?>index.php?controller=parte&action=listAll" target="_blank">Listar todos los partes</a></li>
            </ul>
          </li>
          <li><a href="<?= base_url ?>index.php?controller=usuario&action=logout">Cerrar sesión</a></li>
        </ul>
      </nav>
    </div>
  </header>
<?php else: ?>
<header id="header">
    <div class="container">
      <div id="logo" class="pull-left">
        <a href="#welcome" title="Inicio"><img src="assets/images/shield.png" alt="" />INPRL</a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#welcome">Inicio</a></li>
          <li><a href="<?= base_url ?>#about">El INPRL</a></li>
          <li><a href="<?= base_url ?>informacion_riesgos.html">Información sobre riesgos</a></li>
          <li><a href="<?= base_url ?>index.php?controller=usuario&action=signIn">Gestionar partes</a></li>
          <li><a href="<?= base_url ?>#contact">Contacto</a></li>
          <li><a href="<?= base_url ?>#location">Dónde estamos</a></li>
        </ul>
      </nav>
    </div>
  </header>
<?php endif; ?>



  <!--==========================
  About Section
  ============================-->
  <!-- <div class="" id ="">    -->
  <!-- <div class="" id ="about">   verificar si está bien así -->
  