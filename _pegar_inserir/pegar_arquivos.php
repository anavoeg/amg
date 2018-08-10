<?php
//Script abaixo pega o arquivo para armazenar no banco e no servidor

if(isset($arquivo)){

    //Pegando as informações importantes para inserir no banco
    $tipoArq = addslashes($arquivo["type"]);

    $i = 1;
    while ($i <= 2){
        if ($tipoArq === 'image/jpeg'){//apenas jpeg

            // Tamanho máximo do arquivo em bytes
            $maximo = 40000000; //= 40MB

            // Verificação
            if($arquivo["size"] > $maximo){
                global $arquivo_ultrapassa;
                $arquivo_ultrapassa = "O tamanho de seu arquivo ultrapassa o limite dado! Envie outro arquivo, Permitido: 40MB.";
                break;
            }
            // Tamanho ultrapassa o MAX_FILE_SIZE do formulario
            if($arquivo["error"] == UPLOAD_ERR_FORM_SIZE){
                global $arquivo_ultrapassa;
                $arquivo_ultrapassa = "O tamanho de seu arquivo ultrapassa o limite dado! Envie outro arquivo, Permitido: 40MB.";
                break;
            }

            // Tamanho ultrapassa o limite da configuração upload_max_filesize do php.ini
            if($arquivo["error"] == UPLOAD_ERR_INI_SIZE){
                global $arquivo_grande;
                $arquivo_grande = "O tamanho de seu arquivo ultrapassa o limite de tamanho de arquivo do PHP!";
                break;
            }

            //diretorio do arquivo
            $diretorio = "_arquivos/";

            // Substitui espaços por underscores no nome do arquivo
            $nomeArq = str_replace(" ", "_", $nome."_".md5($arquivo["name"]).time().rand(0,999));

            // Todas as letras em minúsculo
            $nomeArq = addslashes(strtolower($nomeArq));

            // Caminho completo do arquivo
            $nomeArq = $diretorio . $nomeArq.'.jpg';

            // Verifica se o arquivo existe no diretório dado
            if(file_exists($nomeArq)) {
                global $arquivo_existe;
                $arquivo_existe =  "Esta foto ja consta em nosso sistema! Envie outro arquivo!";
                break;

            }

            // Tudo ok! Então, move o arquivo
            move_uploaded_file($arquivo["tmp_name"], $nomeArq);

        }else {
            global $arquivo_invalido;
            $arquivo_invalido =  "Tipo de arquivo inválido.";
        }
        $i++;

    }

}
?>