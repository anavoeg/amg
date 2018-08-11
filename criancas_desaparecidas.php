<?php
/**
 * Created by PhpStorm.
 * User: genesystem
 * Date: 10/08/2018
 * Time: 02:13
 */?>
<?php
session_start();
require '_config/config.php';

if(!isset($_SESSION['login']) || empty($_SESSION['login'])){//se não existir uma sessao de login eu deslogo o cara.
    header("Location: sair.php");
    exit;
}

$sql = $pdo->prepare("SELECT * FROM desaparecidos");
$sql -> bindValue(":status", 0);
$sql -> execute();
//verificar se achou alguma coisa
if($sql -> rowCount() > 0){
    $desaparecidos = $sql->fetchAll();//pegando os dados

    require '_funcoes/idade.php';

} else {
    echo "<script type='text/javascript'>alert('Não existem desaparecidos.')</script>";
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

    <?php foreach ($desaparecidos as $desaparecido):?>

        <div style="border: 1px solid #ccc; width: 20%; margin: 1%; padding: 1%;">
            <h3><?php echo $desaparecido['nome']?></h3> <span><a href="painel.php?crianca=<?php echo $desaparecido['id'];?>" >Editar</a></span>
            <?php echo $desaparecido['status']? "<p style='color: cadetblue;'>Encontrado</p>" : "<p style='color: #ff4906;'>Desaparecido</p>";?>
            <small>
                <?php
                $data_nascimento = (string) $desaparecido['idade'];
                echo idade($data_nascimento).' Anos de idade.';
                ?>
            </small>
        </div>
    <?php endforeach;?>
</div>

</body>
</html>
