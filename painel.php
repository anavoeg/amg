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
    require '_pegar_inserir/atualizar_desaparecidos.php';

    //Pegar para preencher o form
    $sql = $pdo->prepare("SELECT * FROM desaparecidos WHERE id = :crianca");
    $sql -> bindValue(":crianca", addslashes($_GET['crianca']));
    $sql -> execute();
    //verificar se achou alguma coisa
    if($sql -> rowCount() > 0){

        $crianca = $sql->fetch();//pegando os dados

    } else {
        echo "<script type='text/javascript'>alert('Criança não existe no banco de dados.')</script>";
    }

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
            <li><a href="criancas_desaparecidas.php">Crianças desaparecidas</a></li>
            <li><a href="painel.php">Cadastro</a></li>
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
    <form method="POST" enctype="multipart/form-data" id="formulario_desaparecidos" class="admin-form missing-kids">
        <h4>Formulário de crianças desaparecidas</h4>
        <hr>
        <?php require '_componentes/mensagens.php';?>
        <?php if (isset($_GET['crianca']) && !empty($_GET['crianca']))://Apenas aparece o status quando for edição.?>
            <div class="input-field" style="float: right; margin-right:10%;">
                <div class="switch">
                    <label for="mycheckbox" class="switch-toggle" data-on="Encontrada" data-off="Desaparecida"></label>
                    <input type="checkbox" name="status" id="mycheckbox" <?php echo @$crianca['status']==1?'checked':'';?> />
                </div>
            </div>
        <?php endif; ?>
        <?php if (!isset($_GET['crianca']) && empty($_GET['crianca']))://não é possivel editar foto.?>
        <div class="input-field">
            <input name="arquivo" accept="image/jpeg" type="file" id="files" value="<?php echo @$crianca['foto'];?>" class="hidden"><br>
            <input type="hidden" name="MAX_FILE_SIZE" value="40000000">
            <br><label for="files" class="upload">Foto da criança desaparecida</label>
        </div>
        <?php endif; ?>
        <div class="input-field">
            <input name="nome" type="text" id="nome" placeholder="Nome da criança desaparecida" value="<?php echo (@$crianca['nome'])?:''; ?>">
        </div>
        <div class="input-field">
            <input name="data_desaparecimento" type="text" id="data_desaparecimento" placeholder="Data do desaparecimento" value="<?php echo (@$crianca['data_desaparecimento'])?date('d/m/Y', strtotime($crianca['data_desaparecimento'])):'' ?>">
        </div>
        <div class="input-field">
            <input name="visto_por_ultimo" type="text" id="visto_por_ultimo" placeholder="Visto por ultimo" value="<?php echo (@$crianca['visto_por_ultimo'])?:''; ?>" >
        </div>
        <div class="input-field">
            <input name="idade" type="text" id="idade" placeholder="Data de Nascimento" value="<?php echo (@$crianca['idade'])?date('d/m/Y', strtotime($crianca['idade'])):'' ?>">
        </div>
        <div class="input-field">
            <input name="recompensa" type="text" id="recompensa" placeholder="Recompensa" value="<?php echo (@$crianca['recompensa'])?:false; ?>" >
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

        var edicao = <?php echo @$_GET['crianca']?:0; ?>;

        if (edicao == 0){

            $('#formulario_desaparecidos').validate({ // iniciando o plugin validate do jquery para validar os campos do formulário
                errorContainer: "#errorContainer",
                errorLabelContainer: "#errorContainer",
                errorElement: "li",
                rules: {
                    nome: {
                        required: true,
                        minlength: 3
                    },
                    data_desaparecimento: {
                        required: true
                    },
                    visto_por_ultimo: {
                        required: true
                    },
                    idade: {
                        required: true
                    },
                    arquivo: {
                        required: true,
                    },

                },

                messages: {
                    nome: {
                        required: "Por favor, informe o nome.",
                        minlength: "O nome deve ter pelo menos 3 caracteres."
                    },
                    data_desaparecimento: {
                        required: "A data de desaparecimento não pode ficar em branco.",
                    },
                    visto_por_ultimo: {
                        required: "O local onde a criança foi vista pela última vez não pode ficar em branco."
                    },
                    idade: {
                        required: "Você deve inserir a data de nascimento da criança."
                    },
                    arquivo: {
                        required: "É necessário a foto da criança, Tamanho Máx: 40MB.",
                    },
                }

            });

        }else {
            $('#formulario_desaparecidos').validate({ // iniciando o plugin validate do jquery para validar os campos do formulário
                rules: {
                    nome: {
                        required: true,
                        minlength: 3
                    },
                    data_desaparecimento: {
                        required: true
                    },
                    visto_por_ultimo: {
                        required: true
                    },
                    idade: {
                        required: true
                    },

                },

                messages: {
                    nome: {
                        required: "Por favor, informe o nome.",
                        minlength: "O nome deve ter pelo menos 3 caracteres."
                    },
                    data_desaparecimento: {
                        required: "A data de desaparecimento não pode ficar em branco.",
                    },
                    visto_por_ultimo: {
                        required: "O local onde a criança foi vista pela última vez não pode ficar em branco."
                    },
                    idade: {
                        required: "Você deve inserir a data de nascimento da criança."
                    },
                }

            });
        }


        //Máscaras
        $('#idade, #data_desaparecimento').mask('00/00/0000');

        $('#recompensa').mask('000.000,00', {
            reverse: true
        });


        //Botão de status da criança;
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