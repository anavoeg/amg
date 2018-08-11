<?php
// require '_includes/header.php';
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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway" rel="stylesheet">
    <!-- <link rel="stylesheet" href="_ativos/_css/style.css"> -->
    <link rel="stylesheet" href="_ativos/_css/amg-admin.css">
    <title>Login AMG</title>
</head>
<body>
<header class="amg-top">
    <nav class="header-nav">
        <a href="index.php" class="amg-brand"><h1>amg</h1></a>
        <ul class="navigation" >
            <li><a href="criancas_desaparecidas.php">crianças desaparecidas</a></li>
            <li>eventos</li>
                    <!-- <i class="fas fa-sign-out-alt"></i> -->
          </span>
            </li>
        </ul>
    </nav>
</header>
    <div class="container">
        <section class="login-form">
            <form method="POST" role="login">
                <input type="text" name="usuario" placeholder="Usuário" required class="form-input"  />

                <input type="password" name="senha" class="form-input" id="password" placeholder="Senha" required="" />

                <button type="submit" name="go" class="btn btn-login">Entrar</button>
            </form>
            <div class="text-last">
                <span>Área Restrita</span>
                <a href="index.php">www.amigoestouaqui.ml</a>
            </div>
        </section>
    </div>
    <footer class="page-footer">
   <div class="footer-layer">
      <div class="footer-content">
            <blockquote><p>Se a fase é ruim e são tantos problemas que não tem fim, 
                  não se esqueça que ouviu de mim, <i style="color:rgb(212, 0, 231);">amigo estou aqui</i></p></blockquote>
      <div class="footer-copyright">
         <div class="footer-bottom">
            © 2014 Amigo Estou Aqui
         </div>
      </div>
</footer>

    </body>
    </html>
