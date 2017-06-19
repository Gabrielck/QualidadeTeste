<?php
session_start();
if (!isset($_SESSION['nome']))
    $_SESSION['nome'] = "";
if (!isset($_SESSION['senha']))
    $_SESSION['senha'] = "";
if (isset($_POST['nome']) && isset($_POST['senha'])) {
    $_SESSION['nome'] = $_POST['nome'];
    $_SESSION['senha'] = $_POST['senha'];
}
include("ConnectionDB.php");
$connection = ConnectionDB::getInstance();
$query = $connection->prepare("select * from usuario where USU_NOMUSU = ? and USU_SENUSU = ?");
$query->bindValue(1, $_SESSION['nome']);
$query->bindValue(2, $_SESSION['senha']);
$query->execute();
$usuario = $query->fetchAll();

if (count($usuario)!=1) {
    ?>
    <script>
        window.alert("Senha incorreta");
        window.location = "index.php";
    </script>
    <?php

    die();
}