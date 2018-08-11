<?php
/**
 * Created by PhpStorm.
 * User: genesystem
 * Date: 11/08/2018
 * Time: 02:17
 */
session_start();
if(!isset($_SESSION['login']) || empty($_SESSION['login'])){//se não existir uma sessao de login eu deslogo o cara.
    header("Location: sair.php");
    exit;
}

$id = $_GET["crianca"];

require '_config/config.php';

$sql = $pdo->prepare("DELETE FROM desaparecidos WHERE id=:id");

$sql->bindValue(":id", $id);

$sql->execute();

if($sql->rowCount()){

    header("Location: criancas_desaparecidas.php");

}


?>