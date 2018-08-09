<?php
    // require '_includes/header.php';
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
          <!-- <span class="logout">
            <i class="fas fa-sign-out-alt"></i>
          </span> -->
          <ul class="navigation" >
            <li><a href="institucional.php">crianças desaparecidas</a></li>
            <li><a href="contato.php">eventos</a></li>
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
        <form method="POST" enctype="multipart/form-data" class="admin-form missing-kid">
            <div class="input-field">
                <input type="file" id="files" class="hidden">
                <label for="files" class="btn">foto da criança desaparecida</label>
            </div>
            <div class="input-field">
                <input type="text" id="name">
                <label for="name">Nome da criança desaparecida</label>
            </div>
            <div class="input-field">
                <input type="text" id="email" 
                <label for="email">data do desaparecimento</label>
            </div>
            <div class="input-field">
                <input type="text" id="textarea" ></textarea>
                <br><label for="textarea">visto por ultimo</label>
            </div>
            <div class="input-field">
                <input type="text" id="email" >
                <label for="recompensa">recompensa</label>
            </div>

        </form>
        <button class="btn admin-btn">Enviar dados</button>
        
        <form method="POST" enctype="multipart/form-data" class="admin-form event">
            <div class="input-field">
                <input type="file" id="files" class="hidden">
                <label for="files" class="btn">foto do evento</label>
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

        </form>
        <button class="btn admin-btn">Enviar dados</button>

    </div>
</body>
</html>  
<?php
    // require '_includes/footer.php';
?>
