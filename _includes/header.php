<?php session_start()?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

  <!-- <link rel="stylesheet" type="text/css" href="_assets/_css/materialize.css"> -->
  <link rel="stylesheet" type="text/css" href="_assets/_css/style.css">
  <title>AMG</title>
</head>
<body class="amg-body">
  <div class="amg-container">
    <div class="wrapper">
	<?php if(isset($_SESSION['login']) && !empty($_SESSION['login'])):?>
	<span><a href="painel.php">Painel Administrativo</a></span>
	<?php endif;?>
      <header class="amg-top">
        <nav class="header-nav">
          <a href="index.php" class="amg-brand"><h1>amg</h1></a>
          <span class="hamburger">
            <i class="fas fa-bars"></i>
          </span>
          <ul class="navigation" >
            <li><a href="doacao.php">Doe um brinquedo</a></li>
            <li><a href="apadrinhamento.php">Apadrinhe uma criança</a></li>
            <li><a href="institucional.php">Sobre nossa ONG</a></li>
            <li><a href="contato.php">Contato</a></li>
          </ul>
        </nav>
      </header>
        <nav class="mobile">
          <div class="nav-layer">
            <ul class="mobile-items">
                <li class="mobile-item"><a href="doacao.php">Doe um brinquedo</a></li>
                <li class="mobile-item"><a href="apadrinhamento.php">Apadrinhe uma criança</a></li>
                <li class="mobile-item"><a href="institucional.php">Sobre nossa ONG</a></li>
                <li class="mobile-item"><a href="contato.php">Contato</a></li>
            </ul>
          </div>
        </nav>
  <main class="content">

