<?php
	session_start();
	require '_config/config.php';
	require '_includes/header.php';
	
	if(!isset($_SESSION['login']) || empty($_SESSION['login'])){//se não existir uma sessao de login eu deslogo o cara.
		header("Location: sair.php");	
		exit;		
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="_assets/_css/amg-admin.css">
    <title>Document</title>
    <style>

    </style>
</head>
<body>
    <header class="amg-top">
        <nav class="header-nav">
          <a href="index.php" class="amg-brand"><h1>amg</h1></a>
          <ul class="navigation" >
            <li>crianças desaparecidas</li>
            <li>eventos</li>
            <li><span class="logout"><a href="sair.php">
              <img src="_assets/_img/logout.png" alt=""></a>
            <!-- <i class="fas fa-sign-out-alt"></i> -->
          </span>
</li>
          </ul>
        </nav>
    </header>
    <div class="wrapper">
        <div class="site-pages">
            <div class="site-menu">
            <ul>
                <li><a href="doacao.php"> doe um brinquedo</a></li>
                <hr>
                <li><a href="apadrinhamento.php"> apadrinhe uma criança</a></li>
                <hr>
                <li><a href="institucional.php"> sobre nossa ONG</a></li>
                <hr>
                <li><a href="contato.php">contato</a></li>
            </ul>
            </div>
        </div>
        <form method="POST" enctype="multipart/form-data" class="admin-form missing-kids">
            <h4>Formulário de crianças desaparecidas</h4>
            <hr>
            <div class="input-field">
                <input type="file" id="files" class="hidden"><br>
                <br><label for="files" class="upload">foto da criança desaparecida</label>
            </div>
            <div class="input-field">
                <input type="text" id="name">
                <br><label for="name">Nome da criança desaparecida</label>
            </div>
            <div class="input-field">
                <input type="text" id="email" >
                <br><label for="email">data do desaparecimento</label>
            </div>
            <div class="input-field">
                <input type="text" id="textarea" ></input>
                <br><label for="textarea">visto por ultimo</label>
            </div>
            <div class="input-field">
                <input type="text" id="email" >
                <br><label for="recompensa">recompensa</label>
            </div>
            <button class="btn admin-btn">Enviar dados</button>
        </form>
        
        <!-- <form method="POST" enctype="multipart/form-data" class="admin-form event">
            <h4>Formulário de eventos da AMG</h4>
            <hr>
            <div class="input-field">
                <input type="file" id="files" class="hidden"><br>
                <label for="files" class="upload">foto do evento</label>
            </div>
            <div class="input-field">
                <input type="text" id="name">
                <label for="name">Nome do evento</label>
            </div>
            <div class="input-field">
                <input type="text" id="email" 
                <label for="email">data do evento</label>
            </div>
            <div class="input-field">
                <input type="textarea" id="textarea" class="amg-message" >
                <br>               
                <label for="recompensa">artigo sobre o evento</label>
            </div>
            <button class="btn admin-btn">Enviar dados</button>
        </form> -->

    </div>
</body>
</html>  
<?php
   require '_includes/footer.php';
?>