<?php
/**
 * Created by PhpStorm.
 * User: genesystem
 * Date: 10/08/2018
 * Time: 04:10
 */
if(isset($_GET['crianca']) && !empty($_GET['crianca']) && isset($_POST['nome']) && !empty($_POST['nome'])){
    $id = addslashes($_GET['crianca']);

    try {

        $idade = Datetime::createFromFormat('d/m/Y', $idade);
        $data_desaparecimento = Datetime::createFromFormat('d/m/Y', $data_desaparecimento);

        $sql = $pdo->prepare("UPDATE desaparecidos SET nome=:nome, idade=:idade, data_desaparecimento=:data_desaparecimento, visto_por_ultimo=:visto_por_ultimo, recompensa=:recompensa, status=:status WHERE id=:id;");
        $sql -> bindValue(":nome", $nome);
        $sql -> bindValue(":idade", $idade->format('Y-m-d'));
        $sql -> bindValue(":data_desaparecimento", $data_desaparecimento->format('Y-m-d'));
        $sql -> bindValue(":visto_por_ultimo", $visto_por_ultimo);
        $sql -> bindValue(":recompensa", $recompensa);
        $sql -> bindValue(":status", $status);//sempre que cadastrar uma criança ela será desaparecida.
        $sql -> bindValue(":id", $id);
        $sql -> execute();

        global $sucessoDesaparecido;
        $sucessoDesaparecido = "Criança desaparecida foi inserida com sucesso em nosso banco de dados.";

    } catch (PDOException $e) {
        global $falhaDesaparecido;
        $falhaDesaparecido = "Falha ao inserir criança desaparecida em nosso banco de dados, verifique se digitou os dados corretamente,";
    }

}