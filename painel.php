<?php
session_start();
require '_config/config.php';

if(!isset($_SESSION['login']) || empty($_SESSION['login'])){//se não existir uma sessao de login eu deslogo o cara.
    header("Location: sair.php");
    exit;
}
//Inserção dos dados no banco

if (!isset($_GET['crianca']) && empty($_GET['crianca'])){
    require '_pegar_inserir/pegar_desaparecidos.php';
    require '_pegar_inserir/pegar_arquivos.php';
    require '_pegar_inserir/inserir_desaparecidos.php';
}else {
    //atualizar
    require '_pegar_inserir/pegar_desaparecidos.php';
    require '_pegar_inserir/pegar_arquivos.php';
    require '_pegar_inserir/atualizar_desaparecidos.php';
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
    <link rel="stylesheet" href="_ativos/_css/amg-admin.css">
    <title>Document</title>
    <style>

    </style>
</head>
<body>
<header class="amg-top">
    <nav class="header-nav">
        <a href="index.php" class="amg-brand"><h1>amg</h1></a>
        <ul class="navigation" >
            <li><a href="criancas_desaparecidas.php">crianças desaparecidas</a></li>
            <li>eventos</li>
            <li><span class="logout"><a href="sair.php">
              <img src="_ativos/_img/logout.png" alt=""></a>
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
        <?php if (isset($_GET['crianca']) && !empty($_GET['crianca']))://Apenas aparece o status quando for edição.?>
        <div class="input-field" style="float: right; margin-right:10%;">
            <div class="switch">
                <label for="mycheckbox" class="switch-toggle" data-on="Encontrada" data-off="Desaparecida"></label>
                <input type="checkbox" name="status" id="mycheckbox" />
            </div>
        </div>
        <?php endif; ?>
        <div class="input-field">
            <input name="arquivo" accept="image/jpeg" type="file" id="files" class="hidden"><br>
            <input type="hidden" name="MAX_FILE_SIZE" value="40000000">
            <br><label for="files" class="upload">Foto da criança desaparecida</label>
        </div>
        <div class="input-field">
            <input name="nome" type="text" id="nome">
            <br><label for="nome">Nome da criança desaparecida</label>
        </div>
        <div class="input-field">
            <input name="data_desaparecimento" type="text" id="data_desaparecimento" >
            <br><label for="data_desaparecimento">Data do desaparecimento</label>
        </div>
        <div class="input-field">
            <input name="visto_por_ultimo" type="text" id="visto_por_ultimo" >
            <br><label for="visto_por_ultimo">Visto por ultimo</label>
        </div>
        <div class="input-field">
            <input name="idade" type="text" min="1" max="18" id="idade" >
            <br><label for="idade">Data de Nascimento</label>
        </div>
        <div class="input-field">
            <input name="recompensa" type="text" id="recompensa">
            <br><label for="recompensa">Recompensa</label>
        </div>

        <button type="submit" class="btn admin-btn">Enviar dados</button>
    </form>
</div>

<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready( function(){
        $('.switch').each(function() {
            var checkbox = $(this).children('input[type=checkbox]');
            var toggle = $(this).children('label.switch-toggle');

            if (checkbox.length) {
                checkbox.addClass('hidden');
                toggle.removeClass('hidden');
                if (checkbox[0].checked) {
                    toggle.addClass('on');
                    toggle.removeClass('off');
                    toggle.text(toggle.attr('data-on'));
                } else {
                    toggle.addClass('off');
                    toggle.removeClass('on');
                    toggle.text(toggle.attr('data-off'));
                };
            }
        });

        $('.switch-toggle').click(function(){
            var checkbox = $(this).siblings('input[type=checkbox]')[0];
            var toggle = $(this);

            // We need to inverse the logic here, because at the time of processing,
            // the checked status has not been enabled yet.
            if (checkbox.checked) {
                toggle.addClass('off');
                toggle.removeClass('on');
                toggle.text(toggle.attr('data-off'));
            } else {
                toggle.addClass('on');
                toggle.removeClass('off');
                toggle.text(toggle.attr('data-on'));
            };
        });
    });
</script>

</body>
</html>  