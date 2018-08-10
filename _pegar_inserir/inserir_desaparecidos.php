<?php
//script abaixo insere as informações no banco
if(isset($nome) && !empty($nome)){

    if(isset($arquivo)){

        try{
            $idade = Datetime::createFromFormat('d/m/Y', $idade);
            $data_desaparecimento = Datetime::createFromFormat('d/m/Y', $data_desaparecimento);

            //Script abaixo insere informações coletadas através do arquivo pegar_desaparecidos.php na tabela desaparecidos
            $sql = $pdo->prepare("INSERT INTO desaparecidos SET nome=:nome, idade=:idade, data_desaparecimento=:data_desaparecimento, visto_por_ultimo=:visto_por_ultimo, recompensa=:recompensa, foto=:arquivo, status=:status;");
            $sql -> bindValue(":nome", $nome);
            $sql -> bindValue(":idade", $idade->format('Y-m-d'));
            $sql -> bindValue(":data_desaparecimento", $data_desaparecimento->format('Y-m-d'));
            $sql -> bindValue(":visto_por_ultimo", $visto_por_ultimo);
            $sql -> bindValue(":recompensa", $recompensa);
            $sql -> bindValue(":arquivo", $nomeArq);
            $sql -> bindValue(":status", 0);//sempre que cadastrar uma criança ela será desaparecida.
            $sql -> execute();

            global $sucesso;
            $sucesso = true;

        }catch (Exception $e) {
            unlink($nomeArq);
            global $falha;
            $falha = true;
        }
    }

}


?>