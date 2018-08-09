<?php
session_start(); //inicia sessão
unset($_SESSION['login']); //desloga o id logado
header("Location: login.php");
exit;