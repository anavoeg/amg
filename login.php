<?php
require '_inclui/header.php';
require '_config/config.php';

if(isset($_SESSION['login']) && !empty($_SESSION['login'])){
    header("Location: painel.php");//se usuario tiver logado
    exit; //para que todo o codigo abaixo nao seja executado
}

if(isset($_POST['usuario']) && !empty($_POST['usuario'])){ // verificando

    $usuario = addslashes($_POST['usuario']);

    $senha = addslashes($_POST['senha']);

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario && senha = :senha && status=1");
    $sql -> bindValue(":usuario", $usuario);
    $sql -> bindValue(":senha", md5($senha));
    $sql -> execute();
    //verificar se achou alguma coisa
    if($sql -> rowCount() > 0){
        $sql = $sql->fetch();//pegando os dados
        $_SESSION['login'] = $sql['id'];
        header("Location: painel.php");//logou
        exit; //para que todo o codigo abaixo nao seja executado
    } else {
        echo "<script type='text/javascript'>alert('Usuário ou Senha Incorretos.')</script>";
    }

}
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimun-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!--Compatibilidade com Edge-->
        <meta charset="UTF-8">
        <title>Login Tabarato</title>
        <meta name="description" content="Ganhe tempo e agilidade com o Sistema de Lançamento de Promoções online do Tá Barato"/>
        <meta name="keywords" content="Promoções, Mercado, Super Mercado, Promoção, Barato, Tempo"/>
        <meta name="robots" content="index, follow"> <!-- orienta os buscadores a n�o indexar o conte�do da p�gina e impede-a de seguir os links para descobrir novas p�ginas-->
        <meta name="author" content="Senac 2019">

        <link rel="shortcut icon" href="_ativos/_img/ico.png" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="amg-admin.css" type="text/css">

    </head>
    <body>
    <div class="container">
        <section class="login-form">
            <form method="POST" role="login">
                <input type="text" name="usuario" placeholder="Usuário" required class="form-control input-lg"  />

                <input type="password" name="senha" class="form-control input-lg" id="password" placeholder="Senha" required="" />

                <button type="submit" name="go" class="btn">Entrar</button>
                <a href="login.php">Área Restrita</a>
            </form>
            <div class="">
                <a href="login.php">www.amigoestouaqui.com</a>
            </div>
        </section>
    </div>
    </body>
    </html>
<?php
require '_inclui/footer.php';
?>